<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressesController extends Controller
{
    public function index() {}
    public function create() {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'state' => 'required|in:gaza,westbank',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'postal_code' => 'nullable|string|max:20',
            'variant_id' => 'nullable|integer|exists:product_variants,id',
            'qty' => 'nullable|integer|min:1',
            'shipping_method' => 'nullable|in:standard,express,free',
        ]);

        $order = DB::transaction(function () use ($request, $validated) {
            $address = Address::create([
                'user_id' => Auth::id(),
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone_number'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'address' => $validated['address'],
                'postal_code' => $validated['postal_code'] ?? null,
            ]);

            $items = [];

            if (!empty($validated['variant_id'])) {
                $variant = ProductVariant::with('product')
                    ->lockForUpdate()
                    ->findOrFail($validated['variant_id']);

                abort_unless($variant->product && $variant->product->status === 'active', 404);

                $qty = $validated['qty'] ?? 1;
                abort_unless($variant->quantity >= $qty, 422, 'الكمية المطلوبة غير متوفرة.');

                $items[] = [
                    'product_id' => $variant->product->id,
                    'variant_id' => $variant->id,
                    'price' => $variant->price,
                    'quantity' => $qty,
                    'discount' => (float) ($variant->product->discount ?? 0),
                ];
            } else {
                $cart = \App\Models\Cart::with('items.product')
                    ->where('user_id', Auth::id())
                    ->where('status', 'open')
                    ->first();

                abort_if(!$cart || $cart->items->isEmpty(), 422, 'سلة المشتريات فارغة.');

                foreach ($cart->items as $cartItem) {
                    abort_unless($cartItem->product && $cartItem->product->status === 'active', 422, 'يوجد منتج غير متاح في السلة.');
                    abort_unless($cartItem->qty > 0, 422, 'كمية المنتج غير صالحة.');
                    $items[] = [
                        'product_id' => $cartItem->product_id,
                        'variant_id' => null,
                        'price' => $cartItem->price,
                        'quantity' => $cartItem->qty,
                        'discount' => (float) ($cartItem->product->discount ?? 0),
                    ];
                }
                $cart->update(['status' => 'completed']);
            }

            $subtotal = 0;
            $discount = 0;
            foreach ($items as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $discount += ($item['price'] * $item['quantity'] * $item['discount']) / 100;
            }

            $shippingPlan = $validated['shipping_method'] ?? 'standard';
            $shippingAmount = match ($shippingPlan) {
                'express' => 30,
                'free' => 0,
                default => 15,
            };
            $taxAmount = 5;
            $totalAmount = $subtotal + $shippingAmount + $taxAmount - $discount;

            $lastOrderNumber = Order::where('user_id', Auth::id())->lockForUpdate()->max('order_number');
            $newOrderNumber = $lastOrderNumber ? $lastOrderNumber + 1 : 1;

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => $newOrderNumber,
                'address_id' => $address->id,
                'payment_method' => 'pending',
                'status' => 'pending',
                'shipping_plan' => $shippingPlan,
                'shipping_amount' => $shippingAmount,
                'tax_amount' => $taxAmount,
                'total_amount' => $totalAmount,
                'currency' => 'ils',
            ]);

            foreach ($items as $item) {
                $order->items()->create([
                    'product_id' => $item['product_id'],
                    'product_variant_id' => $item['variant_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                if ($item['variant_id']) {
                    $variant = ProductVariant::lockForUpdate()->findOrFail($item['variant_id']);
                    abort_unless($variant->quantity >= $item['quantity'], 422, 'الكمية المطلوبة غير متوفرة.');
                    $variant->decrement('quantity', $item['quantity']);
                }

                $product = Product::lockForUpdate()->findOrFail($item['product_id']);
                abort_unless($product->status === 'active', 422, 'المنتج غير متاح.');
                abort_unless($product->stock >= $item['quantity'], 422, 'المخزون غير كافٍ.');
                $product->decrement('stock', $item['quantity']);
            }

            return $order;
        });

        return redirect()->route('customer.payment.index', $order->id)
            ->with('success', 'تم حفظ العنوان بنجاح');
    }

    public function show(Address $address) {}
    public function edit(Address $address) {}

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => ['required', 'regex:/^05[0-9]{8}$/'],
            'state' => 'required|in:gaza,westbank',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'postal_code' => 'nullable|string|max:20',
        ]);

        $address->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone_number'],
            'state' => $validated['state'],
            'city' => $validated['city'],
            'address' => $validated['address'],
            'postal_code' => $validated['postal_code'] ?? null,
        ]);

        return redirect()->back()->with('success', 'تم تحديث العنوان بنجاح');
    }

    public function destroy(Address $address) {}
}
