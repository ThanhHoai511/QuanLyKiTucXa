<?php

namespace App\Services;

use App\Models\HoaDonDichVu;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class HoaDonDichVuService
{
    protected $hoaDonDichVu;
    protected $phongService;
    protected $dichVuService;
    protected $khuNhaService;

    public function __construct(
        HoaDonDichVu $hoaDonDichVu,
        PhongService $phongService,
        DichVuService $dichVuService,
        KhuNhaServices $khuNhaService
    )
    {
        $this->hoaDonDichVu = $hoaDonDichVu;
        $this->phongService = $phongService;
        $this->dichVuService = $dichVuService;
        $this->khuNhaService = $khuNhaService;
    }

    public function index($request)
    {
        // dd(date('m', strtotime('12-08-2019')));
        $hoaDonDV = $this->hoaDonDichVu->query();
        if($request->loc) {
            if($request->loc == config('constants.CHUA_THANH_TOAN')) {
                $hoaDonDV = $hoaDonDV->where('trang_thai', config('constants.CHUA_THANH_TOAN'));
            } elseif($request->loc == config('constants.DA_THANH_TOAN')) {
                $hoaDonDV = $hoaDonDV->where('trang_thai', config('constants.DA_THANH_TOAN'));
            }
        }

        if($request->phong != "") {
            $idPhong = $this->phongService->getIDPhongByName($request->phong);
            $hoaDonDV = $hoaDonDV->whereIn('ma_phong', $idPhong);
        }
//        if ($thang != "") {
//            $hoaDonDV = $hoaDonDV->where(date('m', strtotime('created_at')), $thang + 1);
//        }
        return $hoaDonDV->orderBy('created_at', 'desc')->paginate(20);
    }

    public function store($request)
    {
        $this->hoaDonDichVu->ngay_bat_dau = $request->ngay_bat_dau;
        $this->hoaDonDichVu->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->hoaDonDichVu->trang_thai = config('constants.CHUA_THANH_TOAN');
        $dichVu = $this->dichVuService->findByID($request->ma_dich_vu);
        $this->hoaDonDichVu->gia = $dichVu->gia;
        $this->hoaDonDichVu->so_tieu_thu_cho_phep = $dichVu->so_tieu_thu_cho_phep;
        $this->hoaDonDichVu->chu_thich = $request->chu_thich;
        $this->hoaDonDichVu->ma_phong = $request->ma_phong;
        $soSinhVien = $this->phongService->getSLSVHienTai($request->ma_phong);
        $this->hoaDonDichVu->chi_so_dau = $request->chi_so_dau;
        $this->hoaDonDichVu->chi_so_cuoi = $request->chi_so_cuoi;
        $this->hoaDonDichVu->ma_dich_vu = $request->ma_dich_vu;
        $this->hoaDonDichVu->nhan_vien_tao = Auth::id();

        if($request->ma_dich_vu == 3)
        {
            $this->hoaDonDichVu->tong_tien = $dichVu->gia * $soSinhVien;
        } else {
            $soTieuThu = $request->chi_so_cuoi - $request->chi_so_dau - ($dichVu->so_tieu_thu_cho_phep * $soSinhVien);
            if ($soTieuThu <= 0) {
                $this->hoaDonDichVu->tong_tien = 0;
            } else {
                $this->hoaDonDichVu->tong_tien = $soTieuThu * $dichVu->gia;
            }
        }
        $this->hoaDonDichVu->save();
        return $this->hoaDonDichVu;
    }
    public function storeFromExcel($request)
    {
        $hoadon = Excel::load($request->file_excel, function () {
        })->get()->toArray();
        if (empty($hoadon)) {
            return false;
        }
        $insert = [];
        $errorCount = 0;
        foreach ($hoadon as $hoadon) {
            if (trim($hoadon['khu_nha'])== '' || trim($hoadon['phong'])== '' || trim($hoadon['dich_vu'])== ''
                || trim($hoadon['ngay_bat_dau'])== '' || trim($hoadon['ngay_ket_thuc'])== ''
                || trim($hoadon['chi_so_dau'])== '' || trim($hoadon['chi_so_cuoi'])== '') {
                $errorCount++;
                continue;
            }
            $khuNha = $this->khuNhaService->findByName($hoadon['khu_nha']);
            dd($khuNha);
            $insert[] = ['ten' => $hoadon['ten'],
                'ma_khu' => $phong['khu_nha'],
                'so_luong_sv_hien_tai' => 0,
                'ma_loai_phong' => $phong['loai_phong']];
        }
        HoaDonDichVu::insert($insert);
        return ['loi' => $errorCount, 'thanh-cong' => count($insert)];
    }

    public function update($request, $id)
    {
        $hoaDonUpdate = $this->getById($id);
        $hoaDonUpdate->ngay_bat_dau = $request->ngay_bat_dau;
        $hoaDonUpdate->ngay_ket_thuc = $request->ngay_ket_thuc;
        $dichVu = $this->dichVuService->findByID($request->ma_dich_vu);
        $hoaDonUpdate->gia = $dichVu->gia;
        $hoaDonUpdate->so_tieu_thu_cho_phep = $dichVu->so_tieu_thu_cho_phep;
        $hoaDonUpdate->chu_thich = $request->chu_thich;
        $hoaDonUpdate->ma_phong = $request->ma_phong;
        $soSinhVien = $this->phongService->getSLSVHienTai($request->ma_phong);
        $hoaDonUpdate->chi_so_dau = $request->chi_so_dau;
        $hoaDonUpdate->chi_so_cuoi = $request->chi_so_cuoi;
        $hoaDonUpdate->ma_dich_vu = $request->ma_dich_vu;
        $hoaDonUpdate->nhan_vien_tao = Auth::id();

        if($request->ma_dich_vu == 3)
        {
            $hoaDonUpdate->tong_tien = $request->don_gia * $soSinhVien;
        } else {
            $soTieuThu = $request->chi_so_cuoi - $request->chi_so_dau - ($request->so_tieu_thu_cho_phep * $soSinhVien);
            if ($soTieuThu <= 0) {
                $hoaDonUpdate->tong_tien = 0;
            } else {
                $hoaDonUpdate->tong_tien = $soTieuThu * $request->don_gia;
            }
        }
        $hoaDonUpdate->save();
        return $hoaDonUpdate;
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

    public function getHDChuaThanhToan()
    {
        return $this->hoaDonDichVu->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->get();
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
        return $this->hoaDonDichVu->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->where('ma_phong', $phongID)
            ->where(function ($query) {
                $query->where('ma_dich_vu', 1)->orWhere('ma_dich_vu', 2);
            })->get();
    }

    public function getHDByLoai($phongID, $loai)
    {
        return $this->hoaDonDichVu->where('ma_dich_vu', $loai)
            ->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->where('ma_phong', $phongID)->get();
    }
}
