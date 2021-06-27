<?php

namespace App\Common\Controllers\Auth;

use App\Controller\BaseController;
use App\Common\Models\User;
use App\Common\Providers\RouteServiceProvider;
use App\Common\Interfaces\MailServiceInterface;
use App\Common\Interfaces\UserRepositoryInterface;
use App\Common\Services\MailTrapService;
use App\Common\Requests\StoreUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends BaseController
{
	protected $mailSender;
	protected $userRepository;

	public function __construct(MailServiceInterface $mailService, UserRepositoryInterface $userRepository)
	{
		$this->mailSender = $mailService;
		$this->userRepository = $userRepository;
	}
	/**
	 * Display the registration view.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(StoreUserRequest $request)
	{
		$user = $this->userRepository->create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role' => $request->role,
		]);

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'subject' => 'Registrasi Akun Plasmahero'
		];

		event(new Registered($user));

		Auth::login($user);

		$user = User::where('email', $request->email)->first();
		if ($user['role'] == 'admin') {
			return redirect('/admin');
		} else {
			$this->mailSender->sendMail($data);
			return redirect('/profile')->with(['eSent' => 'Email berhasil dikirim, Periksa email Anda !']);
		}
	}

	public function fetch()
	{
		$users = $this->userRepository->all();
		return $this->sendResponse($users, "Daftar pengguna berhasil di dapatkan");
	}
}
