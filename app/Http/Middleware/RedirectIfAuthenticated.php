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

        if(Auth::user()->hasRole(['Admin'])){

        return redirect()->route('admin.home');

        }

        if(Auth::user()->hasRole(['Vendor'])){

        return redirect()->route('vendor.home');

        }
        
        if(Auth::user()->hasRole(['Buyer'])){

        return redirect()->route('buyer.home');

        }
    }

        return $next($request);
    }
}
