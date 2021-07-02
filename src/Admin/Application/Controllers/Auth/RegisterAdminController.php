<?php

namespace App\Admin\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Models\User;
use App\Common\Services\MailServiceInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends AuthenticationController
{
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}
	
	public function create()
	{
		return view('admin.auth.register');
	}

	public function store(StoreUserRequest $request)
	{
		$user = $this->userRepository->create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role' => 'admin',
		]);
		$this->registerUser($user);

		return redirect('/profile')->with(['eSent' => 'Email berhasil dikirim, Periksa email Anda !']);
	}
}
