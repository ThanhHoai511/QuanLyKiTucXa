<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDonDichVu extends Model
{
    use SoftDeletes;

    protected $table = 'hoadondichvu';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'nhan_vien_tao', 'id');
    }

    public function dichvu()
    {
        return $this->belongsTo('App\Models\DichVu', 'ma_dich_vu', 'id');
    }

    public function phong()
    {
        return $this->belongsTo('App\Models\Phong', 'ma_phong', 'id');
    }
}
