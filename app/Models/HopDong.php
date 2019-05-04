<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HopDong extends Model
{
    use SoftDeletes;

    protected $table = 'hopdong';

    public function sinhvien()
    {
        return $this->belongsTo('App\Models\SinhVienUTC', 'ma_sv_utc');
    }
}
