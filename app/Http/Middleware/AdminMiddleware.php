<?php

namespace App\Http\Middleware;

use Closure;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userrole = getUser()->role->name;
        if ($userrole !== 'Admin') {
            if (auth()->check()) {
//                return redirect('home')->with('error', 'Not Authorised to access admin');
            }
//            return response()->json(['error' => 'Not Authorised'], 401);
        }

        return $next($request);
    }
}
