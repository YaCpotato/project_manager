<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\GoogleCalendarService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GoogleCalendarService', GoogleCalendarService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
