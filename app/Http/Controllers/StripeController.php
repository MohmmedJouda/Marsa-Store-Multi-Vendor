<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Order;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $this->authorize('pay', $order);

        $items = $order->items()->with('variant', 'variant.product')->get();
        $subtotal = $items->sum(fn ($item) => $item->total_price);
        $taxAmount = $order->tax_amount;
        $total = $order->total_amount;
        $paymentReference = 'ORDER' . $order->id . '-' . now()->format('YmdHis');
        $order->bank_reference = $paymentReference;
        $selectedMethod = $request->input('payment_method', 'pay_on_delivery');
        $discount = 0;
        $productDiscount = 0;

        Stripe::setApiKey(config('services.stripe.secret'));
        PaymentIntent::create([
            'amount' => intval($order->total_amount * 100),
            'currency' => $order->currency ?? 'usd',
            'metadata' => ['order_id' => $order->id],
        ]);

        $username = Auth::check() ? Auth::user()->name : 'Guest';

        return view('users.customer.payment', compact(
            'order', 'items', 'subtotal', 'taxAmount', 'total', 'productDiscount',
            'discount', 'username', 'selectedMethod', 'paymentReference'
        ));
    }

    public function credit_card(Order $order)
    {
        $this->authorize('pay', $order);

        Stripe::setApiKey(config('services.stripe.secret'));
        $paymentIntent = PaymentIntent::create([
            'amount' => $order->total_amount * 100,
            'currency' => 'ils',
            'metadata' => ['order_id' => $order->id],
        ]);

        PaymentMethod::create([
            'order_id' => $order->id,
            'payment_method' => 'credit_card',
            'payment_confirmed_at' => now(),
        ]);

        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    }

    public function updateOrderStatus(Order $order)
    {
        // A customer must never be able to confirm or transition an order's
        // fulfillment/payment state. Payment state is driven by the payment
        // provider or authorized back-office users.
        abort(403, 'Customers are not allowed to change order status.');
    }

    public function bankTransferOrders()
    {
        $orders = Order::whereHas('payment', function ($query) {
            $query->where('payment_method', 'bank_transfer');
        })->with('payment', 'user')->latest()->get();

        return view('users.admin.bank_transfers', compact('orders'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(Stripe $stripe) {}
    public function edit(Stripe $stripe) {}
    public function update(Request $request, Stripe $stripe) {}
    public function destroy(Stripe $stripe) {}
}
