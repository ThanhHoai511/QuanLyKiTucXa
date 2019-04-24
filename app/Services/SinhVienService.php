<?php
namespace App\Services;

use App\Models\SinhVienUTC;
use Maatwebsite\Excel\Facades\Excel;

class SinhVienService{
    protected $sinhVien;
    public function __construct(SinhVienUTC $sinhVienUTC)
    {
        $this->sinhVien = $sinhVienUTC;
    }

    public function getAllWithPaginate($search = "")
    {
        $sinhVien = $this->sinhVien->query();

        if ($search != "") {
            $sinhVien = $sinhVien->where('ho_ten', 'like', '%' . $search . '%')
                ->orWhere('ma_sinh_vien', 'like', '%' . $search . '%')
                ->orWhere('tinh', 'like', '%' . $search . '%')
                ->orWhere('huyen', 'like', '%' . $search . '%')
                ->orWhere('xa', 'like', '%' . $search . '%');
        }
        return $sinhVien->paginate(20);
    }

    public function store($request)
    {
        $sinhVien = Excel::load($request->file_excel, function () {
        })->get()->toArray();
        if (empty($sinhVien)) {
            return false;
        }
        $insert = [];

        foreach ($sinhVien as $sinhVien) {
            if (trim($sinhVien['ma_sinh_vien'])== '') {
                break;
            }
            if (SinhVienUTC::where('ma_sinh_vien', $sinhVien['ma_sinh_vien'])->exists()) {
                continue;
            }
            $insert[] = ['ma_sinh_vien' => $sinhVien['ma_sinh_vien'],
                'ho_ten' => $sinhVien['ho_ten'],
                'ngay_sinh' => $sinhVien['ngay_sinh'],
                'noi_sinh' => $sinhVien['noi_sinh'],
                'lop' => $sinhVien['lop'],
                'khoa' => $sinhVien['khoa'],
                'dan_toc' => $sinhVien['dan_toc'],
                'cmnd' => $sinhVien['cmnd'],
                'sdt' => $sinhVien['sdt'],
                'sdt_bo' => $sinhVien['sdt_bo'],
                'sdt_me' => $sinhVien['sdt_me'],
                'tinh' => $sinhVien['tinh'],
                'huyen' => $sinhVien['huyen'],
                'xa' => $sinhVien['xa'],
                'email' => $sinhVien['email'],
            ];

            if ($sinhVien['doi_tuong'] != null) {
                $insert[] = ['doi_tuong' => $sinhVien['doi_tuong']];
            }

        }
        SinhVienUTC::insert($insert);
        return true;
    }

    public function getById($id)
    {
        return $this->sinhVien->findOrFail($id);
    }
}