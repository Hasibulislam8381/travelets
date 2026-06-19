<?php

namespace App\Providers;

use App\Models\SystemSetting;
use App\Repositories\BookingRepository;
use App\Services\SslCommerzService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SslCommerzService::class);
        $this->app->singleton(BookingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $setting = SystemSetting::first(); // or where('id',1)->first()
            $view->with('setting', $setting);
        });
    }
}
