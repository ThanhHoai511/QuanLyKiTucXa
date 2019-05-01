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

    public function store($request)
    {
        $this->hopDong->ki_hoc = $request->ki_hoc;
        $this->hopDong->nam_hoc = $request->nam_hoc;
        $this->hopDong->ngay_bat_dau = $request->ngay_bat_dau;
        $this->hopDong->chu_thich = $request->chu_thich;
        $this->hopDong->tien_phong = $request->tien_phong;
        $this->hopDong->tien_cuoc = $request->tien_cuoc;
        $this->hopDong->nhan_vien_tao = Auth::id();
        $this->hopDong->ma_sv_utc = $request->ma_sv_utc;
        $this->hopDong->ma_phong = $request->ma_phong;
        $this->hopDong->save();
        return $this->hopDong;
    }
}
