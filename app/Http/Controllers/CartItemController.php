<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\{Cart, CartItem, Product};

class CartItemController extends Controller
{
    protected function activeCartId(): int
    {
        $userId = Auth::id();
        $cart = Cart::firstOrCreate(
            ['user_id' => $userId, 'status' => 'open'],
            ['status' => 'open']
        ); // updateOrCreate/firstOrCreate موثّق
        return $cart->id;
    }

    public function index()
    {

        $categories = Category::with('subcategories')->get();

        $cart = Cart::with(['items.product','items.product.store.user','items.product.subcategory'])
                    ->where('user_id', Auth::id())
                    ->where('status','open')
                    ->first();

        $items = $cart?->items ?? collect();
        $totalQty   = $items->sum('qty');
        $totalPrice = $items->sum(fn($it) => $it->qty * $it->price);

        return view('users.customer.cart', compact('items','totalQty','totalPrice','categories'));
    }

    public function add(Request $request)
{
    $data = $request->validate([
        'product_id' => ['required','integer','exists:products,id'],
        'qty'        => ['nullable','integer','min:1'],
    ]); // توثيق الـ validation. :contentReference[oaicite:3]{index=3}

    $qty = (int) ($data['qty'] ?? 1);     // تأكد تحويلها لعدد صحيح
    $product = Product::findOrFail($data['product_id']);

    DB::transaction(function () use ($product, $qty) {
        $cartId = $this->activeCartId();

        // 1) أنشئ/أحضر السطر بكمية ابتدائية 0 (لا تعتمد على default=1)
        $item = CartItem::firstOrCreate(
            ['cart_id' => $cartId, 'product_id' => $product->id],
            ['qty' => 0, 'price' => (float)$product->price, 'name' => $product->name]
        ); // firstOrCreate مذكورة ضمن ميزات Eloquent. :contentReference[oaicite:4]{index=4}

        // 2) حدّث سنابشوت الاسم والسعر عند كل إضافة (اختياريًا)
        $item->update([
            'price'        => (float)$product->price,
            'name' => $product->name,
        ]);

        // 3) زيّد الكمية بشكل ذري في قاعدة البيانات
        $item->increment('qty', $qty);    // increment موثّقة في Query Builder. :contentReference[oaicite:5]{index=5}
    });

    return redirect()->back()->with('success', 'تمت الإضافة للسلة');
}
    public function update(Request $request, $id)
    {
        $data = $request->validate(['qty' => ['required','integer','min:1']]);

        $item = CartItem::whereHas('cart', fn($q) => 
                    $q->where('user_id', Auth::id())->where('status','open')
                )->where('id', $id)->firstOrFail();

        $item->update(['qty' => $data['qty']]);
        return back()->with('success','تم تحديث الكمية');
    }

    public function remove($id)
{
    $cartItems = CartItem::where('id', $id)
        ->whereHas('cart', function ($q) {
            $q->where('user_id', Auth::id())
              ->where('status', 'open');
        })
        ->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'لا يوجد عناصر مطابقة للحذف');
    }

    foreach ($cartItems as $item) {
        $item->delete();
    }

    return back()->with('success', 'تم حذف العناصر من السلة');
}



    // app/Http/Controllers/CartItemController.php
// app/Http/Controllers/CartItemController.php
public function removeMultiple(Request $request)
{
    $ids = $request->input('selected_items', []);

    if (empty($ids)) {
        return back()->with('error', 'لم يتم تحديد أي عنصر');
    }

    CartItem::whereHas('cart', function($q) {
        $q->where('user_id', Auth::id())->where('status','open');
    })->whereIn('id', $ids)->delete();

    return back()->with('success', 'تم حذف العناصر المحددة من السلة');
}




    public function clear()
    {
        Cart::where('user_id', Auth::id())->where('status','open')
            ->first()?->items()->delete();

        return back()->with('success','تم إفراغ السلة');
    }
}
