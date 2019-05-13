<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhongSinhVien extends Model
{
    use SoftDeletes;

    protected $table = 'phong_sinhvien';

    public function sinhvien()
    {
        return $this->belongsTo('App\Models\SinhVienUTC', 'ma_sv_utc');
    }

    public function phong()
    {
        return $this->belongsTo('App\Models\Phong', 'ma_phong');
    }
}
