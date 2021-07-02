<?php

namespace App\Common\Controllers\Auth;

use App\Controller\BaseController;
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

	public function destroy(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();
		
		return redirect()->route('home');
	}
}
