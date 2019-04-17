<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaoCaoCSVC extends Model
{
    use SoftDeletes;

    protected $table = 'baocaocsvc';

    protected $fillable = ['ma_sv_utc', 'ma_phong_csvc', 'tinh_trang'];
}
