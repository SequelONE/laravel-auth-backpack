<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('menu-item', 'MenuItemCrudController');
    Route::crud('context', 'ContextCrudController');
    Route::get('purge', 'CacheCrudController@cachePurge');

    Route::post('switch-layout', function (Request $request) {
        $theme = 'backpack.theme-'.$request->get('theme', 'tabler').'::';
        Session::put('backpack.ui.view_namespace', $theme);

        if ($theme === 'backpack.theme-tabler::') {
            Session::put('backpack.theme-tabler.layout', $request->get('layout', 'horizontal'));
        }

        return Redirect::back();
    })->name('tabler.switch.layout');

    // ------------------
    // AJAX Chart Widgets
    // ------------------
    Route::get('charts/users', 'Charts\LatestUsersChartController@response');
    Route::get('charts/new-entries', 'Charts\NewEntriesChartController@response');
}); // this should be the absolute last line of this file
