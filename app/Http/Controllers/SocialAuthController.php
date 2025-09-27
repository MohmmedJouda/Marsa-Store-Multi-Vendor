<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = $this->getOrCreateSocialUser($googleUser);

        Auth::login($user);

        return redirect('/customer/main-page');
    }

    protected function getOrCreateSocialUser($googleUser)
{
    $user = User::where('email', $googleUser->getEmail())->first();

    if ($user) {
        return $user;
    }

    return User::create([
        'name' => $googleUser->getName(),
        'email' => $googleUser->getEmail(),
        'google_id' => $googleUser->getId(),
        'password' => bcrypt(Str::random(24)),
        'email_verified_at' => now(),
    ]);
    dd($user->email_verified_at);
}



    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $fbUser = Socialite::driver('facebook')->user();
        $user = $this->findOrCreateUser($fbUser, 'facebook');
        Auth::login($user);
        return redirect('/dashboard');
    }

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

