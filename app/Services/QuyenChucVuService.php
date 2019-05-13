<?php

namespace App\Services;

use App\Models\RolePermission;

class QuyenChucVuService
{
    protected $quyenChucVu;

    public function __construct(RolePermission $rolePermission)
    {
        $this->quyenChucVu = $rolePermission;
    }

    public function getAll()
    {
        return $this->quyenChucVu->all();
    }

    public function store($params)
    {
        $this->quyenChucVu->role_id = $params['ma_chuc_vu'];
        $this->quyenChucVu->permission_id = $params['ma_quyen'];
        $this->quyenChucVu->save();
        return $this->quyenChucVu;
    }
}
