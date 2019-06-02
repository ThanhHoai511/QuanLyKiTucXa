<?php

namespace App\Services;

use App\Models\DichVu;

class DichVuService{
    protected $dichVu;

    public function __construct(DichVu $dichVu)
    {
        $this->dichVu = $dichVu;
    }

    public function getAll()
    {
        return $this->dichVu->all();
    }

    public function store($request)
    {
        $this->dichVu->ten = $request->ten;
        $this->dichVu->mo_ta = $request->mo_ta;
        $this->dichVu->gia = (int)str_replace(',', '', $request->gia);
        $this->dichVu->so_tieu_thu_cho_phep = $request->so_tieu_thu_cho_phep;
        $this->dichVu->save();
    }

    public function update($request, $id)
    {
        $dichVuUpdate = $this->findByID($id);
        $dichVuUpdate->ten = $request->ten;
        $dichVuUpdate->mo_ta = $request->mo_ta;
        $dichVuUpdate->gia = (int)str_replace(',', '', $request->gia);
        $dichVuUpdate->so_tieu_thu_cho_phep = $request->so_tieu_thu_cho_phep;
        $dichVuUpdate->save();
    }

    public function destroy($id)
    {
        return $this->dichVu->destroy($id);
    }

    public function findByID($id)
    {
        return $this->dichVu->findOrFail($id);
    }
}
