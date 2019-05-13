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
        $this->donXinHuy->ma_sv_utc = 1;
        $this->donXinHuy->ma_phong = $request->ma_phong;
        $this->donXinHuy->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->donXinHuy->trang_thai = config('constants.DANG_CHO_HUY');
        $this->donXinHuy->save();

        return $this->donXinHuy;
    }

    public function accept($maDon)
    {
        $donUpdate = $this->getById($maDon);
        $donUpdate->trang_thai = config('constants.CHAP_NHAN_HUY');
        $donUpdate->nhan_vien_tao = Auth::id();
        $donUpdate->save();

        return $donUpdate;
    }

    public function getById($id)
    {
        return $this->donXinHuy->findOrFail($id);
    }
}
