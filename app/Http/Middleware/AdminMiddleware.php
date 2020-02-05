<?php

namespace App\Http\Middleware;

use Closure;
use Exception;


class AdminMiddleware
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
        if ($userrole !== 'Admin') {
            return response()->json(['error' => 'Not Authorised'], 401);
        }

        return $next($request);
    }
}
