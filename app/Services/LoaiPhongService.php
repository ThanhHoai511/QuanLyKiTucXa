<?php

namespace App\Services;

use App\Models\LoaiPhong;

class LoaiPhongService
{
    protected $loaiPhong;

    public function __construct(LoaiPhong $loaiPhong)
    {
        $this->loaiPhong = $loaiPhong;
    }

    public function getAll()
    {
        return $this->loaiPhong->all();
    }

    public function store($request)
    {
        $this->loaiPhong->ten = $request->ten;
        $this->loaiPhong->gia_phong = (int)str_replace(',', '', $request->gia_phong);
        $this->loaiPhong->tien_cuoc_tai_san = (int)str_replace(',', '', $request->tien_cuoc_tai_san);
        $this->loaiPhong->so_luong_sv_toi_da = $request->so_luong_sv_toi_da;
        $this->loaiPhong->dien_tich = $request->dien_tich;
        $this->loaiPhong->save();
    }

    public function update($request, $id)
    {
        $loaiPhongUpdate = $this->getByID($id);
        $loaiPhongUpdate->ten = $request->ten;
        $loaiPhongUpdate->gia_phong = (int)str_replace(',', '', $request->gia_phong);
        $loaiPhongUpdate->tien_cuoc_tai_san = (int)str_replace(',', '', $request->tien_cuoc_tai_san);
        $loaiPhongUpdate->so_luong_sv_toi_da = $request->so_luong_sv_toi_da;
        $loaiPhongUpdate->dien_tich = $request->dien_tich;
        $loaiPhongUpdate->save();
    }

    public function destroy($id)
    {
        return $this->loaiPhong->destroy($id);
    }

    public function getByID($id)
    {
        return $this->loaiPhong->findOrFail($id);
    }

    public function getSVToiDa($id)
    {
        $lp =  $this->loaiPhong->findOrFail($id);
        return $lp['so_luong_sv_toi_da'];
    }
}
