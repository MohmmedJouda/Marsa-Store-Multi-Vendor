<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latest = Product::where('status', 'active')->with('store.user', 'subcategory', 'ratings')->latest()->take(7)->get();
        $mostOrdereds = Product::where('status', 'active')
            ->with('store.user', 'subcategory', 'images', 'ratings')
            ->withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->take(7)
            ->get();
        $products = Product::where('status', 'active')
            ->with('store.user', 'subcategory', 'ratings')
            ->orderBy('discount', 'desc')
            ->take(7)
            ->get();

        foreach ($latest as $latests) {
            $latests->total_sales = $latests->orderItems()->sum('quantity');
        }

        foreach ($mostOrdereds as $mostOrdered) {
            $mostOrdered->total_sales = $mostOrdered->orderItems()->sum('quantity');
        }

        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();

        $totalPrice = 0;
        $categories = Category::with('subcategories')->withCount('products')->get();

        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        $featuredStores = Store::with(['user', 'ratings', 'products'])->latest()->take(10)->get();
        $wishlistProducts = Auth::check() ? Auth::user()->wishlistProducts()->with(['images', 'store'])->get() : collect();
        $userWishlistIds = $wishlistProducts->pluck('id')->toArray();

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }
        return view('users.customer.main-page', compact('latest', 'carts', 'totalPrice', 'categories', 'username', 'mostOrdereds', 'products', 'featuredStores', 'userWishlistIds', 'wishlistProducts'));
    }

    public function guest()
    {
        $latest = Product::where('status', 'active')->with('store.user', 'subcategory', 'ratings')->latest()->take(7)->get();
        $mostOrdereds = Product::where('status', 'active')
            ->with('store.user', 'subcategory', 'images', 'ratings')
            ->withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->take(7)
            ->get();
        $products = Product::where('status', 'active')
            ->with('store.user', 'subcategory', 'ratings')
            ->orderBy('discount', 'desc')
            ->take(7)
            ->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();

        $totalPrice = 0;
        $categories = Category::with('subcategories')->withCount('products')->get();

        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        $featuredStores = Store::with(['user', 'ratings', 'products'])->latest()->take(10)->get();
        $wishlistProducts = Auth::check() ? Auth::user()->wishlistProducts()->with(['images', 'store'])->get() : collect();
        $userWishlistIds = $wishlistProducts->pluck('id')->toArray();

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }
        return view('users.customer.main-page', compact('latest', 'carts', 'totalPrice', 'categories', 'username', 'mostOrdereds', 'products', 'featuredStores', 'userWishlistIds', 'wishlistProducts'));
    }

    public function product_index(Request $request)
    {
        $query = Product::with(['store', 'subcategory', 'ratings'])->where('status', 'active');

        if ($request->filled('category') && $request->category !== 'all') {
            $categoryId = $request->category;
            $query->whereHas('subcategory', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }

        if ($request->filled('subcategory')) {
            $query->where('subcategory_id', $request->subcategory);
        }

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'like', "%{$searchTerm}%");
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::with('subcategories')->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();

        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        foreach ($products as $product) {
            $product->total_sales = $product->orderItems()->sum('quantity');
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }
        return view('users.customer.products', compact('products', 'carts', 'totalPrice', 'categories', 'username'));
    }

    public function products_cat_index($id)
    {
        $category = Category::with(['subcategories.products'])->findOrFail($id);
        $name = $category->name;
        $subIds = $category->subcategories()->pluck('id');

        $categories = Category::with('subcategories')->get();

        $products = Product::whereIn('subcategory_id', $subIds)
            ->with(['store.user', 'subcategory', 'images', 'ratings'])
            ->latest()
            ->get();

        if ($products->isEmpty()) {
            $products = Product::with(['store.user', 'subcategory', 'images', 'ratings'])
                ->latest()
                ->get();
        }

        foreach ($products as $product) {
            $product->total_sales = $product->orderItems()->sum('quantity');
        }

        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();

        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }

        return view('users.customer.category_products', compact('category', 'products', 'carts', 'totalPrice', 'name', 'categories', 'username'));
    }

    public function product_show($id)
    {
        $product = Product::with('store.user', 'subcategory', 'images', 'mainImage', 'variants.attributeValues.attribute', 'attributes.values', 'store', 'ratings', 'comments.user', 'comments.rating')->findOrFail($id);
        $relevantProducts = Product::with('store.user', 'subcategory')
            ->where('subcategory_id', $product->subcategory_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()->take(7)->get();
        $categories = Category::with('subcategories')->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();
        $averageRate = $product->ratings->avg('rate');

        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        foreach ($relevantProducts as $relevantProduct) {
            $relevantProduct->total_sales = $relevantProduct->orderItems()->sum('quantity');
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }

        return view('users.customer.product', compact('product', 'relevantProducts', 'carts', 'totalPrice', 'categories', 'username', 'averageRate'));
    }

    public function stores(Request $request)
    {
        $stores = Store::with('user')->get();

        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();

        $categories = Category::with('subcategories')->get();
        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }
        return view('users.customer.stores', compact('stores', 'carts', 'totalPrice', 'categories', 'username'));
    }

    public function store($id)
    {
        $store = Store::with('user', 'products.subcategory')->findOrFail($id);
        $products = Product::where('store_id', $store->id)->with('store.user', 'subcategory', 'ratings')->latest()->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
            ->where('status', 'open')->get();

        $totalPrice = 0;
        $categories = Category::with('subcategories')->get();

        foreach ($products as $product) {
            $product->total_sales = $product->orderItems()->sum('quantity');
        }

        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                if ($item->product) {
                    $totalPrice += $item->qty * $item->product->price;
                }
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest';
        }
        return view('users.customer.store', compact('store', 'products', 'carts', 'totalPrice', 'categories', 'username'));
    }

    public function orders_show(Order $order)
    {
        $orders = Order::with('items.product.images')->where('user_id', Auth::id())->get();
        return view('users.customer.orders', compact('orders'));
    }

    public function cancel(Order $order)
    {
        if (!in_array($order->status, ['delivered', 'refunded'])) {
            $order->update(['status' => 'cancelled']);
        }
        return back();
    }

    public function refund(Order $order)
    {
        if ($order->status === 'delivered') {
            $order->update(['status' => 'refunded']);
        }
        return back();
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;

        if ($request->status === 'delivered') {
            $order->delivered_at = now();
        } else {
            $order->delivered_at = null;
        }

        $order->save();

        return back()->with('success', 'تم تحديث حالة الطلب');
    }

    public function toggleWishlist(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => 'يرجى تسجيل الدخول لإضافة المنتجات إلى قائمة الرغبات.'
            ], 401);
        }

        $productId = $request->input('product_id');
        if (!$productId) {
            return response()->json(['status' => 'error', 'message' => 'المنتج غير محدد.'], 400);
        }

        $user = Auth::user();
        $attached = $user->wishlistProducts()->toggle($productId);

        $isWishlisted = count($attached['attached']) > 0;
        $message = $isWishlisted ? 'تمت إضافة المنتج إلى قائمة الرغبات' : 'تمت إزالة المنتج من قائمة الرغبات';

        return response()->json([
            'status' => 'success',
            'is_wishlisted' => $isWishlisted,
            'message' => $message,
            'wishlist_count' => $user->wishlistProducts()->count(),
        ]);
    }

    public function moveToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'unauthenticated', 'message' => 'يرجى تسجيل الدخول أولاً.'], 401);
        }

        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'المنتج غير موجود.'], 404);
        }

        $user = Auth::user();

        // 1. Add item to open cart
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'open'],
            ['status' => 'open']
        );

        $item = CartItem::firstOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product->id],
            ['name' => $product->name, 'price' => $product->price, 'qty' => 0]
        );
        $item->increment('qty', 1);

        // 2. Remove from wishlist
        $user->wishlistProducts()->detach($productId);

        $totalCartItems = CartItem::whereHas('cart', function($q) use ($user) {
            $q->where('user_id', $user->id)->where('status', 'open');
        })->sum('qty');

        return response()->json([
            'status' => 'success',
            'message' => 'تم نقل المنتج إلى سلة المشتريات بنجاح',
            'wishlist_count' => $user->wishlistProducts()->count(),
            'cart_count' => $totalCartItems
        ]);
    }
}
