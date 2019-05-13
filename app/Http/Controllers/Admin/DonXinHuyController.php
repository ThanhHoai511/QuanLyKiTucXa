<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonXinChamDutHopDongService;
use App\Services\HoaDonDichVuService;
use App\Services\HoaDonPhongService;
use App\Services\PhongService;
use App\Services\PhongSinhVienService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DonXinHuyController extends Controller
{
    protected $donXinHuyService;
    protected $hoaDonPhongService;
    protected $phongSinhVienService;
    protected $hoaDonDichVuService;
    protected $phongService;

    public function __construct(
        DonXinChamDutHopDongService $donXinHuyService,
        HoaDonPhongService $hoaDonPhongService,
        PhongSinhVienService $phongSinhVienService,
        HoaDonDichVuService $hoaDonDichVuService,
        PhongService $phongService
    ) {
        $this->donXinHuyService = $donXinHuyService;
        $this->hoaDonPhongService = $hoaDonPhongService;
        $this->phongSinhVienService = $phongSinhVienService;
        $this->hoaDonDichVuService = $hoaDonDichVuService;
        $this->phongService = $phongService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donXinHuy = $this->donXinHuyService->getAllWithPaginate();
        foreach ($donXinHuy as $don) {
            $don->tien_phong = $this->hoaDonPhongService->getHoaDonChuaThanhToanTheoSV($don->ma_sv_utc);
            $phongSV = $this->phongSinhVienService->getBySVID($don->ma_sv_utc);
            $don->tien_dich_vu = $this->hoaDonDichVuService->getHDChuaThanhToanByPhongID($phongSV->ma_phong);
            $don->tong_tien = $don->tien_phong + $don->tien_dich_vu;
        }
        return view('admin.donxinchamduthopdong.danh-sach', ['donXinHuy' => $donXinHuy]);
    }

    public function chapNhanDon($maDon)
    {
        return DB::transaction(function () use ($maDon) {
            $this->donXinHuyService->accept($maDon);
            $don = $this->donXinHuyService->getById($maDon);
            $this->phongService->updateSLSinhVien($don->ma_phong, config('constants.GIAM_SV'));
            $phongSV = $this->phongSinhVienService->getBySVID($don->ma_sv_utc);
            $this->phongSinhVienService->destroy($phongSV->id);
        });
    }
}
