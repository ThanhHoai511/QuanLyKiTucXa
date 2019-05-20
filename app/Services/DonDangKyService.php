<?php

namespace App\Services;

use App\Models\DonXinNoiTru;

class DonDangKyService
{
    protected $donDangKy;

    public function __construct(DonXinNoiTru $donDangKy)
    {
        $this->donDangKy = $donDangKy;
    }

    public function getAll($numberRecord = "")
    {
        if ($numberRecord != "") {
            return $this->donDangKy->orderBy('created_at', 'desc')->paginate($numberRecord);
        }
        return $this->donDangKy->all();
    }

    public function store($request)
    {
        $this->donDangKy->ma_sinh_vien = $request->ma_sinh_vien;
        $this->donDangKy->chu_thich = $request->chu_thich;
        $filename = time() . '.' . $request->file('anh')->getClientOriginalExtension();
        $request->file('anh')->move(public_path('/images/sinhvien'), $filename);
        $this->donDangKy->anh = $filename;
        $this->donDangKy->ma_loai_phong = $request->ma_loai_phong;
        $this->donDangKy->save();
    }

    public function updateStatus($id)
    {
        $ddkUpdate = $this->getById($id);
        $ddkUpdate->tinh_trang = 1;
        $ddkUpdate->save();
    }

    public function tuChoi($id)
    {
        $ddkUpdate = $this->getById($id);
        $ddkUpdate->tinh_trang = -1;
        $ddkUpdate->save();
    }

    public function getById($id)
    {
        return $this->donDangKy->findOrFail($id);
    }
}
