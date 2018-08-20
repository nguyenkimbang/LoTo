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
    Route::post('login', 'Api\Users\UserController@login');
    Route::resource('/', 'Api\Users\UserController');
});

Route::prefix('loto')->group(function () {
    Route::resource('game', 'Api\LoTo\Games\GameController');
});
