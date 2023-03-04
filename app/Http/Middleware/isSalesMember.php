<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isSalesMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role=='team_sales_member')
        return $next($request);
        return abort(403);
        return $next($request);
    }
}
