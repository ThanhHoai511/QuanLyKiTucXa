<?php

namespace App\Services;

use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class NhanVienService
{
    protected $nhanVien;
    protected $taiKhoanService;
    protected $chucVuService;

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
            $taiKhoan = $this->taiKhoanService->store($request->email, config('constants.DUOC_TRUY_CAP'), config('constants.NHAN_VIEN'), $request->chuc_vu);
            $nhanVienMoi = $this->store($request, $taiKhoan[0]->id);
            $email = $nhanVienMoi->email;
            Mail::send('admin.mails.tai-khoan-nhan-vien',
                array('name'=> $nhanVienMoi->ho_ten, 'username' => $email, 'password'=> $taiKhoan[1]), function($message) use ($email)
                {
                    $message->to($email)->subject('Kí túc xá trường Đaị học Giao thông vận tải');
                });
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
        $this->nhanVien->user_id = $maTaiKhoan;
        $this->nhanVien->save();
        return $this->nhanVien;
    }

    public function edit($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $nhanVienUpdate = $this->getById($id);
            $userId = $nhanVienUpdate->user_id;
            $taiKhoan = $this->taiKhoanService->getById($userId);
            if ($taiKhoan) {
                $params = [
                    'email' => $nhanVienUpdate->email,
                    'tai_khoan' => $taiKhoan
                ];
                $this->taiKhoanService->update($params);
            } else {
                $params = [
                    'email' => $nhanVienUpdate->email,
                ];
                $this->taiKhoanService->store($params->email);
            }
            $this->update($request, $id);
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

    public function getByUserId($userId)
    {
        return $this->nhanVien->where("user_id", $userId)->first();
    }
}
