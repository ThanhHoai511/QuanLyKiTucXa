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
    return view('admin.layouts.home');
});

Route::group(['prefix' => 'admin'], function () {
   Route::get('home', function () {
      return view('admin.layouts.home');
   });

   Route::group(['prefix' => 'khu-nha'], function () {
      Route::get('', 'Admin\KhuNhaController@index')->name('danhSachKhuNha');
      Route::get('them', 'Admin\KhuNhaController@create')->name('themKhuNha');
      Route::post('them', 'Admin\KhuNhaController@store');
      Route::get('sua/{id}', 'Admin\KhuNhaController@edit')->name('suaKhuNha');
      Route::post('sua/{id}', 'Admin\KhuNhaController@update');
      Route::get('xoa/{id}', 'Admin\KhuNhaController@destroy')->name('xoaKhuNha');
   });

    Route::group(['prefix' => 'loai-phong'], function () {
        Route::get('', 'Admin\LoaiPhongController@index')->name('danhSachLoaiPhong');
        Route::get('them', 'Admin\LoaiPhongController@create')->name('themLoaiPhong');
        Route::post('them', 'Admin\LoaiPhongController@store');
        Route::get('sua/{id}', 'Admin\LoaiPhongController@edit')->name('suaLoaiPhong');
        Route::post('sua/{id}', 'Admin\LoaiPhongController@update');
        Route::get('xoa/{id}', 'Admin\LoaiPhongController@destroy')->name('xoaLoaiPhong');
    });
});
