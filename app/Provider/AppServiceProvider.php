<?php

namespace App\Provider;

use App\Common\Providers\RepositoryServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->register(RepositoryServiceProvider::class);
	}

	public function boot()
	{
		Schema::defaultstringLength(191);
	}
}
