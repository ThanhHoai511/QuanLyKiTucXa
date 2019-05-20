<?php

namespace App\Services;

use App\Models\TinTuc;
use Illuminate\Support\Facades\Config;

class TinTucService
{
    protected $tinTuc;

    public function __construct(TinTuc $tinTuc)
    {
        $this->tinTuc = $tinTuc;
    }

    public function getTinTuc($loai = "", $tieuDe = "")
    {
        $tinTucs = $this->tinTuc->query();
        if ($loai != "") {
            $tinTucs = $tinTucs->where('loai', $loai);
        }
        if ($tieuDe != "") {
            $tinTucs = $tinTucs->where('tieu_de', 'like', '%' . $tieuDe . '%');
        }
        return $tinTucs->where('trang_thai', 1)
        ->orderBy('created_at', 'desc')->paginate(20);
    }

    public function getTin($loai)
    {
        return $this->tinTuc->where('trang_thai', 1)->where('loai', $loai)->get();
    }

    public function getTinNoiBat()
    {
        return $this->tinTuc->where('loai', config('constants.TIN_TUC'))
            ->where('noi_bat', 1)
            ->where('trang_thai', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)->get();
    }
    public function getHotNews()
    {
        return $this->tinTuc->where('noi_bat', 1)->paginate(3);
    }

    public function store($params)
    {
        $this->tinTuc->tieu_de = $params['tieu_de'];
        $this->tinTuc->noi_dung = $params['noi_dung'];
        $this->tinTuc->loai = $params['loai'];
        $this->tinTuc->trang_thai = $params['trang_thai'];
        $this->tinTuc->noi_bat = $params['noi_bat'];
        $this->tinTuc->nhan_vien_tao = 1;
        if($params['anh'] != "") {
            $imageName = time().'.'.$params['anh']->getClientOriginalExtension();
            $params['anh']->move(public_path('images/tintuc'), $imageName);
            $this->tinTuc->anh = $imageName;
        }

        $this->tinTuc->save();
    }

    public function update($params, $id)
    {
        $tinTucUpdate = $this->getById($id);
        $tinTucUpdate->tieu_de = $params['tieu_de'];
        $tinTucUpdate->noi_dung = $params['noi_dung'];
        $tinTucUpdate->loai = $params['loai'];
        $tinTucUpdate->trang_thai = $params['trang_thai'];
        $tinTucUpdate->noi_bat = $params['noi_bat'];
        if($params['anh'] != "") {
            $imageName = time().'.'.$params['anh']->getClientOriginalExtension();
            $params['anh']->move(public_path('images/tintuc'), $imageName);
            $tinTucUpdate->anh = $imageName;
        }
        $tinTucUpdate->save();
    }


    public function destroy($id)
    {
        return $this->tinTuc->destroy($id);
    }

    public function getById($id)
    {
        return $this->tinTuc->findOrFail($id);
    }
}
