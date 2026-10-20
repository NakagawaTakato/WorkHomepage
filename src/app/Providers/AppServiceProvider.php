<?php

namespace App\Providers;

use App\Mail\Transport\MicrosoftGraphTransport;
use App\Services\MicrosoftOAuth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Mail::extend('microsoft-graph', function () {
            return new MicrosoftGraphTransport($this->app->make(MicrosoftOAuth::class));
        });
    }
}
