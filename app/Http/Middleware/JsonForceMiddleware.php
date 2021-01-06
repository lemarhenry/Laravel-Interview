<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonForceMiddleware
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
//alway accwpt json an return json
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
