<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phong extends Model
{
    use SoftDeletes;

    protected $table = 'phong';

    public function loaiphong()
    {
        return $this->belongsTo('App\Models\LoaiPhong', 'ma_loai_phong', 'id');
    }

    public function khunha()
    {
        return $this->belongsTo('App\Models\KhuNha', 'ma_khu', 'id');
    }
}
