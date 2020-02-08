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

//Route::get('/test', 'IndexController@index')->name('test');

//  访问url http://localhost/api/RouterUri
Route::group(['namespace' => 'Api'], function () {
    //  近7日平均温度
    Route::any('temp/avgTemp7day', 'TempController@avgTemp7day');
});

Route::get("/test", function () {
    return 'test';
});
