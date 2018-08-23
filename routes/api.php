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


Route::prefix('loto')->group(function () {
    //route User
    Route::post('user/get-data', 'Api\LoTo\Users\UserController@getData');
    Route::post('user/login', 'Api\LoTo\Users\UserController@login');
    Route::resource('user', 'Api\LoTo\Users\UserController');

    //route config setting
    Route::post('config/setting/get-data', 'Api\LoTo\Configs\Settings\SystemSettingController@getData');
    Route::post('config/setting/edit', 'Api\LoTo\Configs\Settings\SystemSettingController@edit');
    Route::post('config/setting/remove', 'Api\LoTo\Configs\Settings\SystemSettingController@remove');
    Route::resource('config/setting', 'Api\LoTo\Configs\Settings\SystemSettingController');

    //route config
    Route::post('config/get-data', 'Api\LoTo\Configs\ConfigController@getData');
    Route::post('config/remove', 'Api\LoTo\Configs\ConfigController@removeConfig');
    Route::resource('config', 'Api\LoTo\Configs\ConfigController');

    //rout game
    Route::post('game/get-data', 'Api\LoTo\Games\GameController@getData');
    Route::resource('game', 'Api\LoTo\Games\GameController');

    //route config setting
    Route::post('category/get-data', 'Api\LoTo\Categories\CategoryController@getData');
    Route::post('category/edit', 'Api\LoTo\Categories\CategoryController@edit');
    Route::post('category/remove', 'Api\LoTo\Categories\CategoryController@remove');
    Route::resource('category', 'Api\LoTo\Categories\CategoryController');
});
