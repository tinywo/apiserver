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

//  PC访问url http://localhost/api/pc/RouterUri
Route::prefix('pc')->namespace('Pc')->group(function () {
    //  近7日平均温度
    Route::any('avgTemp7day', 'TempController@avgTemp7day');
    //  近7日平均湿度
    Route::any('avgHum7day', 'TempController@avgHum7day');
    //  近30日平均温度
    Route::any('avgTemp30day', 'TempController@avgTemp30day');
    //  近30日平均湿度
    Route::any('avgHum30day', 'TempController@avgHum30day');
});
//  APP访问url http://localhost/api/app/RouteUri
Route::prefix('app')->namespace('App')->group(function () {
    //  近7日平均温度
    Route::any('avgTemp7day', 'TempController@avgTemp7day');
    //  近7日平均湿度
    Route::any('avgHum7day', 'TempController@avgHum7day');
    //  近30日平均温度
    Route::any('avgTemp30day', 'TempController@avgTemp30day');
    //  近30日平均湿度
    Route::any('avgHum30day', 'TempController@avgHum30day');
});

Route::get("/test", function () {
    return 'test';
});
