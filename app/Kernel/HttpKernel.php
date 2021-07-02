<?php

namespace App\Kernel;

use Illuminate\Foundation\Http\Kernel;

class HttpKernel extends Kernel
{
	protected $middleware = [
		// App\Common\Middleware\TrustHosts::class,
		\App\Common\Middleware\TrustProxies::class,
		\Fruitcake\Cors\HandleCors::class,
		\App\Common\Middleware\PreventRequestsDuringMaintenance::class,
		\Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
		\App\Common\Middleware\TrimStrings::class,
		\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
	];

	protected $middlewareGroups = [
		'web' => [
			\App\Common\Middleware\EncryptCookies::class,
			\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
			\Illuminate\Session\Middleware\StartSession::class,
			// \Illuminate\Session\Middleware\AuthenticateSession::class,
			\Illuminate\View\Middleware\ShareErrorsFromSession::class,
			\App\Common\Middleware\VerifyCsrfToken::class,
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
		],

		'api' => [
			\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
			'throttle:api',
			\Illuminate\Routing\Middleware\SubstituteBindings::class,
		],
	];

	protected $routeMiddleware = [
		// Fix auth middleware
		'auth.role' => \App\Common\Middleware\Auth\AuthenticateRole::class,
		'auth.user' => \App\User\Middleware\Auth\AuthenticateUser::class,
		'auth.admin' => \App\Admin\Middleware\Auth\AuthenticateAdmin::class,
		'guest.user' => \App\User\Middleware\Auth\RedirectUserAuthenticated::class,
		'guest.admin' => \App\Admin\Middleware\Auth\RedirectAdminAuthenticated::class,
		
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
		'can' => \Illuminate\Auth\Middleware\Authorize::class,
		'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
		'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
		'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
		'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
	];
}
