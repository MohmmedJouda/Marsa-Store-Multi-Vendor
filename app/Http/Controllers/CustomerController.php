<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $latest = Product::where('status', 'active')->with('store.user', 'subcategory', 'ratings')->latest()->take(7)->get();
        $mostOrdereds = Product::where('status', 'active')->with('store.user', 'subcategory', 'images', 'ratings')->withCount('orderItems')->orderByDesc('order_items_count')->take(7)->get();
        $products = Product::where('status', 'active')->with('store.user', 'subcategory', 'ratings')->orderBy('discount', 'desc')->take(7)->get();
        foreach ($latest as $latests) $latests->total_sales = $latests->orderItems()->sum('quantity');
        foreach ($mostOrdereds as $mostOrdered) $mostOrdered->total_sales = $mostOrdered->orderItems()->sum('quantity');
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $totalPrice = 0;
        $categories = Category::with('subcategories')->withCount('products')->get();
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        $featuredStores = Store::with(['user', 'ratings', 'products'])->latest()->take(10)->get();
        $wishlistProducts = Auth::check() ? Auth::user()->wishlistProducts()->with(['images', 'store'])->get() : collect();
        $userWishlistIds = $wishlistProducts->pluck('id')->toArray();
        $userCartProductIds = Auth::check() ? CartItem::whereHas('cart', fn ($q) => $q->where('user_id', Auth::id())->where('status', 'open'))->pluck('product_id')->toArray() : [];
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.main-page', compact('latest', 'carts', 'totalPrice', 'categories', 'username', 'mostOrdereds', 'products', 'featuredStores', 'userWishlistIds', 'userCartProductIds', 'wishlistProducts'));
    }

    public function guest()
    {
        $latest = Product::where('status', 'active')->with('store.user', 'subcategory', 'ratings')->latest()->take(7)->get();
        $mostOrdereds = Product::where('status', 'active')->with('store.user', 'subcategory', 'images', 'ratings')->withCount('orderItems')->orderByDesc('order_items_count')->take(7)->get();
        $products = Product::where('status', 'active')->with('store.user', 'subcategory', 'images', 'ratings')->orderBy('discount', 'desc')->take(7)->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $totalPrice = 0;
        $categories = Category::with('subcategories')->withCount('products')->get();
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        $featuredStores = Store::with(['user', 'ratings', 'products'])->latest()->take(10)->get();
        $wishlistProducts = Auth::check() ? Auth::user()->wishlistProducts()->with(['images', 'store'])->get() : collect();
        $userWishlistIds = $wishlistProducts->pluck('id')->toArray();
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.main-page', compact('latest', 'carts', 'totalPrice', 'categories', 'username', 'mostOrdereds', 'products', 'featuredStores', 'userWishlistIds', 'wishlistProducts'));
    }

    public function product_index(Request $request)
    {
        $query = Product::with(['store', 'subcategory', 'ratings'])->where('status', 'active');
        if ($request->filled('category') && $request->category !== 'all') {
            $categoryId = $request->category;
            $query->whereHas('subcategory', fn ($q) => $q->where('category_id', $categoryId));
        }
        if ($request->filled('subcategory')) $query->where('subcategory_id', $request->subcategory);
        if ($request->filled('search')) $query->where('name', 'like', "%{$request->search}%");
        $products = $query->paginate(12)->withQueryString();
        $categories = Category::with('subcategories')->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $totalPrice = 0;
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        foreach ($products as $product) $product->total_sales = $product->orderItems()->sum('quantity');
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.products', compact('products', 'carts', 'totalPrice', 'categories', 'username'));
    }

    public function products_cat_index($id)
    {
        $category = Category::with(['subcategories.products'])->findOrFail($id);
        $name = $category->name;
        $subIds = $category->subcategories()->pluck('id');
        $categories = Category::with('subcategories')->get();
        $products = Product::whereIn('subcategory_id', $subIds)->with(['store.user', 'subcategory', 'images', 'ratings'])->latest()->get();
        if ($products->isEmpty()) $products = Product::with(['store.user', 'subcategory', 'images', 'ratings'])->latest()->get();
        foreach ($products as $product) $product->total_sales = $product->orderItems()->sum('quantity');
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $totalPrice = 0;
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.category_products', compact('category', 'products', 'carts', 'totalPrice', 'name', 'categories', 'username'));
    }

    public function product_show($id)
    {
        $product = Product::with('store.user', 'subcategory', 'images', 'mainImage', 'variants.attributeValues.attribute', 'attributes.values', 'store', 'ratings', 'comments.user', 'comments.rating')->findOrFail($id);
        $relevantProducts = Product::with('store.user', 'subcategory')->where('subcategory_id', $product->subcategory_id)->where('id', '!=', $product->id)->inRandomOrder()->take(7)->get();
        $categories = Category::with('subcategories')->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $averageRate = $product->ratings->avg('rate');
        $totalPrice = 0;
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        foreach ($relevantProducts as $relevantProduct) $relevantProduct->total_sales = $relevantProduct->orderItems()->sum('quantity');
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.product', compact('product', 'relevantProducts', 'carts', 'totalPrice', 'categories', 'username', 'averageRate'));
    }

    public function stores(Request $request)
    {
        $stores = Store::with('user')->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $categories = Category::with('subcategories')->get();
        $totalPrice = 0;
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.stores', compact('stores', 'carts', 'totalPrice', 'categories', 'username'));
    }

    public function store($id)
    {
        $store = Store::with('user', 'products.subcategory')->findOrFail($id);
        $products = Product::where('store_id', $store->id)->with('store.user', 'subcategory', 'ratings')->latest()->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())->where('status', 'open')->get();
        $totalPrice = 0;
        $categories = Category::with('subcategories')->get();
        foreach ($products as $product) $product->total_sales = $product->orderItems()->sum('quantity');
        foreach ($carts as $cart) foreach ($cart->items as $item) if ($item->product) $totalPrice += $item->qty * $item->product->price;
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        return view('users.customer.store', compact('store', 'products', 'carts', 'totalPrice', 'categories', 'username'));
    }

    public function orders_show()
    {
        $orders = Order::with('items.product.images')->where('user_id', Auth::id())->get();
        return view('users.customer.orders', compact('orders'));
    }

    public function cancel(Order $order)
    {
        $this->authorize('cancel', $order);
        $order->update(['status' => 'cancelled']);
        return back();
    }

    public function refund(Order $order)
    {
        $this->authorize('refund', $order);
        $order->update(['status' => 'refunded']);
        return back();
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        if ($request->status === 'delivered') $order->delivered_at = now();
        else $order->delivered_at = null;
        $order->save();
        return back()->with('success', 'تم تحديث حالة الطلب');
    }

    public function toggleWishlist(Request $request)
    {
        if (!Auth::check()) return response()->json(['status' => 'unauthenticated', 'message' => 'يرجى تسجيل الدخول لإضافة المنتجات إلى قائمة الرغبات.'], 401);
        $productId = $request->input('product_id');
        if (!$productId) return response()->json(['status' => 'error', 'message' => 'المنتج غير محدد.'], 400);
        $user = Auth::user();
        $attached = $user->wishlistProducts()->toggle($productId);
        $isWishlisted = count($attached['attached']) > 0;
        $message = $isWishlisted ? 'تمت إضافة المنتج إلى قائمة الرغبات' : 'تمت إزالة المنتج من قائمة الرغبات';
        $productData = null;
        if ($isWishlisted) {
            $p = Product::with(['images', 'store'])->find($productId);
            if ($p) {
                $mainImg = $p->images()->where('is_main', true)->first();
                $productData = ['id' => $p->id, 'name' => $p->name, 'price' => number_format($p->price, 2), 'store_name' => $p->store->name ?? 'متجر عام', 'image_url' => $mainImg ? asset('storage/' . $mainImg->image_path) : asset('images/no-image.png'), 'url' => route('customer.product.show', $p->id)];
            }
        }
        return response()->json(['status' => 'success', 'is_wishlisted' => $isWishlisted, 'message' => $message, 'wishlist_count' => $user->wishlistProducts()->count(), 'product' => $productData]);
    }

    public function moveToCart(Request $request)
    {
        if (!Auth::check()) return response()->json(['status' => 'unauthenticated', 'message' => 'يرجى تسجيل الدخول أولاً.'], 401);
        $productId = $request->input('product_id');
        if (!$productId) return response()->json(['status' => 'error', 'message' => 'المنتج غير محدد.'], 400);
        $product = Product::with(['images', 'store'])->find($productId);
        if (!$product) return response()->json(['status' => 'error', 'message' => 'المنتج غير موجود.'], 404);
        $user = Auth::user();
        try {
            DB::transaction(function () use ($user, $product) {
                $cart = Cart::firstOrCreate(['user_id' => $user->id, 'status' => 'open'], ['status' => 'open']);
                $item = CartItem::firstOrCreate(['cart_id' => $cart->id, 'product_id' => $product->id], ['qty' => 0, 'price' => (float)$product->price, 'name' => $product->name]);
                $item->update(['price' => (float)$product->price, 'name' => $product->name]);
                $item->increment('qty', 1);
                $user->wishlistProducts()->detach($product->id);
            });
        } catch (\Exception $e) {
            \Log::error('moveToCart Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'حدث خطأ أثناء نقل المنتج إلى السلة.'], 500);
        }
        $totalCartItems = CartItem::whereHas('cart', fn ($q) => $q->where('user_id', $user->id)->where('status', 'open'))->count();
        $mainImg = $product->images()->where('is_main', true)->first();
        $productData = ['id' => $product->id, 'name' => $product->name, 'price' => number_format($product->price, 2), 'store_name' => $product->store->name ?? 'متجر عام', 'image_url' => $mainImg ? asset('storage/' . $mainImg->image_path) : asset('images/no-image.png'), 'url' => route('customer.product.show', $product->id)];
        return response()->json(['status' => 'success', 'message' => 'تم نقل المنتج إلى سلة المشتريات بنجاح', 'wishlist_count' => $user->wishlistProducts()->count(), 'cart_count' => $totalCartItems, 'product' => $productData]);
    }
}
