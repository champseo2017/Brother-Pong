<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Dump
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->id === (int)$request->route('user') ) {
            return $next($request);
        }
        return redirect()->guest('/');
    }
}
