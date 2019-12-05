<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotServiceProvider
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='ec_manager')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('service-provider/login');
        }
        return $next($request);

    }
}
