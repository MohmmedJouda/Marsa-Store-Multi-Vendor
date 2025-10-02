<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\customer;
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
        $latest = Product::where('status','active')->with('store.user','subcategory','ratings')->latest()->take(7)->get();
        $mostOrdereds = Product::where('status', 'active')
        ->with('store.user', 'subcategory', 'images','ratings') // جلب العلاقات
        ->withCount('orderItems')                     // يحسب عدد مرات الطلب
        ->orderByDesc('order_items_count')           // ترتيب حسب الأكثر طلبًا
        ->take(7)                                     // أعلى 7 منتجات
        ->get();

        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
        ->where('status', 'open')->get();

        $totalPrice = 0;
        $categories = Category::with('subcategories')->get();

        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $totalPrice += $item->qty * $item->product->price;
            }
        }

    if (Auth::check()) {
        $username = Auth::user()->name;
    } else {
        $username = 'Guest'; // أو أي قيمة افتراضية
    }
        return view('users.customer.main-page',compact('latest','carts','totalPrice','categories','username','mostOrdereds'));
    }

        public function guest()
    {
        $latest = Product::where('status','active')->with('store.user','subcategory','ratings')->latest()->take(7)->get();
        $mostOrdereds = Product::where('status', 'active')
        ->with('store.user', 'subcategory', 'images','ratings') // جلب العلاقات
        ->withCount('orderItems')                     // يحسب عدد مرات الطلب
        ->orderByDesc('order_items_count')           // ترتيب حسب الأكثر طلبًا
        ->take(7)                                     // أعلى 7 منتجات
        ->get();

        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
        ->where('status', 'open')->get();

        $totalPrice = 0;
        $categories = Category::with('subcategories')->get();

        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $totalPrice += $item->qty * $item->product->price;
            }
        }

    if (Auth::check()) {
        $username = Auth::user()->name;
    } else {
        $username = 'Guest'; // أو أي قيمة افتراضية
    }
        return view('users.customer.main-page',compact('latest','carts','totalPrice','categories','username','mostOrdereds'));
    }

    public function product_index(Request $request)
    {
        $query = Product::query();

        // إذا تم تمرير Subcategory
        if ($request->has('subcategory')) {
            $query->where('subcategory_id', $request->subcategory);
        }

        // جلب المنتجات مع Pagination
        $products = $query->paginate(12);
        $categories = Category::with('subcategories')->get();
         $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
        ->where('status', 'open')->get();
        // $averageRate = $products->ratings->avg('rate'); // قيمة بين 1 و 5

        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $totalPrice += $item->qty * $item->product->price;
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest'; // أو أي قيمة افتراضية
        }
        return view('users.customer.products', compact('products','carts','totalPrice','categories','username'));
    }

    public function products_cat_index($id){

    $category = Category::findOrFail($id);
    // الوصول للاسم
    $name = $category->name;

    // استخرج IDs لكل subcategories الخاصة بالكاتيجوري
    $subIds = $category->subcategories()->pluck('id');

    $categories = Category::with('subcategories')->get();
    // اختار منتجات بشكل عشوائي من كل الـ subcategories
    $products = Product::whereIn('subcategory_id', $subIds)
                       ->inRandomOrder()
                       ->take(12) // عدد المنتجات اللي بدك تعرضه
                       ->get();

        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
        ->where('status', 'open')->get();

        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $totalPrice += $item->qty * $item->product->price;
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest'; // أو أي قيمة افتراضية
        }
    return view('users.customer.category_products', compact('category', 'products','carts','totalPrice','name','categories','username'));
    }


    
    public function product_show($id){
    
        $product = Product::with('store.user','subcategory','images','mainImage','variants.attributeValues.attribute','attributes.values','store','ratings')->findOrFail($id);
        $relevantProducts = Product::with('store.user','subcategory')
            ->where('subcategory_id', $product->subcategory_id) // نفس التصنيف
            ->where('id', '!=', $product->id) // استبعاد المنتج الحالي نفسه
            ->inRandomOrder()->take(7)->get();
        $categories = Category::with('subcategories')->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
        ->where('status', 'open')->get();
        $averageRate = $product->ratings->avg('rate'); // قيمة بين 1 و 5

        $totalPrice = 0;
        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $totalPrice += $item->qty * $item->product->price;
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest'; // أو أي قيمة افتراضية
        }

        return view('users.customer.product',compact('product','relevantProducts','carts','totalPrice','categories','username','averageRate'));

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
                $totalPrice += $item->qty * $item->product->price;
            }
        }

        if (Auth::check()) {
            $username = Auth::user()->name;
        } else {
            $username = 'Guest'; // أو أي قيمة افتراضية
        }
        return view('users.customer.stores',compact('stores','carts','totalPrice','categories','username'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function store($id)
    {
        $store = Store::with('user','products.subcategory')->findOrFail($id);
        $products =  Product::where('store_id', $store->id)->with('store.user','subcategory','ratings')->latest()->get();
        $carts = Cart::with(['items.product.mainImage'])->where('user_id', Auth::id())
        ->where('status', 'open')->get();
        
        $totalPrice = 0;
        $categories = Category::with('subcategories')->get();
        // $averageRate = $products->ratings->avg('rate'); // قيمة بين 1 و 5

        foreach ($carts as $cart) {
            foreach ($cart->items as $item) {
                $totalPrice += $item->qty * $item->product->price;
            }
        }

            if (Auth::check()) {
        $username = Auth::user()->name;
    } else {
        $username = 'Guest'; // أو أي قيمة افتراضية
    }
        return view('users.customer.store',compact('store','products','carts','totalPrice','categories','username'));
    }
    
    public function orders_show(Order $order){
        $orders = Order::with('items.product.images')->where('user_id', Auth::id())->get();
        return view('users.customer.orders',compact('orders'));
    }


     public function cancel(Order $order)
    {
        if(!in_array($order->status, ['delivered','refunded'])) {
            $order->update(['status' => 'cancelled']);
        }
        return back();
    }

    public function refund(Order $order)
    {
        if($order->status === 'delivered') {
            $order->update(['status' => 'refunded']);
        }
        return back();
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
    }
}
