<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiPhong extends Model
{
    use SoftDeletes;

    protected $table = 'loaiphong';

    protected $fillable = ['ten', 'gia_phong', 'tien_cuoc_tai_san', 'so_luong_sv_toi_da', 'dien_tich'];
}
