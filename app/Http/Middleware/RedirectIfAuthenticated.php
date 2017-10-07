<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

//认证重定向
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //不同的guard调转到不同的页面
            $url = $guard ? 'admin/home':'/home';
            return redirect($url);
        }

        return $next($request);
    }
}
