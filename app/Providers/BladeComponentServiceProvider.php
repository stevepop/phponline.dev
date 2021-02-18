<?php

namespace App\Providers;

use App\View\Components\Articles\ArticleCard;
use App\View\Components\Articles\ArticleForm;
use App\View\Components\Packages\DependencyList;
use App\View\Components\Packages\PackageCard;
use App\View\Components\Pocasts\PodcastCard;
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

        Blade::component('components.icons.rss', 'icon-rss');
        Blade::component('components.icons.plus', 'icon-plus');
        Blade::component('components.icons.link', 'icon-link');
        Blade::component('components.icons.share', 'icon-share');
        Blade::component('components.icons.users', 'icon-users');
        Blade::component('components.icons.trash', 'icon-trash');
        Blade::component('components.icons.link-external', 'icon-link-external');
        Blade::component('components.icons.music', 'icon-music');
        Blade::component('components.icons.calendar', 'icon-calendar');
        Blade::component('components.icons.pencil', 'icon-pencil');
        Blade::component('components.icons.archive', 'icon-archive');
        Blade::component('components.icons.bookmark', 'icon-bookmark');
        Blade::component('components.icons.bookmark-alt', 'icon-bookmark-alt');
        Blade::component('components.icons.pencil-alt', 'icon-pencil-alt');
        Blade::component('components.icons.microphone', 'icon-microphone');
        Blade::component('components.icons.packagist', 'icon-packagist');


        /**
         * Illustration Components
         */
        Blade::component('components.illustrations.working', 'illustration-working');


        /**
         * Site Components
         */
        Blade::component('components.site.site-nav', 'site-nav');
        Blade::component('components.site.site-footer', 'site-footer');

        /**
         * Structural Components
         */
        Blade::component('components.structure.link', 'app-link');
        Blade::component('components.structure.container', 'app-container');
        Blade::component('components.structure.header', 'app-header');
        Blade::component('components.structure.simple-cta', 'app-simple-cta');


        /**
         * Dashboard Statistics
         */
        Blade::component('components.statistics.card', 'app-stat-card');

        /**
         * Article Components
         */
        Blade::component(ArticleCard::class, 'app-article-card');
        Blade::component(ArticleForm::class, 'app-article-form');


        /**
         * Package Components
         */
        Blade::component(PackageCard::class, 'app-package-card');
        Blade::component(DependencyList::class, 'app-package-dependency-list');
        Blade::component(\App\View\Components\Packages\Manage\PackageCard::class, 'app-manage-package-card');

        /**
         * Podcasts Components
         */
        Blade::component(PodcastCard::class, 'app-podcast-card');
    }
}
