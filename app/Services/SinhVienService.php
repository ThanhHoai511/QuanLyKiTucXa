<?php
namespace App\Services;

use App\Models\SinhVienUTC;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
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
//        dd($sinhVien);
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
                'ngay_sinh' => ($sinhVien['ngay_sinh']),
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

    public function update($request, $id)
    {
        $sinhVienUpdate = $this->getById($id);
        $sinhVienUpdate->ma_sinh_vien = $request->ma_sinh_vien;
        $sinhVienUpdate->ho_ten = $request->ho_ten;
        $sinhVienUpdate->ngay_sinh = $request->ngay_sinh;
        $sinhVienUpdate->noi_sinh = $request->noi_sinh;
        $sinhVienUpdate->lop = $request->lop;
        $sinhVienUpdate->khoa = $request->khoa;
        $sinhVienUpdate->dan_toc = $request->dan_toc;
        $sinhVienUpdate->cmnd = $request->cmnd;
        $sinhVienUpdate->sdt = $request->sdt;
        $sinhVienUpdate->sdt_bo = $request->sdt_bo;
        $sinhVienUpdate->sdt_me = $request->sdt_me;
        $sinhVienUpdate->tinh = $request->tinh;
        $sinhVienUpdate->huyen = $request->huyen;
        $sinhVienUpdate->xa = $request->xa;
        $sinhVienUpdate->email = $request->email;
        $sinhVienUpdate->save();
        return $sinhVienUpdate;
    }

    public function destroy($id)
    {
        return $this->sinhVien->destroy($id);
    }

    public function getById($id)
    {
        return $this->sinhVien->findOrFail($id);
    }

    public function getByMSV($mSV)
    {
        return $this->sinhVien->where('ma_sinh_vien', $mSV)->first();
    }

    public function getByMaSVCollect()
    {
        $sinhVienCollect = collect();

        $sinhVien = $this->sinhVien->all();

        foreach ($sinhVien as $sv) {
            $sinhVienCollect = $sinhVienCollect->push(['ma_sinh_vien' => $sv->ma_sinh_vien, 'sinh_vien' => $sv]);
        }
        return $sinhVienCollect->mapWithKeys(function ($item) {
            return [$item['ma_sinh_vien'] => $item['sinh_vien']];
        });

    }
}