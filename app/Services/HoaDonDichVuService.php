<?php

namespace App\Services;

use App\Models\HoaDonDichVu;
use Illuminate\Support\Facades\Auth;

class HoaDonDichVuService
{
    protected $hoaDonDichVu;

    public function __construct(HoaDonDichVu $hoaDonDichVu)
    {
        $this->hoaDonDichVu = $hoaDonDichVu;
    }

    public function store($request)
    {
        $this->hoaDonDichVu->ngay_bat_dau = $request->ngay_bat_dau;
        $this->hoaDonDichVu->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->hoaDonDichVu->tinh_trang = config('constants.CHUA_THANH_TOAN');
        $this->hoaDonDichVu->gia = $request->gia;
        $this->hoaDonDichVu->chu_thich = $request->chu_thich;
        $this->hoaDonDichVu->ma_phong = $request->ma_phong;
        $this->hoaDonDichVu->ma_dich_vu = $request->ma_dich_vu;
        $this->hoaDonDichVu->nhan_vien_tao = Auth::id();

        return $this->hoaDonDichVu;
    }

    public function changeStatus($id)
    {
        $hoaDonDV = $this->getById($id);
        $hoaDonDV->tinh_trang = config('constants.DA_THANH_TOAN');
        $hoaDonDV->save();
    }

    public function getById($id)
    {
        return $this->hoaDonDichVu->findOrFail($id);
    }
}
