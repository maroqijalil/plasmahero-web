<?php

namespace App\Common\Providers;

use Illuminate\Support\ServiceProvider;
use App\Common\Interfaces\MailServiceInterface;
use App\Common\Services\GmailService;

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
