<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    public function storeBankTransfer(Request $request, Order $order)
    {
        $this->authorize('pay', $order);

        $validated = $request->validate([
            'transaction_id' => 'nullable|string|max:255',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }

        PaymentMethod::create([
            'order_id' => $order->id,
            'payment_method' => 'bank_transfer',
            'bank_reference' => 'BANK-' . strtoupper(uniqid()),
            'transaction_id' => $validated['transaction_id'] ?? null,
            'receipt_path' => $receiptPath,
        ]);

        $order->update(['payment_method' => 'bank_transfer']);

        return redirect()->route('customer.orders.show')
            ->with('success', 'تم إرسال بيانات التحويل البنكي بنجاح، وسيتم تأكيد الدفع قريبًا.');
    }

    public function storePayOnDelivery(Request $request, Order $order)
    {
        $this->authorize('pay', $order);

        $request->validate([
            'transaction_id' => 'nullable|string|max:255',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        PaymentMethod::create([
            'order_id' => $order->id,
            'payment_method' => 'pay_on_delivery',
            'payment_confirmed_at' => now(),
        ]);

        $order->update([
            'payment_method' => 'pay_on_delivery',
            'status' => 'shipping',
        ]);

        return redirect()->route('customer.orders.show')
            ->with('success', 'تم تأكيد الطلب بنجاح, جاري شحن الطلب.');
    }

    public function decision(Request $request, $orderId)
    {
        $request->validate([
            'decision' => 'required|in:approved,rejected',
        ]);

        $order = Order::with('payment', 'user')->findOrFail($orderId);

        if (!in_array(Auth::user()->role, ['super_admin', 'moderator'], true)) {
            abort(403, 'ليس لديك صلاحية لاتخاذ القرار.');
        }

        if (!$order->payment) {
            return back()->with('error', 'لا توجد بيانات دفع مرتبطة بهذا الطلب.');
        }

        if ($request->decision === 'approved') {
            $order->payment->update(['payment_confirmed_at' => now()]);
            $order->update(['status' => 'shipping']);
        } else {
            $order->update(['status' => 'payment_rejected']);
        }

        if ($order->user) {
            $order->user->notify(new \App\Notifications\PaymentDecisionNotification($order, $request->decision));
        }

        $msg = $request->decision === 'approved' ? 'تمت الموافقة على الدفع' : 'تم رفض الدفع';
        return back()->with('success', $msg);
    }
}
