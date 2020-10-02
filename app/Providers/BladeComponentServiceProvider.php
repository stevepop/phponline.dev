<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
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
        /**
         * Icon Components
         */
        Blade::component('components.logo-image', 'logo-image');
        Blade::component('components.logo-text', 'logo-text');


        /**
         * Site Components
         */
        Blade::component('components.site.site-nav', 'site-nav');
        Blade::component('components.site.site-footer', 'site-footer');

        /**
         * Structural Components
         */
        Blade::component('components.structure.container', 'app-container');
    }
}
