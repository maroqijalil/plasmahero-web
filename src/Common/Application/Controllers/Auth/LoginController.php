<?php

namespace App\Common\Controllers\Auth;

use App\Controller\BaseController;
use App\Common\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    // public function redirectTo()
    // {
    //     $role = Auth::user()->role;

    //     if (in_array('admin', $role)) {
    //         return redirect('/admin');
    //     } elseif (in_array('user', $role)) {
    //         return redirect('/user');
    //     } else {
    //         return redirect('/welcome');
    //     }

    //     // switch ($role) {
    //     //     case "x":
    //     //         return '/admin';
    //     //         break;
    //     //     case "admin":
    //     //         return '/admin';
    //     //         break;
    //     //     case "user":
    //     //         return '/';
    //     //         break;

    //     //     default:
    //     //         return '/home';
    //     //         break;
    //     // }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
