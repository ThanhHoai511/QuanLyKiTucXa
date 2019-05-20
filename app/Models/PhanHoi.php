<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhanHoi extends Model
{
    use SoftDeletes;

    protected $table = 'phanhoi';
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
