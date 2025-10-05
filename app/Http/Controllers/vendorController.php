<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function updateStorePhoto(Request $request)
    {
        $request->validate([
            'store_photo' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        // تحديث صورة المتجر
        if($request->hasFile('store_photo') && $user->store){
            $store = $user->store;
            if($store->photo_path && Storage::disk('public')->exists($store->photo_path)){
                Storage::disk('public')->delete($store->photo_path);
            }
            $store->update([
                'logo' => $request->file('store_photo')->store('store-photos', 'public')
            ]);
        }

        return redirect()->back()->with('success', 'تم تحديث الصور بنجاح!');
    }

}
