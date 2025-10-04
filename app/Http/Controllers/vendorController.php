<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order;

class vendorController extends Controller
{
    public function index(){

    $storeId = Auth::user()->store->id; // افتراض أن التاجر مرتبط بمتجر واحد

    $orders = Order::whereHas('items.product', function($query) use ($storeId) {
        $query->where('store_id', $storeId);
    })
    ->with(['items.product', 'payment'])
    ->get();

    return view('users.vendor.orders', compact('orders'));    

    }


     public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'الطلب غير موجود.');
        }

        $order->delete();

        return redirect()->back()->with('success', 'تم حذف الطلب بنجاح.');
    }

}
