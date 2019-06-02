<?php

namespace App\Http\Controllers\Admin;

use App\Services\HoaDonDichVuService;
use App\Services\KhuNhaServices;
use App\Services\PhongService;
use App\Services\PhongSinhVienService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $phongService;
    protected $khuNhaService;
    protected $phongSinhVienService;
    protected $hoaDonDichVuService;

    public function __construct(PhongService $phongService, KhuNhaServices $khuNhaService,
                                PhongSinhVienService $phongSinhVienService,
                                HoaDonDichVuService $hoaDonDichVuService)
    {
        $this->phongService = $phongService;
        $this->khuNhaService = $khuNhaService;
        $this->phongSinhVienService = $phongSinhVienService;
        $this->hoaDonDichVuService = $hoaDonDichVuService;
    }
    public function index()
    {
        $khuNha = $this->khuNhaService->getAll();
        foreach($khuNha as $kn)
        {
            $kn->phong = $this->phongService->getPhongByKhuNha($kn->id);
        }
        return view('admin.layouts.home', ['khuNha' => $khuNha]);
    }

    public function getSinhVienDangNoiTru()
    {
        $sinhVien = $this->phongSinhVienService->getAll();

        return view('admin.thongke.sinh-vien-dang-noi-tru', ['sinhVien' => $sinhVien]);
    }

    public function getHDChuaThanhToan()
    {
        $hoaDon = $this->hoaDonDichVuService->getHDChuaThanhToan();

        return view('admin.thongke.hoa-don-chua-thanh-toan', ['hoaDon' => $hoaDon]);
    }
}
