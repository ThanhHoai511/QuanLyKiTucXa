<?php

namespace App\Services;

use App\Models\Phong;
use App\Models\PhongCSVC;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PhongService
{
    protected $phong;
    protected $khuNhaService;
    protected $loaiPhongService;
    protected $csvcService;
    public function __construct(Phong $phong, KhuNhaServices $khuNhaService, LoaiPhongService $loaiPhongService, CoSoVatChatService $csvcService)
    {
        $this->phong = $phong;
        $this->khuNhaService = $khuNhaService;
        $this->loaiPhongService = $loaiPhongService;
        $this->csvcService = $csvcService;
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

    public function createPhong($params)
    {
        return DB::transaction(function () use ($params) {
            $phong = $this->store($params);
            $this->createPhongCSVC($phong->id);
        });
    }

    public function store($params)
    {
        $this->phong->ten = $params->ten;
        $this->phong->so_luong_sv_hien_tai = 0;
        $this->phong->ma_khu = $params->ma_khu;
        $this->phong->ma_loai_phong = $params->ma_loai_phong;
        $this->phong->save();
        return $this->phong;
    }

    public function createPhongCSVC($maPhong)
    {
        $arrayIdCSVC = $this->csvcService->getAllID();
        $arrayInsert = [];
        foreach ($arrayIdCSVC as $id) {
            $arrayInsert[] = [
                'ma_phong' => $maPhong,
                'ma_csvc' => $id,
                'so_luong' => 1
            ];
        }
        PhongCSVC::insert($arrayInsert);
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


    public function incrementSLSinhVien($maPhong)
    {
        $phongUpdate = $this->getById($maPhong);
        $phongUpdate->so_luong_sv_hien_tai = $phongUpdate->so_luong_sv_hien_tai + 1;
        $phongUpdate->save();
    }

    public function getById($id)
    {
        return $this->phong->findOrFail($id);
    }

    public function storeFromExcel($request)
    {
        dd($request->file_excel);
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

    public function getPhongByKhuNha($maKhu)
    {
        return $this->phong->where('ma_khu', $maKhu)->get();
    }
}
