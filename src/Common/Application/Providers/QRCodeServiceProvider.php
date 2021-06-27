<?php

namespace App\Common\Providers;

use Illuminate\Support\ServiceProvider;
use App\Common\Interfaces\QRCodeServiceInterface;
use App\Common\Services\SimpleQRCodeService;
use App\Common\Services\ChillerlanQRCodeService;

class QRCodeServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->bind(QRCodeServiceInterface::class, ChillerlanQRCodeService::class);
	}
}
