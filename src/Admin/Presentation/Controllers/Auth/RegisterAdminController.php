<?php

namespace App\Admin\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Repositories\AdminRepositoryInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

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

		$adminRepository = App::make(AdminRepositoryInterface::class);
		$admin = $adminRepository->create([
			'id_user' => Auth::user()->id
		]);
		$user->admin()->save($admin);

		return redirect()->route('admin.dashboard');
	}
}
