<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CountryCheck
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
        // if($request->country && !in_array($request->country, array("us", "in"))) {
        //     return redirect("noaccess");
        // }
        // return $next($request);

        if($request->country && !in_array($request->country, array("us", "in"))) {
            return redirect("noaccess");
        }
        return $next($request);
    }
}
