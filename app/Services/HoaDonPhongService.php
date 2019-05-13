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

    public function getAllWithPaginate()
    {
        return $this->hoaDonPhong->paginate(20);
    }

    public function store($request)
    {
        $this->hoaDonPhong->ma_hop_dong = $request->ma_hop_dong;
        $this->hoaDonPhong->tong_tien = $request->tong_tien;
        $this->hoaDonPhong->nhan_vien_tao = 1;
        $this->hoaDonPhong->save();

        return $this->hoaDonPhong;
    }

    public function getHoaDonChuaThanhToanTheoSV($maSV)
    {
        $hopDong = $this->hopDongService->getByMSV($maSV);
        $hoaDon = $this->hoaDonPhong->where('ma_hop_dong', $hopDong->id)->where('trang_thai', config('constants.CHUA_THANH_TOAN'))->get();
        $tongTien = 0;
        if ($hoaDon->toArray() != null) {
            $tongTien = $hoaDon[0]->tong_tien;
        }
        return $tongTien;
    }
}
