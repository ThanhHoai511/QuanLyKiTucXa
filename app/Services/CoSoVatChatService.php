<?php

namespace App\Services;

use App\Models\CoSoVatChat;
use Maatwebsite\Excel\Facades\Excel;

class CoSoVatChatService
{
    protected $csvc;

    public function __construct(CoSoVatChat $coSoVatChat)
    {
        $this->csvc = $coSoVatChat;
    }

    public function getAllWithPaginate($name)
    {
        $csvc = $this->csvc->query();
        if ($name != "") {
            $csvc = $csvc->where('ten', 'like', '%' . $name . '%');
        }

        return $csvc->paginate(20);
    }

    public function store($request)
    {
        $this->csvc->ten = $request->ten;
        $this->csvc->gia = (int)str_replace(',', '', $request->gia);
        $this->csvc->tien_cong = (int)str_replace(',', '', $request->tien_cong);
        $this->csvc->save();
    }

    public function update($request, $id)
    {
        $csvcUpdate = $this->findByID($id);
        $csvcUpdate->ten = $request->ten;
        $csvcUpdate->gia = (int)str_replace(',', '', $request->gia);
        $csvcUpdate->tien_cong = (int)str_replace(',', '', $request->tien_cong);
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

    public function storeFromExcel($request)
    {
        $csvc = Excel::load($request->file_excel, function () {
        })->get()->toArray();
        if (empty($csvc)) {
            return false;
        }
        $insert = [];
        foreach ($csvc as $csvc) {
            if (trim($csvc['ten_tai_san'])== '') {
                break;
            }
            if (CoSoVatChat::where('ten', $csvc['ten_tai_san'])->exists()) {
                continue;
            }
            $insert[] = ['ten' => $csvc['ten_tai_san'],
                'gia' => $csvc['tien_mua_vat_tu'],
                'tien_cong' => $csvc['tien_cong']
                ];
        }
        CoSoVatChat::insert($insert);
        return true;
    }
}
