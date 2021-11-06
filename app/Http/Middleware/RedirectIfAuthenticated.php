<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
            // return redirect(RouteServiceProvider::HOME);
            if (Auth::user()->hasRole('owner')) {
                return redirect('/owner/dashboard');
            }else if (Auth::user()->hasRole('superadmin')) {
                return redirect('/superadmin/dashboard');
            }else{
                return redirect('/admin/dashboard');
            }
        }

        return $next($request);
    }
}
