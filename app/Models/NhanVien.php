<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
    use SoftDeletes;

    protected $table = 'nhanvien';

    public function taikhoan()
    {
        return $this->hasOne('App\Models\TaiKhoan');
    }
}
