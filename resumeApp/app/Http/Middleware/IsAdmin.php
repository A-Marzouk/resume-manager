<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user() &&  Auth::user()->admin == 1) {
            return $next($request);
        }elseif(session()->get('admin') && session()->get('admin') == 'AdminWasHere'){
            return $next($request);
        }
        return redirect(route('freelancer.login'));
    }
}
