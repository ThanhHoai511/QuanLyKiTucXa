<?php

namespace App\Services;

use App\Models\PhongSinhVien;

class PhongSinhVienService
{
    protected $phongSinhVien;

    public function __construct(PhongSinhVien $phongSinhVien)
    {
        $this->phongSinhVien = $phongSinhVien;
    }

    public function store($params)
    {
        $this->phongSinhVien->ma_sv_utc = $params['ma_sv_utc'];
        $this->phongSinhVien->ma_phong = $params['ma_phong'];
        $this->phongSinhVien->save();
        return $this->phongSinhVien;
    }

    public function destroy($id)
    {
        return $this->phongSinhVien->destroy($id);
    }

    public function getBySVID($id)
    {
        return $this->phongSinhVien->where('ma_sv_utc', $id)->first();
    }
}
