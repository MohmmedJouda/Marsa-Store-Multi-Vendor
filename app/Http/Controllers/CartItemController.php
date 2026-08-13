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
        );
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

        $wishlistProducts = Auth::check() ? Auth::user()->wishlistProducts()->get() : collect();
        $userWishlistIds = $wishlistProducts->pluck('id')->toArray();

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }
        return view('users.customer.cart', compact('items','totalQty','totalPrice','categories','username','userWishlistIds','wishlistProducts'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'qty'        => ['nullable', 'integer', 'min:1'],
        ]);

        if (!Auth::check()) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'status' => 'unauthenticated',
                    'message' => 'يرجى تسجيل الدخول لإضافة المنتجات إلى السلة.'
                ], 401);
            }
            return redirect()->back()->with('warning', 'يرجى تسجيل الدخول لإضافة المنتجات إلى السلة');
        }

        $qty = (int) ($data['qty'] ?? 1);
        $product = Product::with(['images', 'store'])->findOrFail($data['product_id']);

        DB::transaction(function () use ($product, $qty) {
            $cartId = $this->activeCartId();

            $item = CartItem::firstOrCreate(
                ['cart_id' => $cartId, 'product_id' => $product->id],
                ['qty' => 0, 'price' => (float)$product->price, 'name' => $product->name]
            );

            $item->update([
                'price' => (float)$product->price,
                'name'  => $product->name,
            ]);

            $item->increment('qty', $qty);
        });

        $totalCartItems = CartItem::whereHas('cart', function ($q) {
            $q->where('user_id', Auth::id())->where('status', 'open');
        })->count();

        if ($request->wantsJson() || $request->ajax()) {
            $mainImg = $product->images()->where('is_main', true)->first();
            return response()->json([
                'status' => 'success',
                'message' => 'تمت إضافة المنتج إلى سلة المشتريات بنجاح',
                'cart_count' => $totalCartItems,
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => number_format($product->price, 2),
                    'store_name' => $product->store->name ?? 'متجر عام',
                    'image_url' => $mainImg ? asset('storage/' . $mainImg->image_path) : asset('images/no-image.png'),
                    'url' => route('customer.product.show', $product->id),
                ]
            ]);
        }

        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى سلة المشتريات بنجاح');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['qty' => ['required', 'integer', 'min:1']]);

        $item = CartItem::whereHas('cart', fn($q) => 
                    $q->where('user_id', Auth::id())->where('status', 'open')
                )->where('id', $id)->firstOrFail();

        $item->update(['qty' => $data['qty']]);
        return back()->with('success', 'تم تحديث الكمية');
    }

    public function remove($id)
    {
        if (!Auth::check()) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json(['status' => 'unauthenticated', 'message' => 'يرجى تسجيل الدخول أولاً.'], 401);
            }
            return back()->with('error', 'يرجى تسجيل الدخول أولاً');
        }

        $cartItems = CartItem::where('id', $id)
            ->whereHas('cart', function ($q) {
                $q->where('user_id', Auth::id())
                  ->where('status', 'open');
            })
            ->get();

        if ($cartItems->isEmpty()) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json(['status' => 'error', 'message' => 'عنصر السلة غير موجود'], 404);
            }
            return back()->with('error', 'لا يوجد عناصر مطابقة للحذف');
        }

        $productId = $cartItems->first()?->product_id;
        foreach ($cartItems as $item) {
            $item->delete();
        }

        $totalCartItems = CartItem::whereHas('cart', function ($q) {
            $q->where('user_id', Auth::id())->where('status', 'open');
        })->count();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'تمت إزالة المنتج من سلة المشتريات بنجاح',
                'cart_count' => $totalCartItems,
                'item_id' => (int)$id,
                'product_id' => $productId
            ]);
        }

        return back()->with('success', 'تمت إزالة المنتج من سلة المشتريات بنجاح');
    }

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
