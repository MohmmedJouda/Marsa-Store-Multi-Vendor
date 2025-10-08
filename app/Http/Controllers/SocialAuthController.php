<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialAuthController extends Controller
{
    /**
     * توجيه المستخدم إلى صفحة تسجيل الدخول في Google
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * استقبال رد Google بعد تسجيل الدخول
     */
    public function handleGoogleCallback()
    {
        try {
            // استخدم stateless لتفادي مشكلة state mismatch
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = $this->getOrCreateSocialUser($googleUser);

            Auth::login($user);

            return redirect('/customer/main-page');
        } catch (Exception $e) {
            // طباعة الخطأ لمعرفة السبب الحقيقي إن حدث فشل
            return redirect('/')
                ->with('error', 'فشل تسجيل الدخول عبر Google: ' . $e->getMessage());
        }
    }

    /**
     * إنشاء أو جلب مستخدم من بيانات Google
     */
    protected function getOrCreateSocialUser($googleUser)
    {
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // إذا كان المستخدم موجود مسبقًا، حدث فقط google_id إن لم يكن موجودًا
            if (!$user->google_id) {
                $user->update(['google_id' => $googleUser->getId()]);
            }
            return $user;
        }

        // إنشاء مستخدم جديد
return User::create([
    'name' => $googleUser->getName(),
    'email' => $googleUser->getEmail(),
    'provider' => 'google',
    'provider_id' => $googleUser->getId(),
    'password' => bcrypt(Str::random(24)),
    'email_verified_at' => now(),
]);

    }



    /**
     * استقبال رد Facebook
     */

    protected function findOrCreateUser($socialUser, $provider)
    {
        $user = User::where('provider_id', $socialUser->getId())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'email_verified_at' => now(),
            ]);
        }

        return $user;
    }
}
