<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhuNha extends Model
{
    use SoftDeletes;

    protected $table = 'khunha';

    protected $fillable = ['ten', 'mo_ta', 'doi_tuong'];
}
