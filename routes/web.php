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

//, 'middleware' => ['isAdmin', 'auth'], 'guard' => 'admin'
Route::group(['prefix' => ''], function () {
    Route::get('', 'User\HomeController@index')->name('trang-chu');

    Route::get('don-dang-ky', 'User\HomeController@donDangKy')->name('don-dang-ky');
    Route::post('don-dang-ky', 'User\HomeController@guiDonDangKy');

    Route::get('don-xin-huy', 'User\HomeController@donXinHuy')->name('don-xin-huy');
    Route::post('don-xin-huy', 'User\HomeController@guiDonXinHuy');
});

Route::group(['prefix' => 'admin'], function () {
   Route::get('/', function () {
      return view('admin.layouts.home'); 
   })->name('admin.home');

    Route::group(['prefix' => 'chuc-vu'], function () {
        Route::get('', 'Admin\ChucVuController@index')->name('danhSachChucVu');
        Route::get('them', 'Admin\ChucVuController@create')->name('themChucVu');
        Route::post('them', 'Admin\ChucVuController@store');
        Route::get('sua/{id}', 'Admin\ChucVuController@edit')->name('suaChucVu');
        Route::post('sua/{id}', 'Admin\ChucVuController@update');
        Route::get('xoa/{id}', 'Admin\ChucVuController@destroy')->name('xoaChucVu');
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
        Route::post('sua/{id}', 'Admin\SinhVienController@update');
        Route::get('xoa/{id}', 'Admin\NhanVienController@destroy')->name('xoaSinhVien');
    });

    Route::group(['prefix' => 'don-dang-ky'], function () {
        Route::get('', 'Admin\DonXinNoiTruController@index')->name('danhSachDonDangKy');
        Route::get('chon-phong/don-dang-ki={id}', 'Admin\DonXinNoiTruController@showPhong')->name('danhSachPhongChon');
    });

    Route::group(['prefix' => 'hop-dong'], function () {
        Route::get('', 'Admin\HopDongController@index')->name('danhSachHopDong');
        Route::get('don-dang-ky={id}&phong={idPhong}', 'Admin\HopDongController@create')->name('taoHopDong');
        Route::post('don-dang-ky={id}&phong={idPhong}', 'Admin\HopDongController@store');
    });

    Route::group(['prefix' => 'hoa-don-phong'], function () {
        Route::get('', 'Admin\HoaDonPhongController@index')->name('danhSachHDP');
    });

    Route::group(['prefix' => 'hoa-don-dich-vu'], function () {
        Route::get('', 'Admin\HoaDonDichVuController@index')->name('danhSachHDDV');
        Route::get('them', 'Admin\HoaDonDichVuController@create')->name('themHDDV');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
