<?php

namespace App\User\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Models\Pengguna;
use App\Common\Models\User;
use App\Common\Services\MailServiceInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends AuthenticationController
{
	protected $mailSender;
	protected $userRepository;

	public function __construct(MailServiceInterface $mailService, UserRepositoryInterface $userRepository)
	{
		$this->mailSender = $mailService;
		$this->userRepository = $userRepository;
	}

	public function create()
	{
		return view('user.auth.register');
	}

	public function store(StoreUserRequest $request)
	{
		$user = $this->userRepository->create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role' => 'pengguna',
		]);
		$this->registerUser($user);

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'subject' => 'Registrasi Akun Plasmahero'
		];
		$this->mailSender->sendMail($data);

		Pengguna::create([
			'id_user' => Auth::user()->id,
			'status' => 'i'
		]);

		return redirect('/profile')->with(['eSent' => 'Email berhasil dikirim, Periksa email Anda !']);
	}
}
