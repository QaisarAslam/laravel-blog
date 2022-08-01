<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Http\Request;
class CheckRole
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
    	foreach ($request->user()->roles as $role) {
    		// dd($role);
    		if ($role->id != 1) // '1' = admin
    		{
    			return abort(404);
    		}
    	}
        return $next($request);
    }
}
