<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckNormalRole
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
        if(auth()->user()->role_id == 1 or auth()->user()->role_id == 2 or auth()->user()->role_id == 3) {
            return $next($request);
        } else {
           return back();

        }
    }
}
