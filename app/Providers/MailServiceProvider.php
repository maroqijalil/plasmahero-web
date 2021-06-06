<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MailServiceInterface;
use App\Services\GmailService;

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
    }
}
