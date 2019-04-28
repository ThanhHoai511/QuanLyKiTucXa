<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonDangKyService;
use App\Services\SinhVienService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonXinNoiTruController extends Controller
{
    protected $donDangKyService;
    protected $sinhVienService;

    public function __construct(DonDangKyService $donDangKyService, SinhVienService $sinhVienService)
    {
        $this->donDangKyService = $donDangKyService;
        $this->sinhVienService = $sinhVienService;
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
}
