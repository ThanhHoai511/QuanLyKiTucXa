<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RolePermission;
use Illuminate\Auth\Access\HandlesAuthorization;

class MasterPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user) 
    {
        return $this->getPermission($user, 1);
    }

    public function update(User $user) 
    {
        return $this->getPermission($user, 0);
    }

    public function delete(User $user)
    {
        return $this->getPermission($user, 2);
    }

    public function getPermission($user, $per_id)
    {
            $permissions = RolePermission::where('role_id', $user->role_id)->get();
            foreach($permissions as $permission) {
                if ($permission->permission_id == $per_id) {
                    return true;
                }
            }

        return false;
    }
}
