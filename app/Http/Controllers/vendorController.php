<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\order as Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class vendorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $store = $user->store;

        if (!$store) {
            return view('users.vendor.dashboard', [
                'store' => null,
                'totalProducts' => 0,
                'activeProducts' => 0,
                'trashedProducts' => 0,
                'totalOrders' => 0,
                'pendingOrders' => 0,
                'completedOrders' => 0,
                'totalRevenue' => 0,
                'recentOrders' => collect(),
                'topProducts' => collect(),
                'categoriesCount' => 0,
                'averageRating' => 5.0,
                'salesLabels' => ['اليوم 1', 'اليوم 2', 'اليوم 3', 'اليوم 4', 'اليوم 5', 'اليوم 6', 'اليوم 7'],
                'salesData' => [0, 0, 0, 0, 0, 0, 0],
            ]);
        }

        $storeId = $store->id;
        $totalProducts = Product::where('store_id', $storeId)->count();
        $activeProducts = Product::where('store_id', $storeId)->where('status', 'active')->count();
        $trashedProducts = Product::onlyTrashed()->where('store_id', $storeId)->count();
        $ordersQuery = Order::whereHas('items.product', function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        });
        $totalOrders = (clone $ordersQuery)->count();
        $pendingOrders = (clone $ordersQuery)->whereIn('status', ['pending', 'processing', 'قيد الانتظار', 'قيد التجهيز'])->count();
        $completedOrders = (clone $ordersQuery)->whereIn('status', ['delivered', 'completed', 'مكتمل'])->count();
        $totalRevenue = OrderItem::whereHas('product', function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })->sum(DB::raw('price * quantity'));
        $recentOrders = (clone $ordersQuery)->with(['user', 'items.product', 'payment'])->latest()->take(6)->get();
        $topProducts = Product::where('store_id', $storeId)->with(['mainImage', 'subcategory'])->withCount('orderItems')->orderBy('order_items_count', 'desc')->take(5)->get();
        $categoriesCount = Category::count();
        $averageRating = round($store->ratings()->avg('rate') ?? 5.0, 1);
        $salesLabels = [];
        $salesData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = \Carbon\Carbon::now()->subDays($i);
            $salesLabels[] = $date->format('d/m');
            $dayRevenue = OrderItem::whereHas('product', function ($query) use ($storeId) {
                $query->where('store_id', $storeId);
            })->whereHas('order', function ($query) use ($date) {
                $query->whereDate('created_at', $date->format('Y-m-d'));
            })->sum(DB::raw('price * quantity'));
            $salesData[] = (float) round($dayRevenue, 2);
        }
        return view('users.vendor.dashboard', compact('store', 'totalProducts', 'activeProducts', 'trashedProducts', 'totalOrders', 'pendingOrders', 'completedOrders', 'totalRevenue', 'recentOrders', 'topProducts', 'categoriesCount', 'averageRating', 'salesLabels', 'salesData'));
    }

    public function index()
    {
        $storeId = Auth::user()->store->id;
        $orders = Order::whereHas('items.product', function ($query) use ($storeId) {
            $query->where('store_id', $storeId);
        })->with(['items.product', 'payment'])->get();
        return view('users.vendor.orders', compact('orders'));
    }

    public function destroy($id)
    {
        $storeId = Auth::user()->store?->id;
        $order = Order::whereKey($id)
            ->whereHas('items.product', fn ($query) => $query->where('store_id', $storeId))
            ->firstOrFail();

        $order->delete();
        return redirect()->back()->with('success', 'تم حذف الطلب بنجاح.');
    }

    public function updateStorePhoto(Request $request)
    {
        $request->validate(['store_photo' => 'nullable|image|max:2048']);
        $user = Auth::user();
        if ($request->hasFile('store_photo') && $user->store) {
            $store = $user->store;
            if ($store->photo_path && Storage::disk('public')->exists($store->photo_path)) Storage::disk('public')->delete($store->photo_path);
            $store->update(['logo' => $request->file('store_photo')->store('store-photos', 'public')]);
        }
        return redirect()->back()->with('store_photo_success', 'تم تحديث صورة المتجر بنجاح!');
    }

    public function updateSlogan(Request $request)
    {
        $request->validate(['slogan' => 'nullable|string|max:255']);
        $store = auth()->user()->store;
        $store->update(['slogan' => $request->slogan]);
        return redirect()->back()->with('success', 'تم تحديث العبارة الدعائية بنجاح!');
    }
}
