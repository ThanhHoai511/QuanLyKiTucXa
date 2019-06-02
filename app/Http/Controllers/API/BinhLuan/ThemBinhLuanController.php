<?php

namespace App\Http\Controllers\API\BinhLuan;

use App\Services\BinhLuanService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ThemBinhLuanController extends Controller
{
    protected $binhLuanService;

    public function __construct(BinhLuanService $binhLuanService)
    {
        $this->binhLuanService = $binhLuanService;
    }

    public function main(Request $request)
    {
        $requestData = $this->getData($request);
        $this->validation($requestData);
        $this->binhLuanService->store($requestData);

        return response()->json([], 204);
    }

    protected function getData(Request $request)
    {
        return [
            'noi_dung' => $request->noi_dung,
            'ma_phan_hoi' => $request->ma_phan_hoi
        ];
    }

    protected function validation($requestData)
    {
        return Validator::make($requestData, [
            'noi_dung' => 'required|string',
            'ma_phan_hoi' => 'required|integer'
        ])->validate();
    }
}
