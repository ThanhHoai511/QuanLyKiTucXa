<?php

namespace App\Services;

use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;

class TaiKhoanService
{
    protected $taiKhoan;

    public function __construct(TaiKhoan $taiKhoan)
    {
        $this->taiKhoan = $taiKhoan;
    }

    public function getAllWithPaginate()
    {
        return $this->taiKhoan->paginate(15);
    }

    public function store($email)
    {
        $this->taiKhoan->ten_dang_nhap = $email;
        $this->taiKhoan->mat_khau = Hash::make('12345');
        $this->taiKhoan->tinh_trang = config('constants.HOAT_DONG');
        $this->taiKhoan->save();
        return $this->taiKhoan;
    }

    public function update($params)
    {
        $params['tai_khoan']->ten_dang_nhap = $params['email'];
        $params['tai_khoan']->save();
    }

    public function destroy($id)
    {
        return $this->taiKhoan->destroy($id);
    }

    public function getByMaNV($maNV)
    {
        return $this->taiKhoan->where('ma_nhan_vien', $maNV)->first();
    }
}
