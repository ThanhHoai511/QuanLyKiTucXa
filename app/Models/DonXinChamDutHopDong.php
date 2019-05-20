<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonXinChamDutHopDong extends Model
{
    use SoftDeletes;

    protected $table = 'donxinchamduthopdong';

    public function hopdong()
    {
        return $this->belongsTo('App\Models\HopDong', 'ma_hop_dong');
    }
}
