<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    public function quyen()
    {
        return $this->belongsTo('App\Models\Permission', 'permission_id');
    }

    public function chucvu()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }
}
