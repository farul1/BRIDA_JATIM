<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // 1. Import View Facade
use App\Models\Setting; // 2. Import Setting Model

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 3. Tambahkan blok kode ini
        // Ini akan mengirimkan data '$settings' ke SEMUA view
        // yang ada di dalam folder 'public_front'.
        View::composer('public_front.*', function ($view) {
            $settings = Setting::all()->pluck('value', 'key');
            $view->with('settings', $settings);
        });
    }
}
