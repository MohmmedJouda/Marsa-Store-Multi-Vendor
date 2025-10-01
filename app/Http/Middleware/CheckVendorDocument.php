<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckVendorDocument
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role === 'vendor') {
            $latestDoc = $user->documents()->latest()->first();

            if ($latestDoc && in_array($latestDoc->status, ['pending', 'rejected'])) {
                // إعادة التوجيه إلى صفحة انتظار الموافقة
                return redirect()->route('vendor.register.request', ['status' => $latestDoc->status]);
            }
        }

        return $next($request);
    }
}
