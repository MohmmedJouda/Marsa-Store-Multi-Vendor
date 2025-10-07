<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CheckoutController extends Controller
{
    // عرض صفحة الدفع
    public function showCheckout(Request $request)
    {
        $variantId = $request->query('variant_id');
        $qty = $request->query('qty');

        $variant = ProductVariant::with('product.store','attributeValues.attribute')->findOrFail($variantId);

        if ($qty > $variant->quantity) {
            return redirect()->back()->with('error', 'الكمية المطلوبة أكبر من المتوفرة.');
        }

        $subtotalPrice = $variant->price * $qty;

        $discountPercent = $variant->product->discount ?? 0;
        $discountAmount = ($subtotalPrice * $discountPercent) / 100;
        $totalPriceAfterDiscount = $subtotalPrice - $discountAmount;

       // الشحن والضرائب
        $shippingMethod = $request->shipping_method ?? 'standard';

        // حساب السعر حسب طريقة الشحن
        if ($shippingMethod === 'express') {
            $shippingAmount = 30;
        } elseif ($shippingMethod === 'standard') {
            $shippingAmount = 15;
        } elseif ($shippingMethod === 'free') {
            $shippingAmount = 0;
        } else {
            $shippingAmount = 15; // fallback
        }

        // لتحديد الخيار المحدد مسبقاً في الواجهة
        $selectedShipping = $request->input('shipping_method', 'standard');

        $taxAmount = 5;      // مثال ثابت

        $addresses = Address::where('user_id', Auth::id())->get();

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest'; // أو أي قيمة افتراضية
        }

        return view('users.customer.checkout', compact(
            'variant',
            'qty','subtotalPrice',
                    'discountAmount','totalPriceAfterDiscount',
                    'shippingAmount','taxAmount',
                    'selectedShipping','addresses',
                    'username'
        ));
    }


    // إنشاء PaymentIntent
    public function createPaymentIntent(Request $request): JsonResponse
    {
        $request->validate([
            'shipping_method' => 'required|string',
            'email' => 'required|email',
            'variant_id' => 'nullable|integer|exists:product_variants,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $items = [];

        // شراء مباشر
        if ($request->filled('variant_id')) {
            $variant = ProductVariant::with('product')->findOrFail($request->variant_id);
            $qty = $request->input('quantity', 1);

            $items[] = [
                'product_id' => $variant->product->id,
                'variant_id' => $variant->id,
                'name' => $variant->product->name,
                'price' => $variant->price,
                'quantity' => $qty,
                'product_discount' => $variant->product->discount ?? 0,
            ];
        } else {
            // شراء من السلة
            $cart = session()->get('cart', []);
            if (empty($cart)) {
                return response()->json(['error' => 'السلة فارغة'], 400);
            }
            $items = $cart;
        }

        // حساب subtotal, الخصم, الشحن, الضريبة
        $subtotal = 0;
        $discount = 0;
        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            // خصم المنتج
            $productDiscount = $item['product_discount'] ?? 0;
            $discount += ($item['price'] * $item['quantity'] * $productDiscount) / 100;
        }

        $shippingAmount = $request->shipping_method === 'express' ? 10 : 5;
        $taxAmount = $subtotal * 0.05; // 5% ضريبة

        $total = $subtotal + $shippingAmount + $taxAmount - $discount;

        // إنشاء الطلب
        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
            'total_amount' => $total,
            'shipping_amount' => $shippingAmount,
            'tax_amount' => $taxAmount,
            'currency' => 'usd',
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_variant_id' => $item['variant_id'] ?? null,
                'quantity' => $item['quantity'],
                'price'               => $item['price'],
                // 'unit_price' => round($item['price'] * 100),
                // 'total_price' => round($item['price'] * $item['quantity'] * 100),

            ]);
        }

        // إنشاء Stripe PaymentIntent
        Stripe::setApiKey(config('services.stripe.secret'));
        $pi = \Stripe\PaymentIntent::create([
            'amount' => round($total * 100), // بالسنت
            'currency' => $order->currency,
            'metadata' => ['order_id' => $order->id],
            'receipt_email' => $request->email,
        ]);

        $order->update(['payment_intent_id' => $pi->id]);

        return response()->json(['clientSecret' => $pi->client_secret]);
    }

    public function store(Request $request)
    {

    }

     public function update(Request $request, Address $address)
    {


    }


}
