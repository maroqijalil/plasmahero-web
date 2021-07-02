<?php

namespace App\User\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Requests\LoginRequest;
use App\Common\Repositories\UserRepositoryInterface;

class LoginUserController extends AuthenticationController
{
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create()
	{
		return view('user.auth.login');
	}

	public function store(LoginRequest $request)
	{
		$user = $this->userRepository->getByEmail($request->email);
		
		if ($user != null) {
			if ($user->role == "pengguna") {
				return $this->loginUser($request, "pengguna");
			} else {
				return redirect()->back()->with('error', 'Akun ini bukan Akun Pengguna');
			}
		} else {
			return redirect()->back()->with('error', 'Akun tidak ditemukan');
		}
	}
}
