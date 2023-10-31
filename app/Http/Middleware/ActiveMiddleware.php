<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if ((Auth::user()->active == '1')) {
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('message', 'الرجاء تسجيل الدخول لعرض الصفحة');
        }
        return $next($request);
    }
}
