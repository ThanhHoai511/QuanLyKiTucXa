<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoSoVatChat extends Model
{
    use SoftDeletes;

    protected $table = 'cosovatchat';
}
