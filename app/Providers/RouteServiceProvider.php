<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;

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
        $this->defineLoginRedirectRoute();
        $this->defineLogoutRedirect();
    }

    /**
     * تعريف مسار إعادة التوجيه بعد تسجيل الدخول
     */
    protected function defineLoginRedirectRoute(): void
    {
        Route::middleware('web')->get('/redirect-after-login', function () {
            $user = Auth::user();

            if (!$user) {
                // إعادة توجيه افتراضي إذا لم يكن هناك مستخدم
                return redirect('/login');
            }

            // التوجيه حسب دور المستخدم
            return match ($user->role) {
                'vendor' => redirect()->route('vendor.dashboard'),
                'customer' => redirect()->route('customer.main-page'),
                'moderator' => redirect()->route('moderator.dashboard'),
                'super_admin' => redirect()->route('admin.dashboard'),
                default => redirect()->route('customer.main-page'),
            };
        })->name('login.redirect');
    }

    /**
     * تعريف التوجيه بعد تسجيل الخروج
     */
    protected function defineLogoutRedirect(): void
    {
        $this->app->singleton(LogoutResponse::class, function () {
            return new class implements LogoutResponse {
                public function toResponse( $request)
                {
                    // توجيه الجميع بعد logout مباشرة إلى صفحة تسجيل الدخول
                    return redirect('/login');
                }
            };
        });
    }
}
