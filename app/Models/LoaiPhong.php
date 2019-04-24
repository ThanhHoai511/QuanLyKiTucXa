<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiPhong extends Model
{
    use SoftDeletes;

    protected $table = 'loaiphong';

    public function phong()
    {
        return $this->hasMany('App\Models\Phong');
    }
}
