<?php

namespace App\Services;

use App\Models\HoaDonPhong;
use Illuminate\Support\Facades\Auth;

class HoaDonPhongService
{
    protected $hoaDonPhong;
    protected $hopDongService;

    public function __construct(HoaDonPhong $hoaDonPhong, HopDongService $hopDongService)
    {
        $this->hoaDonPhong = $hoaDonPhong;
        $this->hopDongService = $hopDongService;
    }

    public function index()
    {
        return $this->hoaDonPhong->paginate(20);
    }

    public function store($request)
    {
        $this->hoaDonPhong->ma_hop_dong = $request->ma_hop_dong;
        $this->hoaDonPhong->tong_tien = $request->tong_tien;
        $this->hoaDonPhong->nhan_vien_tao = Auth::id();
        $this->hoaDonPhong->save();

        return $this->hoaDonPhong;
    }

    public function getHoaDonChuaThanhToanTheoSV($maSV)
    {
        $hopDong = $this->hopDongService->getByMSV($maSV);
        dd($hopDong);
        $hoaDon = $this->hoaDonPhong->where('ma_hop_dong', $hopDong->id)->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->get();
        if ($hoaDon->toArray() == null) {
            return false;
        }
        return $hoaDon;
    }
}
