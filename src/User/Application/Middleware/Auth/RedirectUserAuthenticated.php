<?php

namespace App\User\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectUserAuthenticated
{
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::guard($guard)->check()) {
			$role = Auth::user()->role;

			switch ($role) {
				case 'admin':
					return redirect()->route('admin.home');
					break;
				case 'pengguna':
					return redirect()->route('home');
					break;

				default:
					return redirect()->route('login');
					break;
			}
		}
		return $next($request);
	}
}
