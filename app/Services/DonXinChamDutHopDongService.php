<?php

namespace App\Services;

use App\Models\DonXinChamDutHopDong;
use Illuminate\Support\Facades\Auth;

class DonXinChamDutHopDongService
{
    protected $donXinHuy;

    public function __construct(DonXinChamDutHopDong $donXinChamDutHopDong)
    {
        $this->donXinHuy = $donXinChamDutHopDong;
    }

    public function getAllWithPaginate()
    {
        return $this->donXinHuy->paginate(20);
    }

    public function store($request)
    {
        $this->donXinHuy->ma_sv_utc = 19;
        $this->donXinHuy->ma_phong = $request->ma_phong;
        $this->donXinHuy->trang_thai = config('constants.DANG_CHO_HUY');
        $this->donXinHuy->save();

        return $this->donXinHuy;
    }

    public function accept($maDon, $request)
    {
        $donUpdate = $this->getById($maDon);
        $donUpdate->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->donXinHuy->trang_thai = config('constants.CHAP_NHAN_HUY');
        $this->donXinHuy->nhan_vien_tao = Auth::id();
        $this->donXinHuy->save();

        return $this->donXinHuy;
    }

    public function getById($id)
    {
        return $this->donXinHuy->findOrFail($id);
    }
}
