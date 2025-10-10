<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048', // حجم أقصى 2MB
        ]);

        $user = Auth::user();

        // احذف الصورة القديمة إذا موجودة
        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // خزّن الصورة الجديدة
        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->update([
            'profile_photo_path' => $path,
        ]);

        return redirect()->back()->with('user_photo_success', 'تم تحديث الصورة الشخصية بنجاح!');
    }

    public function moderators_show(){
        $users = User::where('role','moderator')->get();
        return view('users.admin.moderators_show',compact('users'));
    }

    public function deleteModerator($id)
{
    // إيجاد المستخدم أو فشل العملية إذا لم يوجد
    $user = User::findOrFail($id);

    // حذف المستخدم
    $user->delete();

    // إعادة توجيه مع رسالة نجاح
    return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
}

public function addModerator(Request $request)
{
    // التحقق من صحة البيانات
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed', 

    ]);

    // إنشاء المدير الجديد
    $manager = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), 
        'role' => 'moderator',
        'created_at'=>now(),
        'email_verified_at'=>now(),
        'is_active'=>1
    ]);

    // إعادة توجيه مع رسالة نجاح
    return redirect()->back()->with('success', 'تم إضافة المدير بنجاح');
}
}
