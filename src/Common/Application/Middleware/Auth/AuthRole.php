<?php

namespace App\Common\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $role)
	{
		if (!Auth::check()) {
			return redirect()->route('login');
		}

		if (Auth::user()->role == 'admin') {
			if ($role == 'admin') {
				return $next($request);
			} else {
				return redirect()->route('admin');
			}
		}

		if (Auth::user()->role == 'pengguna') {
			if ($role == 'admin') {
				return redirect()->route('errorpage');
			} else {
				return $next($request);
			}
		}
	}
}
