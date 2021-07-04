<?php

namespace App\Admin\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectAdminAuthenticated
{
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::guard($guard)->check()) {
			$role = Auth::user()->role;

			switch ($role) {
				case 'admin':
					return redirect()->route('admin.dashboard');
					break;
				case 'pengguna':
					return redirect()->route('home');
					break;

				default:
					return redirect()->route('admin.login');
					break;
			}
		}
		return $next($request);
	}
}
