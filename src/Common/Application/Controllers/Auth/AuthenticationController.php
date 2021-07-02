<?php

namespace App\Common\Controllers\Auth;

use App\Controller\BaseController;
use App\Common\Requests\LoginRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticationController extends BaseController
{
	public function registerUser($user)
	{
		event(new Registered($user));
		Auth::login($user);
	}

	public function loginUser(LoginRequest $request, $role)
	{
		$request->authenticate();
		$request->session()->regenerate();

		if ($role == "pengguna") {
			return redirect()->intended(route('home'));
		} else {
			return redirect()->intended(route('admin.home'));
		}
	}

	public function destroy(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();
		
		if ($request->user_type == "pengguna") {
			return redirect()->route('home');
		} else {
			return redirect()->route('admin.login');
		}
	}
}
