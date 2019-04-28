<?php

namespace App\Services;

use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NhanVienService
{
    protected $nhanVien;
    protected $taiKhoanService;

    public function __construct(NhanVien $nhanVien, TaiKhoanService $taiKhoanService)
    {
        $this->nhanVien = $nhanVien;
        $this->taiKhoanService = $taiKhoanService;
    }

    public function getAll()
    {
        return $this->nhanVien->all();
    }

    public function create($request)
    {
        return DB::transaction(function () use ($request) {
            $taiKhoan = $this->taiKhoanService->store($request->email);
            $this->store($request, $taiKhoan->id);
        });
    }

    protected function store($request, $maTaiKhoan)
    {
        $this->nhanVien->ho_ten = $request->ho_ten;
        $this->nhanVien->chuc_vu = $request->chuc_vu;
        $this->nhanVien->email = $request->email;
        $this->nhanVien->sdt = $request->sdt;
        $this->nhanVien->mo_ta = $request->mo_ta;
        $filename = time() . '.' . $request->file('hinh_anh')->getClientOriginalExtension();
        $request->file('hinh_anh')->move(public_path('/images/nhanvien'), $filename);
        $this->nhanVien->hinh_anh = $filename;
        $this->nhanVien->ma_tai_khoan = $maTaiKhoan;
        $this->nhanVien->save();
        return $this->nhanVien;
    }

    public function edit($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $nhanVienUpdate = $this->update($request, $id);
            $taiKhoan = $this->taiKhoanService->getByMaNV($nhanVienUpdate->id);
            if ($taiKhoan) {
                $params = [
                    'email' => $nhanVienUpdate->email,
                    'tai_khoan' => $taiKhoan
                ];
                $this->taiKhoanService->update($params);
            } else {
                $params = [
                    'email' => $nhanVienUpdate->email,
                    'ma_nhan_vien' => $nhanVienUpdate->id
                ];
                $this->taiKhoanService->store($params);
            }
        });
    }

    public function update($request, $id)
    {
        $nhanVienUpdate = $this->getById($id);
        $nhanVienUpdate->ho_ten = $request->ho_ten;
        $nhanVienUpdate->chuc_vu = $request->chuc_vu;
        $nhanVienUpdate->email = $request->email;
        $nhanVienUpdate->sdt = $request->sdt;
        $nhanVienUpdate->mo_ta = $request->mo_ta;
        if ($request->file('hinh_anh') != null) {
            $image_path = public_path("/images/nhanvien/") . $nhanVienUpdate->hinh_anh;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $filename = time() . '.' . $request->file('hinh_anh')->getClientOriginalExtension();
            $request->file('hinh_anh')->move(public_path('/images/nhanvien'), $filename);
            $nhanVienUpdate->hinh_anh = $filename;
        }
        $nhanVienUpdate->save();
        return $nhanVienUpdate;
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $nhanVien = $this->getById($id);
            $image_path = public_path("/images/nhanvien/") . $nhanVien->hinh_anh;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $nhanVien->delete();
            $taiKhoan = $this->taiKhoanService->getByMaNV($nhanVien->id);
            if ($taiKhoan) {
                $this->taiKhoanService->destroy($taiKhoan->id);
            }
        });
    }

    public function getById($id)
    {
        return $this->nhanVien->findOrFail($id);
    }
}
