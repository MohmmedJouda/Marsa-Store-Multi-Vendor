<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Order;
use Stripe\Stripe;
use Stripe\PaymentIntent;
class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function process(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // اجلب معلومات المنتج من الـ request
        $variantId = $request->variant_id;
        $quantity = $request->quantity;
        $shippingMethod = $request->shipping_method;
        $email = $request->email;

        // حساب المجموع (مثال)
        $unitPrice = 1000; // مثلا 10$ بالسنت
        $shippingCost = $shippingMethod === 'express' ? 500 : 0;
        $totalAmount = $unitPrice * $quantity + $shippingCost;

        // إنشاء Order مؤقت لتخزين الـ order_id في metadata
        $order = Order::create([
            'user_id' => auth()->id() ?? null,
            'variant_id' => $variantId,
            'quantity' => $quantity,
            'shipping_method' => $shippingMethod,
            'total_amount' => $totalAmount,
            'status' => 'delivered',
            'email' => $email
        ]);

        // إنشاء PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $totalAmount,
            'currency' => 'usd',
            'metadata' => [
            'order_id' => $order->id
            ]
        ]);

        if ($paymentIntent->status === 'succeeded') {
        // الدفع ناجح → تحديث حالة الطلب إلى "shipping"
        $order = Order::find($paymentIntent->metadata->order_id);
        $order->update(['status' => 'shipping']);

        // استدعاء Job لتحديث الحالة لاحقًا حسب خطة الشحن
        UpdateOrderStatusJob::dispatch($order)->delay(now()->addMinutes(0)); // يبدأ مباشرة
}


        return response()->json([
            'clientSecret' => $paymentIntent->client_secret
        ]);
    }

    public function index(Order $order)
{
    // جلب كل عناصر الطلب
    $items = $order->items()->with('variant','variant.product')->get();

    // المجموع الفرعي
    $subtotal = $items->sum(fn($item) => $item->total_price);

    // الضرائب وإجمالي الطلب
    $taxAmount = $order->tax_amount;
    $total = $order->total_amount;

    $productDiscount = $item['product_discount'] ?? 0;
    $discount = 0;

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    $paymentIntent = \Stripe\PaymentIntent::create([
  'amount' => intval($order->total_amount * 100),
  'currency' => $order->currency ?? 'usd',
  'metadata' => ['order_id' => $order->id],
]);

    return view('users.customer.payment', compact(
  'order',
 'items',
            'subtotal',
            'taxAmount',
            'total',
            'productDiscount',
            'discount'
            ));
}

    public function checkoutSuccess(Order $order){
        return redirect()->back()->with('success','تمت عملية الدفع بنجاح');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stripe $stripe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stripe $stripe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stripe $stripe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stripe $stripe)
    {
        //
    }
}
