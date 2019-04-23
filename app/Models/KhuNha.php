<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhuNha extends Model
{
    use SoftDeletes;

    protected $table = 'khunha';

    public function phong()
    {
        return $this->hasMany('App\Models\Phong', 'ma_khu', 'id');
    }
}
