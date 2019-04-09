<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TinTuc extends Model
{
    use SoftDeletes;

    protected $table = 'tintuc';

    protected $fillable = ['id', 'tieu_de', 'noi_dung', 'loai', 'tin_trang'];
}
