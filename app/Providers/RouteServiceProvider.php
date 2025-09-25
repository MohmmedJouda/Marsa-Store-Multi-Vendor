<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->booted(function () {
            Route::middleware('web')->get('/redirect-after-login', function () {
                $user = Auth::user();

                // التوجيه بناءً على دور المستخدم
                return match ($user->role) {
                    'vendor' => redirect()->route('vendor.dashboard'), // التأكد من أنه يوجه إلى /vendor/dashboard
                    'customer' => redirect()->route('customer.main-page'),
                    'moderator' => redirect()->route('moderator.dashboard'),
                    'super_admin' => redirect()->route('admin.dashboard'),
                    default => redirect()->route('dashboard'), // التوجيه الافتراضي
                };
            })->name('login.redirect');
        });
    }
}
