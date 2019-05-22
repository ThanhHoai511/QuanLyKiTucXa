<?php

namespace App\Services;

use App\Models\HoaDonDichVu;
use Illuminate\Support\Facades\Auth;

class HoaDonDichVuService
{
    protected $hoaDonDichVu;
    protected $phongService;

    public function __construct(
        HoaDonDichVu $hoaDonDichVu,
        PhongService $phongService
    )
    {
        $this->hoaDonDichVu = $hoaDonDichVu;
        $this->phongService = $phongService;

    }

    public function index($thang = "", $nam = "")
    {
        // dd(date('m', strtotime('12-08-2019')));
        $hoaDonDV = $this->hoaDonDichVu->query();
        if ($thang != "") {
            $hoaDonDV = $hoaDonDV->where(date('m', strtotime('created_at')), $thang + 1);
        }
        return $hoaDonDV->orderBy('created_at', 'desc')->paginate(20);
    }

    public function store($request)
    {
        $this->hoaDonDichVu->ngay_bat_dau = $request->ngay_bat_dau;
        $this->hoaDonDichVu->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->hoaDonDichVu->trang_thai = config('constants.CHUA_THANH_TOAN');
        $this->hoaDonDichVu->gia = $request->don_gia;
        $this->hoaDonDichVu->so_tieu_thu_cho_phep = $request->so_tieu_thu_cho_phep;
        $this->hoaDonDichVu->chu_thich = $request->chu_thich;
        $this->hoaDonDichVu->ma_phong = $request->ma_phong;
        $soSinhVien = $this->phongService->getSLSVHienTai($request->ma_phong);
        $this->hoaDonDichVu->chi_so_dau = $request->chi_so_dau;
        $this->hoaDonDichVu->chi_so_cuoi = $request->chi_so_cuoi;
        $this->hoaDonDichVu->ma_dich_vu = $request->ma_dich_vu;
        $this->hoaDonDichVu->nhan_vien_tao = 1;
        if($request->chi_so_dau == 0 && $request->chi_so_cuoi == 0)
        {
            $this->hoaDonDichVu->tong_tien = $request->don_gia;
        } else {
            $soTieuThu = $request->chi_so_cuoi - $request->chi_so_dau - ($request->so_tieu_thu_cho_phep * $soSinhVien);
            if ($soTieuThu <= 0) {
                $this->hoaDonDichVu->tong_tien = 0;
            } else {
                $this->hoaDonDichVu->tong_tien = $soTieuThu * $request->don_gia;
            }
        }
        $this->hoaDonDichVu->save();
        return $this->hoaDonDichVu;
    }

    public function changeStatus($id)
    {
        $hoaDonDV = $this->getById($id);
        $hoaDonDV->trang_thai = config('constants.DA_THANH_TOAN');
        $hoaDonDV->save();
    }

    public function getById($id)
    {
        return $this->hoaDonDichVu->findOrFail($id);
    }

    public function getHDChuaThanhToanByPhongID($phongId)
    {
        $hoaDons = $this->hoaDonDichVu->where('ma_phong', $phongId)->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->get();
//        $tongTien = 0;
//        if ($hoaDons) {
//            $phong = $this->phongService->getById($phongId);
//            $soSVHT = $phong->so_luong_sv_hien_tai;
//            foreach($hoaDons as $hd) {
//                $tongTien += $hd->tong_tien / $soSVHT;
//            }
//        }
        return $hoaDons;
    }

    public function getHDDienNuoc($phongID)
    {
        return $this->hoaDonDichVu->where('ma_dich_vu', 1)->orWhere('ma_dich_vu', 2)
            ->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->where('ma_phong', $phongID)->get();
    }

    public function getHDByLoai($phongID, $loai)
    {
        return $this->hoaDonDichVu->where('ma_dich_vu', $loai)
            ->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->where('ma_phong', $phongID)->get();
    }
}
