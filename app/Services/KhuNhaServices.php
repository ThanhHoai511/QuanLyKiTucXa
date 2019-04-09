<?php

namespace App\Services;

use App\Models\KhuNha;

class KhuNhaServices
{
    protected $khuNha;

    public function __construct(KhuNha $khuNha)
    {
        $this->khuNha = $khuNha;
    }

    public function getAll()
    {
        return $this->khuNha->all();
    }

    public function store($request)
    {
        $this->khuNha->ten = $request->ten;
        $this->khuNha->mo_ta = $request->mo_ta;
        $this->khuNha->doi_tuong = $request->doi_tuong;
        $this->khuNha->save();
    }

    public function update($request, $id)
    {
        $khuNhaUpdate = $this->findByID($id);
        $khuNhaUpdate->ten = $request->ten;
        $khuNhaUpdate->mo_ta = $request->mo_ta;
        $khuNhaUpdate->doi_tuong = $request->doi_tuong;
        $khuNhaUpdate->save();
    }

    public function destroy($id)
    {
        return $this->khuNha->destroy($id);
    }

    public function findByID($id)
    {
        return $this->khuNha->findOrFail($id);
    }
}
