<?php

namespace App\Services;

use App\Models\HoaDonPhong;
use Illuminate\Support\Facades\Auth;

class HoaDonPhongService
{
    protected $hoaDonPhong;

    public function __construct(HoaDonPhong $hoaDonPhong)
    {
        $this->hoaDonPhong = $hoaDonPhong;
    }

    public function store($request)
    {
        $this->hoaDonPhong->ma_hop_dong = $request->ma_hop_dong;
        $this->hoaDonPhong->tong_tien = $request->tong_tien;
        $this->hoaDonPhong->nhan_vien_tao = Auth::id();
        $this->hoaDonPhong->save();

        return $this->hoaDonPhong;
    }
}
