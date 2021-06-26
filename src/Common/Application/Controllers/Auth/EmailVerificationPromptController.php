<?php

namespace App\Common\Controllers\Auth;

use App\Controller\BaseController;
use App\Common\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends BaseController
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email');
    }
}
