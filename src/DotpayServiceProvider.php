<?php

namespace Evilnet\Dotpay;

use Evilnet\Dotpay\DotpayApi\DotpayApi;
use Illuminate\Support\ServiceProvider;

class DotpayServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/dotpay.php' => config_path('dotpay.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DotpayApi::class, function ($app) {
            return new DotpayApi($app['config']['dotpay']['api']);
        });

        $this->app->bind('dotpay', function($app) {
            return new DotpayManager($app[DotpayApi::class]);
        });
    }
}