<?php

namespace App\Providers;

use App\View\Components\Ui\Alert;
use App\View\Components\Ui\Modal;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::component('modal', Modal::class);
        Blade::component('alert', Alert::class);
    }
}
