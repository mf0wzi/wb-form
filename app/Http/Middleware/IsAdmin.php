<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {
        $check_auth = Auth::check();
        $is_admin = Auth::user()->role;

        if($check_auth) {
            if ($is_admin != 1 && $is_admin != 2) {
                return abort(404);
            }
        }

        return $next($request);
    }
}
