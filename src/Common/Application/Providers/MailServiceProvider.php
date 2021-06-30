<?php

namespace App\Common\Providers;

use App\Common\Services\MailServiceInterface;
use App\Common\Services\GmailService;
use App\Common\Services\MailTrapService;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
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
		$this->app->bind(MailServiceInterface::class, GMailService::class);
		// $this->app->bind(MailServiceInterface::class, MailTrapService::class);
	}
}
