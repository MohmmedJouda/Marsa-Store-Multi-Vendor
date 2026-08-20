<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Webhook;
use UnexpectedValueException;
use Stripe\Exception\SignatureVerificationException;

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
        $selectedMethod = $request->input('payment_method', 'pay_on_delivery');
        $discount = 0;
        $productDiscount = 0;

        $username = Auth::user()->name;

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
            'amount' => (int) round($order->total_amount * 100),
            'currency' => 'ils',
            'metadata' => ['order_id' => $order->id],
        ]);

        PaymentMethod::updateOrCreate(
            ['order_id' => $order->id],
            ['payment_method' => 'credit_card']
        );

        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    }

    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook_secret');

        if (!$secret || !$signature) {
            return response()->json(['error' => 'Invalid webhook request.'], 400);
        }

        try {
            $event = Webhook::constructEvent($payload, $signature, $secret);
        } catch (UnexpectedValueException|SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid webhook signature.'], 400);
        }

        if ($event->type === 'payment_intent.succeeded') {
            $intent = $event->data->object;
            $orderId = $intent->metadata->order_id ?? null;

            if ($orderId) {
                $order = Order::find($orderId);
                if ($order && in_array($order->status, ['pending', 'payment_pending'], true)) {
                    $order->update([
                        'status' => 'shipping',
                        'payment_method' => 'credit_card',
                    ]);

                    $order->payment()->updateOrCreate(
                        ['order_id' => $order->id],
                        ['payment_method' => 'credit_card', 'payment_confirmed_at' => now()]
                    );
                }
            }
        }

        return response()->json(['received' => true]);
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
