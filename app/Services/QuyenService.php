<?php

namespace App\Services;

use App\Models\Permission;

class QuyenService
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getAll()
    {
        return $this->permission->all();
    }

    public function store($request)
    {
        $this->permission->name = $request->ten;
        $this->permission->save();
        return $this->permission;
    }

    public function update($request, $id)
    {
        $permissionUpdate = $this->getById($id);

        $permissionUpdate->name = $request->ten;
        $permissionUpdate->save();
    }

    public function destroy($id)
    {
        return $this->permission->destroy($id);
    }

    public function getById($id)
    {
        return $this->permission->findOrFail($id);
    }
}
