<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaiKhoan extends Model
{
    use SoftDeletes;

    protected $table = 'taikhoan';

    public function nhanvien()
    {
        return $this->belongsTo('App\Models\NhanVien', 'ma_nhan_vien', 'id');
    }
}
