<?php

namespace App\Services;

use App\Models\CoSoVatChat;

class CoSoVatChatService
{
    protected $csvc;

    public function __construct(CoSoVatChat $coSoVatChat)
    {
        $this->csvc = $coSoVatChat;
    }

    public function getAll()
    {
        return $this->csvc->all();
    }

    public function store($request)
    {
        $this->csvc->ten = $request->ten;
        $this->csvc->gia = (int)str_replace(',', '', $request->gia);
        $this->csvc->save();
    }

    public function update($request, $id)
    {
        $csvcUpdate = $this->findByID($id);
        $csvcUpdate->ten = $request->ten;
        $csvcUpdate->gia = (int)str_replace(',', '', $request->gia);
        $csvcUpdate->save();
    }

    public function destroy($id)
    {
        return $this->csvc->destroy($id);
    }

    public function findByID($id)
    {
        return $this->csvc->findOrFail($id);
    }
}
