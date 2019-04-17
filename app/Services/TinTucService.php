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

    public function getTinTuc($loai)
    {
        return $this->tinTuc->where('loai', $loai)->orderBy('updated_at')->paginate(20);
    }

    public function store($params)
    {
        $this->tinTuc->tieu_de = $params['tieu_de'];
        $this->tinTuc->noi_dung = $params['noi_dung'];
        $this->tinTuc->loai = $params['loai'];
        $tinh_trang = 0;
        if ($params['tinh_trang'] == "on") {
            $tinh_trang = 1;
        }
        $this->tinTuc->trang_thai = $tinh_trang;
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
