<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @param  string $rolja
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
		if(auth()->check() && auth()->user()->checkIfUserIs($role))
			return $next($request);
	
		return back()->with('error', 'You don\'t have permissions to execute this action!');
    }
}
