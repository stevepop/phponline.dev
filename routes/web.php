<?php

use Illuminate\Support\Facades\Route;

/**
 * Authenticated Routes
 */
Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->as('dashboard:')->group(function () {

    /**
     * Main Dashboard
     */
    Route::get('/', \App\Http\Controllers\Dashboard\IndexAction::class)->name('index');
});


Route::get('/', \App\Http\Controllers\Frontend\HomePageAction::class)->name('home');
Route::get('about', \App\Http\Controllers\Frontend\AboutPageAction::class)->name('about');
Route::get('contact-us', \App\Http\Controllers\Frontend\ContactPageAction::class)->name('contact');


/**
 * Category Routes
 */
Route::prefix('category')->as('categories:')->group(function () {
    /**
     * Show a Category
     */
    Route::get('{category}', \App\Http\Controllers\Frontend\Categories\ShowAction::class)->name('show');
});

/**
 * Package Routes
 */
Route::prefix('packages')->as('packages:')->group(function () {

    /**
     * Show All Packages
     */
    Route::get('/', \App\Http\Controllers\Frontend\Packages\IndexAction::class)->name('index');

    /**
     * Show a Package
     */
    Route::get('{package}', \App\Http\Controllers\Frontend\Packages\ShowAction::class)->name('show');
});

/**
 * Podcast Routes
 */
Route::prefix('podcasts')->as('podcasts:')->group(function () {

    /**
     * Show all podcasts
     */
    Route::get('/', \App\Http\Controllers\Frontend\Podcasts\IndexAction::class)->name('index');
});

/**
 * User Group Routes
 */
Route::prefix('user-groups')->as('user-groups:')->group(function () {

    /**
     * Show All User Groups
     */
    Route::get('/', \App\Http\Controllers\Frontend\UserGroups\IndexAction::class)->name('index');

    /**
     * Show a User Group
     */
    Route::get('{userGroup}', \App\Http\Controllers\Frontend\UserGroups\ShowAction::class)->name('show');

    /**
     * Show a User Groups Events
     */
    Route::prefix('{userGroup}/events')->as('events:')->group(function () {

        /**
         * Show all Events
         */
        Route::get('/', \App\Http\Controllers\Frontend\UserGroups\Events\IndexAction::class)->name('index');

        /**
         * Show an Event from a User Group
         */
        Route::get('{event}', \App\Http\Controllers\Frontend\UserGroups\Events\ShowAction::class)->name('show');
    });
});

/**
 * @todo Submit a Link
 * @todo Manage My Links
 * @todo Manage My Packages
 * @todo Manage My User Groups
 * @todo Manage My Events
 */

/**
 * @todo Admin
 * @todo Admin Stats
 * @todo Admin Tasks
 */

/**
 * Show all Blog Posts
 */
Route::get('blog', \App\Http\Controllers\Frontend\Articles\IndexAction::class)->name('articles:index');

/**
 * Show all Beginner Blog posts
 */
Route::get('beginners', \App\Http\Controllers\Frontend\Articles\Levels\BeginnerAction::class)->name('articles:beginner');

/**
 * Show all Intermediate Blog posts
 */
Route::get('intermediate', \App\Http\Controllers\Frontend\Articles\Levels\IntermediateAction::class)->name('articles:intermediate');

/**
 * Show all Advanced Blog posts
 */
Route::get('advanced', \App\Http\Controllers\Frontend\Articles\Levels\AdvancedAction::class)->name('articles:advanced');


/**
 * Track Click Through
 */
Route::get('clicks/{click}', \App\Http\Controllers\Clicks\TrackAction::class)->name('click:track');

/**
 * Article Routes
 */
Route::get('{article}', \App\Http\Controllers\Frontend\Articles\ShowAction::class)->name('articles:show');
