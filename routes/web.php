<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('home');
});

Auth::routes();

/**
 * user route
 */
Route::get('test', 'HomeController@index');

Route::get('login', 'LoTo\Users\UserController@login');
Route::get('logout', 'LoTo\Users\UserController@logout');
Route::middleware('is.login')->get('/dashboard', 'LoTo\DashboardController@index');
Route::middleware('is.login')->prefix('admin')->group(function () {
    //route User
    Route::get('user/get-data', 'LoTo\Users\UserController@getData');
    Route::resource('user', 'LoTo\Users\UserController');

    //route system setting
    Route::get('config/setting/edit/{code}', 'LoTo\Configs\Settings\SystemSettingController@edit');
    Route::get('config/setting/get-data', 'LoTo\Configs\Settings\SystemSettingController@getData');
    Route::resource('config/setting', 'LoTo\Configs\Settings\SystemSettingController');

    //route config
    Route::get('config/edit/{code}', 'LoTo\Configs\ConfigController@edit');
    // Route::get('config/get-data', 'LoTo\Configs\ConfigController@getData');
    Route::resource('config', 'LoTo\Configs\ConfigController');

    //route game
    Route::get('game/get-data', 'LoTo\Games\GameController@getData');
    Route::resource('game', 'LoTo\Games\GameController');

    //route post
    Route::get('post/edit/{id}', 'LoTo\Categories\Posts\PostController@edit');
    Route::resource('post', 'LoTo\Categories\Posts\PostController');

    //route category
    Route::get('category/edit/{code}', 'LoTo\Categories\CategoryController@edit');
    // Route::get('category/get-data', 'LoTo\Categories\CategoryController@getData');
    Route::resource('category', 'LoTo\Categories\CategoryController');
});

// Route::post('api/user/login', 'Api\Users\UserController@login');
