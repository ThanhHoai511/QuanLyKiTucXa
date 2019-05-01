<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HopDongHuy extends Model
{
    use SoftDeletes;

    protected $table = 'hopdonghuy';
}
