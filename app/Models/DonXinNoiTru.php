<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonXinNoiTru extends Model
{
    use SoftDeletes;

    protected $table = 'donxinnoitru';

    public function loaiphong()
    {
        return $this->belongsTo('App\Models\LoaiPhong', 'ma_loai_phong');
    }
}
