<?php

namespace App\Common\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateRole
{
	public function handle(Request $request, Closure $next, $role)
	{
		if ($role == 'admin') {
			if (!Auth::check()) {
				return redirect()->route('admin.login');
			}
	
			if (Auth::user()->role == 'admin') {
				return $next($request);
			} else {
				return redirect()->route('admin.error');
			}
		} else if ($role == 'pengguna') {
			if (!Auth::check()) {
				return redirect()->route('login');
			}
			
			return $next($request);
		} else {
			return redirect()->route('home');
		}
	}
}
