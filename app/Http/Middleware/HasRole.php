<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            return redirect('login');
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (! Auth::user()->hasAnyRole($roles)) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
