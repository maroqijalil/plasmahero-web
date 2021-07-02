<?php

use App\Common\Controllers\Auth\AuthenticatedSessionController;
use App\Common\Controllers\Auth\ConfirmablePasswordController;
use App\Common\Controllers\Auth\EmailVerificationNotificationController;
use App\Common\Controllers\Auth\EmailVerificationPromptController;
use App\Common\Controllers\Auth\NewPasswordController;
use App\Common\Controllers\Auth\PasswordResetLinkController;
use App\Common\Controllers\Auth\RegisteredUserController;
use App\Common\Controllers\Auth\VerifyEmailController;
use App\Common\Controllers\Auth\AuthenticationController;
use App\User\Controllers\Auth\RegisterUserController;
use App\User\Controllers\Auth\LoginUserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest.user'], function () {
	Route::get('/daftar', [RegisterUserController::class, 'create'])->name('register');
	Route::post('/daftar', [RegisterUserController::class, 'store'])->name('register.store');
	
	Route::get('/masuk', [LoginUserController::class, 'create'])->name('login');
	Route::post('/masuk', [LoginUserController::class, 'store'])->name('login.store');

	Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
	Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

	Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
	Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::group(['middleware' => 'auth.user'], function () {
	Route::post('/keluar', [AuthenticationController::class, 'destroy'])->name('logout');
});

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
	->middleware('auth')
	->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
	->middleware(['auth', 'signed', 'throttle:6,1'])
	->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
	->middleware(['auth', 'throttle:6,1'])
	->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
	->middleware('auth')
	->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
	->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
	->middleware('auth')
	->name('admin.logout');
