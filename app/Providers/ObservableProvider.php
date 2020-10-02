<?php

namespace App\Providers;

use App\Models\Package;
use App\Observers\PackageObserver;
use Illuminate\Support\ServiceProvider;

class ObservableProvider extends ServiceProvider
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
        Package::observe(PackageObserver::class);
    }
}
