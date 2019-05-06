<?php

namespace App\Services;

use App\Models\Role;

class ChucVuService
{
    protected $chucVu;

    public function __construct(Role $role)
    {
        $this->chucVu = $role;
    }

    public function getAll()
    {
        return $this->chucVu->all();
    }

    public function store($request)
    {
        $this->chucVu->name = $request->ten;
        $this->chucVu->save();
        return $this->chucVu;
    }

    public function update($request, $id)
    {
        $chucVuUpdate = $this->getById($id);
        $chucVuUpdate->name = $request->ten;
        $chucVuUpdate->save();
    }

    public function destroy($id)
    {
        return $this->chucVu->destroy($id);
    }

    public function getById($id)
    {
        return $this->chucVu->findOrFail($id);
    }
}
