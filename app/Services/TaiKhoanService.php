<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function store($email, $isAccess, $option, $chucVu = "")
    {
        $this->taiKhoan->email = $email;
        $password = Str::random(10);
        $this->taiKhoan->password = Hash::make($password);
        $this->taiKhoan->status = config('constants.HOAT_DONG');
        $this->taiKhoan->is_access = $isAccess;
        if ($option == config('constants.NHAN_VIEN')) {
            $this->taiKhoan->role_id = $chucVu;
        }
        $this->taiKhoan->save();
        return [$this->taiKhoan, $password];
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

    public function voHieuHoa($id)
    {
        $taiKhoanVHH = $this->getById($id);
        $taiKhoanVHH->status = 0;
        $taiKhoanVHH->save();
    }

    public function activeTaiKhoan($id)
    {
        $taiKhoanVHH = $this->getById($id);
        $taiKhoanVHH->status = 1;
        $taiKhoanVHH->save();
    }

    public function getById($id)
    {
        return $this->taiKhoan->findOrFail($id);
    }

    public function findByEmail($email)
    {
        return $this->taiKhoan->where('email', $email)->first();
    }
}
