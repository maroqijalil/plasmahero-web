<?php

namespace App\User\Controllers\Auth;

use App\Common\Controllers\Auth\AuthenticationController;
use App\Common\Models\Pengguna;
use App\Common\Services\MailServiceInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Repositories\PenggunaRepositoryInterface;
use App\Common\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

class RegisterUserController extends AuthenticationController
{
	protected $mailSender;

	public function __construct(MailServiceInterface $mailService)
	{
		$this->mailSender = $mailService;
	}

	public function create()
	{
		return view('user.auth.register');
	}

	public function store(StoreUserRequest $request)
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$user = $userRepository->create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role' => 'pengguna',
		]);
		$this->registerUser($user);

		$penggunaRepository = App::make(PenggunaRepositoryInterface::class);
		$pengguna = $penggunaRepository->create([
			'id_user' => Auth::user()->id,
			'status' => 'i'
		]);
		$user->pengguna()->save($pengguna);

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'subject' => 'Registrasi Akun Plasmahero'
		];
		$this->mailSender->sendMail($data);

		return redirect()->route('donor.index', ['first' => true])->with(['email_verif' => 'Email berhasil dikirim, Periksa email Anda !']);
	}
}
