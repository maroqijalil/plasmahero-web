<?php

namespace App\Admin\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Requests\LoginRequest;
use App\Common\Repositories\UserRepositoryInterface;

class LoginAdminController extends AuthenticationController
{
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create()
	{
		return view('admin.auth.login');
	}

	public function store(LoginRequest $request)
	{
		$user = $this->userRepository->getByEmail($request->email);
		
		if ($user != null) {
			if ($user->role == "admin") {
				return $this->loginUser($request, "admin");
			} else {
				return redirect()->back()->with('error', 'Akun ini bukan Akun Admin');
			}
		} else {
			return redirect()->back()->with('error', 'Akun tidak ditemukan');
		}
	}
}
