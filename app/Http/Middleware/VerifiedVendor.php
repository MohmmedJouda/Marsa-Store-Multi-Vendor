<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifiedVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();

        // تحقق أولاً من أن المستخدم مسجل دخول ودوره 'vendor'
        if (!$user || $user->role !== 'vendor') {
            return redirect()->route('login')->with('error', 'Access denied.');
        }

        // تحقق من حالة المستندات
        $approvedDocument = $user->vendorDocuments()
                                 ->where('status', 'approved')
                                 ->exists();

        if (!$approvedDocument) {
            // إعادة توجيه إذا لم يكن التاجر معتمد
            return redirect()->route('vendor.register.request')->with('error', 'Your account is not approved yet.');
        }

        return $next($request);
    }
}
