<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\QRCodeServiceInterface;
use App\Services\SimpleQRCodeService;

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
        $this->app->bind(QRCodeServiceInterface::class, SimpleQRCodeService::class);
    }
}
