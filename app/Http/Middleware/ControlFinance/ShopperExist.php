<?php

namespace App\Http\Middleware\ControlFinance;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShopperExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( Auth::user()->shoppers->count() == 0) {
            return redirect()->route('settingInitial_get');
        }

        return $next($request);
    }
}
