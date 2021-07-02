<?php

namespace App\User\Middleware\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateUser extends Middleware
{
	protected function redirectTo($request)
	{
		if (!$request->expectsJson()) {
			return route('login');
		}
	}
}
