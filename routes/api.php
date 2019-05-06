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
Route::group([
    'namespace' => 'API',
    'prefix' => 'v1',
    'middleware' => ['web']
], function () {
    Route::group([
        'namespace' => 'Phong',
        'prefix' => 'phong',
    ], function () {
        Route::get('get-by-khu-nha', 'GetPhongByKhuNha@main');
    });
});
