<?php

namespace App\Services;

use App\Models\DonXinChamDutHopDong;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonXinChamDutHopDongService
{
    protected $donXinHuy;
    protected $hopDongService;
    protected $sinhVienService;

    public function __construct(DonXinChamDutHopDong $donXinChamDutHopDong, HopDongService $hopDongService, SinhVienService $sinhVienService)
    {
        $this->donXinHuy = $donXinChamDutHopDong;
        $this->hopDongService = $hopDongService;
        $this->sinhVienService = $sinhVienService;
    }

    public function getAllWithPaginate()
    {
        return $this->donXinHuy->paginate(20);
    }

    public function store($request)
    {
        $this->donXinHuy->ma_hop_dong = $request->ma_hop_dong;
        $this->donXinHuy->ngay_ket_thuc = $request->ngay_ket_thuc;
        $this->donXinHuy->trang_thai = config('constants.DANG_CHO_HUY');
        $this->donXinHuy->save();

        return $this->donXinHuy;
    }

    public function update($maDon)
    {
        $donUpdate = $this->getById($maDon);
        $donUpdate->trang_thai = config('constants.CHAP_NHAN_HUY');
        $donUpdate->nhan_vien_tao = Auth::id();
        $donUpdate->save();

        return $donUpdate;
    }

    public function guiMail($request)
    {
        $sinhVien = $this->sinhVienService->getByMSV($request->ma_sinh_vien);
        $email = $sinhVien->email;
        Mail::send('admin.mails.hen-ngay-ht-don-huy',
            array('name'=> $sinhVien->ho_ten, 'ngay_hen' => $request->ngay_hen), function($message) use($email)
            {
                $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
            });
        $this->daGuiMail($request->ma_don);
    }

    public function daGuiMail($id)
    {
        $dxh = $this->getById($id);
        $dxh->trang_thai = 2;
        $dxh->save();
        return $dxh;
    }

    public function getById($id)
    {
        return $this->donXinHuy->findOrFail($id);
    }
}
