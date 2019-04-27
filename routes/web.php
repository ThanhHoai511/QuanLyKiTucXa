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

Route::get('', 'User\HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
   Route::get('/', function () {
      return view('admin.layouts.home'); 
   })->name('admin.home');

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

    Route::group(['prefix' => 'tin-tuc'], function () {
        Route::get('', 'Admin\TinTucController@index')->name('danhSachTinTuc');
        Route::get('them', 'Admin\TinTucController@create')->name('themTinTuc');
        Route::post('them', 'Admin\TinTucController@store');
        Route::get('sua/{id}', 'Admin\TinTucController@edit')->name('suaTinTuc');
        Route::post('sua/{id}', 'Admin\TinTucController@update');
        Route::post('xu-ly/{id}', 'Admin\TinTucController@handle')->name('approve');
        Route::get('xoa/{id}', 'Admin\TinTucController@destroy')->name('xoaTinTuc');
    });

    Route::group(['prefix' => 'phong'], function () {
        Route::get('', 'Admin\PhongController@index')->name('danhSachPhong');
        Route::get('them', 'Admin\PhongController@create')->name('themPhong');
        Route::post('them', 'Admin\PhongController@store');
        Route::get('them-excel', 'Admin\PhongController@importExcel')->name('themPhongExcel');
        Route::post('them-excel', 'Admin\PhongController@storeExcel');
        Route::get('sua/{id}', 'Admin\PhongController@edit')->name('suaPhong');
        Route::post('sua/{id}', 'Admin\PhongController@update');
        Route::get('xoa/{id}', 'Admin\PhongController@destroy')->name('xoaPhong');
    });

    Route::group(['prefix' => 'co-so-vat-chat'], function () {
        Route::get('', 'Admin\CoSoVatChatController@index')->name('danhSachCSVC');
        Route::get('them', 'Admin\CoSoVatChatController@create')->name('themCSVC');
        Route::post('them', 'Admin\CoSoVatChatController@store');
        Route::get('them-excel', 'Admin\CoSoVatChatController@importExcel')->name('themCSVCExcel');
        Route::post('them-excel', 'Admin\CoSoVatChatController@storeExcel');
        Route::get('sua/{id}', 'Admin\CoSoVatChatController@edit')->name('suaCSVC');
        Route::post('sua/{id}', 'Admin\CoSoVatChatController@update');
        Route::get('xoa/{id}', 'Admin\CoSoVatChatController@destroy')->name('xoaCSVC');
    });

    Route::group(['prefix' => 'dich-vu'], function () {
        Route::get('', 'Admin\DichVuController@index')->name('danhSachDichVu');
        Route::get('them', 'Admin\DichVuController@create')->name('themDichVu');
        Route::post('them', 'Admin\DichVuController@store');
        Route::get('sua/{id}', 'Admin\DichVuController@edit')->name('suaDichVu');
        Route::post('sua/{id}', 'Admin\DichVuController@update');
        Route::get('xoa/{id}', 'Admin\DichVuController@destroy')->name('xoaDichVu');
    });

    Route::group(['prefix' => 'nhan-vien'], function () {
        Route::get('', 'Admin\NhanVienController@index')->name('danhSachNhanVien');
        Route::get('them', 'Admin\NhanVienController@create')->name('themNhanVien');
        Route::post('them', 'Admin\NhanVienController@store');
        Route::get('sua/{id}', 'Admin\NhanVienController@edit')->name('suaNhanVien');
        Route::post('sua/{id}', 'Admin\NhanVienController@update');
        Route::get('xoa/{id}', 'Admin\NhanVienController@destroy')->name('xoaNhanVien');
    });

    Route::group(['prefix' => 'tai-khoan'], function () {
        Route::get('', 'Admin\TaiKhoanController@index')->name('danhSachTaiKhoan');
    });

    Route::group(['prefix' => 'sinh-vien'], function () {
        Route::get('', 'Admin\SinhVienController@index')->name('danhSachSinhVien');
        Route::get('them-excel', 'Admin\SinhVienController@create')->name('themExcel');
        Route::post('them-excel', 'Admin\SinhVienController@store');
        Route::get('sua/{id}', 'Admin\SinhVienController@edit')->name('suaSinhVien');
    });
});
