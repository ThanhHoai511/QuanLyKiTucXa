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
        return $tinTucs->orderBy('updated_at')->paginate(20);
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
        $this->tinTuc->ma_tai_khoan = 8;
        if($params['anh'] != "") {
            $imageName = time().'.'.$params['anh']->getClientOriginalExtension();
            $params['anh']->move(public_path('images/tintuc'), $imageName);
        }

        $this->tinTuc->save();
    }

    public function update($params, $id)
    {
        $tinTucUpdate = $this->getById($id);
        $tinTucUpdate->tieu_de = $params['tieu_de'];
        $tinTucUpdate->noi_dung = $params['noi_dung'];
        $tinTucUpdate->save();
    }

    public function handle($option, $id)
    {
        $tinTucHandle = $this->getById($id);

        if ($option == "approve") {
            $tinTucHandle->tinh_trang =  config('constants.DANG_TIN');
        } else {
            $tinTucHandle->tinh_trang =  config('constants.AN_TIN');
        }

        $tinTucHandle->save();
        return $tinTucHandle;
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
