<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::post('login', 'Api\LoTo\Users\UserController@login');
    Route::resource('/', 'Api\LoTo\Users\UserController');
});

Route::prefix('loto')->group(function () {
	//route config
    Route::post('config/remove', 'Api\LoTo\Configs\ConfigController@removeConfig');
    Route::resource('config', 'Api\LoTo\Configs\ConfigController');

    //rout game
    Route::resource('game', 'Api\LoTo\Games\GameController');
});
