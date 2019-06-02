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
], function () {
    Route::group([
        'namespace' => 'Phong',
        'prefix' => 'phong',
    ], function () {
        Route::get('get-by-khu-nha', 'GetPhongByKhuNhaController@main');
    });
    Route::group([
        'namespace' => 'HoaDonDichVu',
        'prefix' => 'hoa-don-dich-vu',
    ], function () {
        Route::put('thanh-toan', 'ThanhToanController@main');
    });

    Route::group([
        'namespace' => 'HoaDonPhong',
        'prefix' => 'hoa-don-phong',
    ], function () {
        Route::put('thanh-toan', 'ThanhToanController@main');
    });

    Route::group([
        'namespace' => 'TaiKhoan',
        'prefix' => 'tai-khoan',
    ], function () {
        Route::put('vo-hieu-hoa', 'VoHieuHoaController@main');
    });

    Route::group([
        'namespace' => 'BinhLuan',
        'prefix' => 'binh-luan',
    ], function () {
        Route::post('', 'ThemBinhLuanController@main');
    });
});
//Route::group([
//    'namespace' => 'API',
//    'prefix' => 'v2'
//], function () {
//
//});
