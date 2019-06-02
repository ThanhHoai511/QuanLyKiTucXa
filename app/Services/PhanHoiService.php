<?php

namespace App\Services;

use App\Models\PhanHoi;
use Illuminate\Support\Facades\Auth;

class PhanHoiService
{
    protected $phanHoi;

    public function __construct(PhanHoi $phanHoi)
    {
        $this->phanHoi = $phanHoi;
    }

    public function getAllWithPaginate($loai = "")
    {
        $phanHoi = $this->phanHoi->query();
        if ($loai != "") {
            $phanHoi = $phanHoi->where('loai', $loai);
        }
        return $phanHoi->orderBy('created_at', 'desc')->paginate(20);
    }

    public function store($request)
    {
        $this->phanHoi->noi_dung = $request->noi_dung;
        if($request->an_danh != "on") {
            $this->phanHoi->user_id = Auth::id();
        }
        $this->phanHoi->loai = $request->loai;
        $this->phanHoi->save();
        return $this->phanHoi;
    }

    public function getByUser($userId)
    {
        return $this->phanHoi->where('user_id', $userId)->get();
    }
}
