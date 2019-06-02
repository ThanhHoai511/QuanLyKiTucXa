<?php

namespace App\Services;

use App\Models\HopDong;
use Illuminate\Support\Facades\Auth;

class HopDongService
{
    protected $hopDong;

    public function __construct(HopDong $hopDong)
    {
        $this->hopDong = $hopDong;
    }

    public function index()
    {
        return $this->hopDong->paginate(20);
    }

    public function store($request)
    {
        $this->hopDong->ki_hoc = $request->ki_hoc;
        $this->hopDong->nam_hoc = $request->nam_hoc;
        $this->hopDong->ngay_bat_dau = $request->ngay_bat_dau;
        $this->hopDong->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->hopDong->chu_thich = $request->chu_thich;
        $this->hopDong->tien_phong = (int) str_replace(',', '', $request->tien_phong);
        $this->hopDong->tien_cuoc = (int) str_replace(',', '', $request->tien_cuoc);
        $this->hopDong->nhan_vien_tao = Auth::id();
        $this->hopDong->ma_sv_utc = $request->ma_sinh_vien;
        $this->hopDong->ma_phong = $request->ma_phong;
        $this->hopDong->save();
        return $this->hopDong;
    }

    public function getByMSV($maSV)
    {
        return $this->hopDong->where('ma_sv_utc', $maSV)->orderBy('created_at', 'asc')->get();
    }

    public function chuyenTrangThai($maHD)
    {
        $hd = $this->getByID($maHD);
        $hd->trang_thai = 0;
        $hd->save();
        return $hd;
    }

    public function getByID($id)
    {
        return $this->hopDong->findOrFail($id);
    }
}
