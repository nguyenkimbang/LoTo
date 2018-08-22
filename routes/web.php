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
    return view('welcome');
});

Auth::routes();

/**
 * user route
 */

Route::get('login', 'LoTo\Users\UserController@login');
Route::get('logout', 'LoTo\Users\UserController@logout');
Route::middleware('is.login')->get('/dashboard', 'LoTo\DashboardController@index');
Route::middleware('is.login')->prefix('admin')->group(function () {
	//route User
    Route::get('user/get-data', 'LoTo\Users\UserController@getData');
    Route::resource('user', 'LoTo\Users\UserController');

    //route config
    Route::get('config/system/get-data', 'LoTo\Configs\ConfigController@getDataSystem');
    Route::get('config/get-data', 'LoTo\Configs\ConfigController@getData');
    Route::resource('config', 'LoTo\Configs\ConfigController');

    //route game
    Route::get('game/get-data', 'LoTo\Games\GameController@getData');
    Route::resource('game', 'LoTo\Games\GameController');
});


// Route::post('api/user/login', 'Api\Users\UserController@login');
