<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();

        if ($user && !$user->is_verified) {
            // منع الدخول وإعادة التوجيه لصفحة رسالة أو الصفحة الرئيسية
            return redirect()->route('verification.notice')->with('error', 'يجب التحقق من حسابك أولاً.');
        }

        return $next($request);
    }
}
