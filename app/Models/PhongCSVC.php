<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhongCSVC extends Model
{
    use SoftDeletes;

    protected $table = 'phong_csvc';
}
