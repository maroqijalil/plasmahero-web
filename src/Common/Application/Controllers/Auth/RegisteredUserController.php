<?php

namespace App\Common\Controllers\Auth;

use App\Controller\Controller;
use App\Models\User;
use App\Common\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Common\Interfaces\MailServiceInterface;


class RegisteredUserController extends Controller
{
    protected $mailSender;

    public function __construct(MailServiceInterface $mailService)
    {
        $this->mailSender = $mailService;
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required']
        ]);

        $user = User::create([
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
}
