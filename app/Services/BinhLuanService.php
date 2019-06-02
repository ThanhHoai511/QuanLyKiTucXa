<?php

namespace App\Services;

use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;

class BinhLuanService
{
    protected $binhLuan;

    public function __construct(BinhLuan $binhLuan)
    {
        $this->binhLuan = $binhLuan;
    }

    public function store($params)
    {
        $this->binhLuan->noi_dung = $params['noi_dung'];
        $this->binhLuan->user_id = Auth::id();
        $this->binhLuan->ma_phan_hoi = $params['ma_phan_hoi'];
        $this->binhLuan->save();
        return $this->binhLuan;
    }

    public function getByMaPhanHoi($maPH)
    {
        return $this->binhLuan->where('ma_phan_hoi', $maPH)->get();
    }
}
