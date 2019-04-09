<?php

namespace App\Services;

use App\Models\TinTuc;

class TinTucService
{
    const AN_TIN = 0;
    const DANG_TIN = 1;
    const TIN_TUC = 1;
    protected $tinTuc;

    public function __construct(TinTuc $tinTuc)
    {
        $this->tinTuc = $tinTuc;
    }

    public function getAllWithPaginate()
    {
        return $this->tinTuc->paginate(20);
    }

    public function store($params)
    {
        $this->tinTuc->tieu_de = $params['tieu_de'];
        $this->tinTuc->noi_dung = $params['noi_dung'];
        $this->tinTuc->loai = self::TIN_TUC;
        $this->tinTuc->tinh_trang = self::AN_TIN;
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
            $tinTucHandle->tinh_trang = self::DANG_TIN;
        } else {
            $tinTucHandle->tinh_trang = self::AN_TIN;
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
