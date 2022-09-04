<?php

namespace MahdiAslami\Laravel\Lang;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('fa'),
        ], 'mahdiaslami-lang-fa');
    }
}
