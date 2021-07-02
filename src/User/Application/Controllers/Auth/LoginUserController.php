<?php

namespace App\User\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Requests\LoginRequest;

class LoginUserController extends AuthenticationController
{
	public function create()
	{
		return view('layouts.user.auth.login');
	}

	public function store(LoginRequest $request)
	{
		$request->authenticate();
		$request->session()->regenerate();

		return redirect()->intended('/');
	}
}
