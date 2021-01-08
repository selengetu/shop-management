<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Casher
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
        if (Auth::user()->role == 'casher' ||
            Auth::user()->role == 'accountant' ||
            Auth::user()->role == 'admin') {
            return $next($request);
        }
        return redirect('/');
    }
}
