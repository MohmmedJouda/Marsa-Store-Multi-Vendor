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
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request, Order $order)
{
    // جلب كل عناصر الطلب
    $items = $order->items()->with('variant','variant.product')->get();

    // المجموع الفرعي
    $subtotal = $items->sum(fn($item) => $item->total_price);

    // الضرائب وإجمالي الطلب
    $taxAmount = $order->tax_amount;
    $total = $order->total_amount;

    $paymentReference = 'ORDER' . $order->id . '-' . now()->format('YmdHis');
    $order->bank_reference = $paymentReference;
    $selectedMethod = $request->input('payment_method', 'pay_on_delivery');

    
    $productDiscount = $item['product_discount'] ?? 0;
    $discount = 0;

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    $paymentIntent = \Stripe\PaymentIntent::create([
  'amount' => intval($order->total_amount * 100),
  'currency' => $order->currency ?? 'usd',
  'metadata' => ['order_id' => $order->id],
]);

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest'; // أو أي قيمة افتراضية
        }

    return view('users.customer.payment', compact(
  'order',
 'items',
            'subtotal',
            'taxAmount',
            'total',
            'productDiscount',
            'discount',
            'username',
            'selectedMethod',
            'paymentReference'
            ));
}

        public function credit_card( Order $order){
        // return redirect()->route('customer.orders.show', $order->id)->with('success','تمت عملية الدفع بنجاح');
        Stripe::setApiKey(config('services.stripe.secret')); // secret key من .env

        // إنشاء PaymentIntent
        $paymentIntent = PaymentIntent::create([
            'amount' => $order->total_amount * 100, // Stripe يحتاج المبلغ بالـ "cents"
            'currency' => 'ils',
            'metadata' => [
            'order_id' => $order->id
            ]
        ]);

        // ✅ إنشاء سجل الدفع
        $payment = PaymentMethod::create([
            'order_id'       => $order->id,
            'payment_method' => 'credit_card',
            'payment_confirmed_at' => now(),
        ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret
            ]);
        }
    
       public function updateOrderStatus(Order $order)
{
        $order->update([
            'status' => 'shipping',
            'payment_method' => 'credit_card',
        ]);

        return response()->json(['success' => true]);
    }

    public function bankTransferOrders()
{
    $orders = Order::whereHas('payment', function ($query) {
        $query->where('payment_method', 'bank_transfer');
    })
    ->with('payment', 'user')
    ->latest()
    ->get();

    return view('users.admin.bank_transfers', compact('orders'));
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
