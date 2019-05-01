<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonDangKyService;
use App\Services\PhongService;
use App\Services\SinhVienService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonXinNoiTruController extends Controller
{
    protected $donDangKyService;
    protected $sinhVienService;
    protected $phongService;

    public function __construct(DonDangKyService $donDangKyService,
                                SinhVienService $sinhVienService,
                                PhongService $phongService)
    {
        $this->donDangKyService = $donDangKyService;
        $this->sinhVienService = $sinhVienService;
        $this->phongService = $phongService;
    }

    public function index()
    {
        $donDangKy = $this->donDangKyService->getAll(20);
        $sinhVienCollect = $this->sinhVienService->getByMaSVCollect();

        foreach ($donDangKy as $ddk) {
            $ddk->sinh_vien = $sinhVienCollect->get($ddk->ma_sinh_vien) ? $sinhVienCollect->get($ddk->ma_sinh_vien) : null;
        }
        return view('admin/donxinnoitru/danh-sach', ['donDangKy' => $donDangKy]);
    }

    public function showPhong($id)
    {
        $ddk = $this->donDangKyService->getById($id);
        $khuNha = $this->phongService->getPhongByCondition($ddk->gioi_tinh, $ddk->ma_loai_phong);
        return view('admin/donxinnoitru/danh-sach-phong', ['khuNha' => $khuNha]);
    }
}
