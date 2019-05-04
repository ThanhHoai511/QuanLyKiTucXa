<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TaiKhoanService
{
    protected $taiKhoan;

    public function __construct(User $taiKhoan)
    {
        $this->taiKhoan = $taiKhoan;
    }

    public function getAllWithPaginate()
    {
        return $this->taiKhoan->paginate(15);
    }

    public function store($email)
    {
        $this->taiKhoan->email = $email;
        $password = explode('@', $email)[0] . "123";
        $this->taiKhoan->password = Hash::make($password);
        $this->taiKhoan->status = config('constants.HOAT_DONG');
        $this->taiKhoan->save();
        return $this->taiKhoan;
    }

    public function update($params)
    {
        $params['tai_khoan']->email = $params['email'];
        $params['tai_khoan']->save();
        return $params['tai_khoan'];
    }

    public function destroy($id)
    {
        return $this->taiKhoan->destroy($id);
    }

    public function getById($id)
    {
        return $this->taiKhoan->findOrFail($id);
    }
}
