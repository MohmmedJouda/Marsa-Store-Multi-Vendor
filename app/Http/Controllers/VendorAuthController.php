<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\VendorDocument;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VendorAuthController extends Controller
{
    /**
     * عرض نموذج التسجيل للتجار
     */
    public function showRegistrationForm()
    {
        return view('auth.vendor-register');
    }

    /**
     * تسجيل التاجر الجديد
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'store_name' => 'required|string|max:255',
            'document_file' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // إنشاء المستخدم كـ vendor
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'vendor',
            ]);

            // إنشاء المتجر
            $store = Store::create([
                'user_id' => $user->id,
                'name' => $request->store_name,
                'slug' => Str::slug($request->store_name),
            ]);

            // حفظ المستند
            $path = $request->file('document_file')->store('vendor_documents', 'public');
            VendorDocument::create([
                'user_id' => $user->id,
                'document_type' => 'commercial_register',
                'document_url' => $path,
                'status' => 'pending', // وضع افتراضي pending
            ]);

            

            DB::commit();

            // لا نسجل التاجر تلقائيًا

            // توجيه المستخدم إلى صفحة انتظار الموافقة
                $latestDoc = $user->documents()->latest()->first();
            if ($latestDoc && in_array($latestDoc->status, ['pending', 'rejected'])) {
                // رجعه لصفحة انتظار الموافقة
                return view('users.vendor.registerOrderSuccess',compact('latestDoc'));
            }
                return redirect()->route('vendor.categories.index');
                } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء إنشاء حساب التاجر.');
        }
    }

    // public function documentStatus(){
    //         // Auth::login($user); // ❌ مُعلق
    //             $latestDoc = $user->documents()->latest()->first();
    //         if ($latestDoc && in_array($latestDoc->status, ['pending', 'rejected'])) {
    //             // رجعه لصفحة انتظار الموافقة
    //             return view('users.vendor.registerOrderSuccess',compact('latestDoc'));
    //         }
    //             return redirect()->route('vendor.categories.index');
        
    // }
    public function updateStatus(Request $request, VendorDocument $document)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $document->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'تم تحديث حالة الطلب بنجاح ✅');
    }
}
