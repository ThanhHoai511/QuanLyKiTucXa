<?php

namespace App\Services;

use App\Models\Phong;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class PhongService
{
    protected $phong;

    public function __construct(Phong $phong)
    {
        $this->phong = $phong;
    }

    public function getAllWithPaginate()
    {
        return $this->phong->paginate(20);
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
        dd($request->file_excel);
        if (!(Input::hasFile('file_excel'))) {
            return false;
        }
        $phong = Excel::load(Input::file('file_excel'), function ($reader) {
        })->get()->toArray();
        if (!empty($phong)) {
            $insert = [];
            foreach ($phong as $phong) {
                if ($phong['Tên'] == null) {
                    break;
                }
                if (Phong::where('ten', $phong['Tên'])->exists()) {
                    continue;
                }
                $insert[] = ['ten' => $phong['tên'],
                    'ma_khu' => $phong['Mã khu'],
                    'ma_loai_phong' => $phong['Mã loại phòng']];
            }
            try {
                $this->phong->insert($insert);
                Log::info("Insert successful!");
                return true;
            } catch (QueryException $e) {
                Log::error('Cannot insert to database ' + $e->getMessage());
                return false;
            }
        }
    }
}

