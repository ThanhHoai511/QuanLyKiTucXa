<?php

namespace App\Services;

use App\Models\Phong;
use Maatwebsite\Excel\Facades\Excel;

class PhongService
{
    protected $phong;
    protected $khuNhaService;
    protected $loaiPhongService;
    public function __construct(Phong $phong, KhuNhaServices $khuNhaService, LoaiPhongService $loaiPhongService)
    {
        $this->phong = $phong;
        $this->khuNhaService = $khuNhaService;
        $this->loaiPhongService = $loaiPhongService;
    }

    public function getAllWithPaginate($name = "", $khuNha = "")
    {
        $phong = $this->phong->query();
        if ($name != "") {
            $phong = $phong->where('ten', 'like', '%' . $name . '%');
        }
        if ($khuNha != "") {
            $phong = $phong->where('ma_khu', $khuNha);
        }

        return $phong->paginate(20);
    }

    public function store($params)
    {
        $this->phong->ten = $params->ten;
        $this->phong->so_luong_sv_hien_tai = 0;
        $this->phong->ma_khu = $params->ma_khu;
        $this->phong->ma_loai_phong = $params->ma_loai_phong;
        $this->phong->save();
    }

    public function update($params, $id)
    {
        $phongUpdate = $this->phong->findOrFail($id);
        $phongUpdate->ten = $params->ten;
        $phongUpdate->ma_khu = $params->ma_khu;
        $phongUpdate->ma_loai_phong = $params->ma_loai_phong;
        $phongUpdate->save();
    }

    public function destroy($id)
    {
        $this->phong->destroy($id);
    }

    public function getById($id)
    {
        return $this->phong->findOrFail($id);
    }

    public function storeFromExcel($request)
    {
        $phong = Excel::load($request->file_excel, function () {
        })->get()->toArray();
        if (empty($phong)) {
            return false;
        }
        $insert = [];
        foreach ($phong as $phong) {
            if (trim($phong['ten'])== '') {
                break;
            }
            if (Phong::where('ten', $phong['ten'])->where('ma_khu', $request->khu_nha)->exists()) {
                continue;
            }
            $insert[] = ['ten' => $phong['ten'],
                'ma_khu' => $request->khu_nha,
                'so_luong_sv_hien_tai' => 0,
                'ma_loai_phong' => $request->loai_phong];
        }
        Phong::insert($insert);
        return true;
    }

    public function getPhongByCondition($doiTuong, $maLP)
    {
        $khuNha = $this->khuNhaService->getKhuNhaByDoiTuong($doiTuong);
        $soSVToiDa = $this->loaiPhongService->getSVToiDa($maLP);
        foreach($khuNha as $kn) {
            $phong = $this->phong->where('ma_loai_phong', $maLP)->where('ma_khu', $kn->id)
                ->where('so_luong_sv_hien_tai', '<', $soSVToiDa)->get();
            $kn->phong = $phong;
        }
        return $khuNha;
    }
}
