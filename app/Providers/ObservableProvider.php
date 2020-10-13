<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\Podcast;
use App\Models\User;
use App\Observers\PackageObserver;
use App\Observers\PodcastObserver;
use App\Observers\UserObserver;
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
        User::observe(UserObserver::class);
        Package::observe(PackageObserver::class);
        Podcast::observe(PodcastObserver::class);
    }
}
