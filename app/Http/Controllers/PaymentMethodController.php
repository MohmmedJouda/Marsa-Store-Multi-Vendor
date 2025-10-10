<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Notifications\PaymentConfirmedNotification;

use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    public function storeBankTransfer(Request $request, Order $order)
    {
        // ✅ التحقق من المدخلات
        $validated = $request->validate([
            'transaction_id' => 'nullable|string|max:255',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // ✅ رفع الملف إن وُجد
        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }

        // ✅ إنشاء سجل الدفع
        $payment = PaymentMethod::create([
            'order_id'       => $order->id,
            'payment_method' => 'bank_transfer',
            'bank_reference' => 'BANK-' . strtoupper(uniqid()), // مثال مرجع فريد
            'transaction_id' => $validated['transaction_id'] ?? null,
            'receipt_path' => $receiptPath,
        ]);

        // ✅ ربط طريقة الدفع بالطلب
        $order->update([
            'payment_method' => 'bank_transfer',
        ]);

        // يمكنك ربط علاقة الدفع بالطلب (إن أضفت عمود order_id في جدول payment_methods)
        // $payment->order()->associate($order)->save();

        return redirect()->route('customer.orders.show')
            ->with('success', 'تم إرسال بيانات التحويل البنكي بنجاح، وسيتم تأكيد الدفع قريبًا.');
    }

    public function storePayOnDelivery(Request $request, Order $order)
    {
        // ✅ التحقق من المدخلات
        $validated = $request->validate([
            'transaction_id' => 'nullable|string|max:255',
            'receipt' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // ✅ رفع الملف إن وُجد
        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }

        // ✅ إنشاء سجل الدفع
        $payment = PaymentMethod::create([
            'order_id'       => $order->id,
            'payment_method' => 'pay_on_delivery',
            'payment_confirmed_at' => now(),
        ]);

        // ✅ ربط طريقة الدفع بالطلب
        $order->update([
            'payment_method' => 'pay_on_delivery',
            'status' => 'shipping',
        ]);

        // يمكنك ربط علاقة الدفع بالطلب (إن أضفت عمود order_id في جدول payment_methods)
        // $payment->order()->associate($order)->save();

        return redirect()->route('customer.orders.show')
            ->with('success', 'تم تأكيد الطلب بنجاح, جاري شحن الطلب.');
    }


 public function decision(Request $request, $orderId)
{
    $request->validate([
        'decision' => 'required|in:approved,rejected',
    ]);

    $order = Order::with('payment', 'user')->findOrFail($orderId);

    if (!$order->payment) {
        return back()->with('error', 'لا توجد بيانات دفع مرتبطة بهذا الطلب.');
    }

    if (!in_array(Auth::user()->role, ['super_admin', 'moderator'])) {
        abort(403, 'ليس لديك صلاحية لاتخاذ القرار.');
    }

    if ($request->decision === 'approved') {
        $order->payment->update([
            'payment_confirmed_at' => now(),
        ]);
        $order->update(['status' => 'shipping']);
    }
    elseif($request->decision === 'rejected'){
        $order->update(['status' => 'payment_rejected']);
    } else {
        $order->update(['status','pending']);
    }

    // إرسال إشعار للمستخدم
    if ($order->user) {
        $order->user->notify(new \App\Notifications\PaymentDecisionNotification($order, $request->decision));
    }

    $msg = $request->decision === 'approved' ? 'تمت الموافقة على الدفع' : 'تم رفض الدفع';
    return back()->with('success', $msg);
}

}
