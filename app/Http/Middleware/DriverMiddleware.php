<?php

namespace App\Http\Middleware;

use Closure;

class DriverMiddleware
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
        $userrole = getUser()->role->name;
        if ($userrole !== 'Driver') {
            return response()->json(['error' => 'Not Authorised'], 401);
        }

        return $next($request);
    }
}
