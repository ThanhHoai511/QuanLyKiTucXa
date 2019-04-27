<?php

namespace App\Services;

use App\Models\Phong;
use Maatwebsite\Excel\Facades\Excel;

class PhongService
{
    protected $phong;

    public function __construct(Phong $phong)
    {
        $this->phong = $phong;
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

<<<<<<< HEAD
        return $phong->paginate(20);
=======
<<<<<<< HEAD
        return $phong->paginate(20);
=======
        return $phong->paginate(4);
>>>>>>> 22ea7168de7a5fd7a6fb74e677e498ce01bd9f9b
>>>>>>> c7016d92e3453861587ab1d821f24ee38f1e159d
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
        if (!$request->file_excel) {
            return false;
        }
        $phong = Excel::load($request->file_excel, function () {
        })->get()->toArray();
        if (!empty($phong)) {
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
                    'ma_loai_phong' => (int)$phong['ma_loai_phong']];
            }
            Phong::insert($insert);
            return true;
        }

    }
}

