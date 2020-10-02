<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', \App\Http\Controllers\Frontend\HomePageAction::class)->name('home');

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
     * @todo Show All Packages
     */

    /**
     * Show a Package
     */
    Route::get('{package}', \App\Http\Controllers\Frontend\Packages\ShowAction::class)->name('show');
});

/**
 * User Group Routes
 */
Route::prefix('user-groups')->as('user-groups:')->group(function () {

    /**
     * @todo Show All User Groups
     */

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

Route::get('blog', function () {
    //
})->name('articles:index');


/**
 * Article Routes
 */
Route::get('{article}', \App\Http\Controllers\Frontend\Articles\ShowAction::class)->name('articles:show');
