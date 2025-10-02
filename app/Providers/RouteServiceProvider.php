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
        return redirect('/login');
    }

    // تحقق من حالة المستند فقط للمستخدم vendor
    if ($user->role === 'vendor') {
        $latestDoc = $user->documents()->latest()->first();
        if ($latestDoc && in_array($latestDoc->status, ['pending', 'rejected'])) {
            // لا نسمح له بالدخول إلى dashboard
            Auth::logout(); // ✨ مهم لإزالة session
            return redirect()->route('vendor.register.request', ['status' => $latestDoc->status]);
        }
        // approved
        return redirect()->route('vendor.categories.index');
    }

    // توجيه باقي المستخدمين
    return match ($user->role) {
        'customer' => redirect()->route('customer.main-page'),
        'moderator' => redirect()->route('moderator.dashboard'),
        'super_admin' => redirect()->route('admin.dashboard'),
        default => redirect()->route('guest.main-page'),
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
