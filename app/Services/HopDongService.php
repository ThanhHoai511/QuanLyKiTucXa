<?php

namespace App\Services;

use App\Models\HopDong;

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
    }
}
