<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminAuth
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
        if (auth()->check()){
            if (auth()->user()->isAdmin()){
                return $next($request);
            }
            return redirect('/404');
        }
        return redirect('/404');
    }
}
