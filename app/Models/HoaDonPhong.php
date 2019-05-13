<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDonPhong extends Model
{
    use SoftDeletes;

    protected $table = 'hoadonphong';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'nhan_vien_tao', 'id');
    }

    public function hopdong()
    {
        return $this->belongsTo('App\Models\HopDong', 'ma_hop_dong', 'id');
    }
}
