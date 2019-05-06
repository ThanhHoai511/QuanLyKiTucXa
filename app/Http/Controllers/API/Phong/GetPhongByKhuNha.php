<?php

namespace App\Http\Controllers\API\Phong;

use App\Services\PhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GetPhongByKhuNha extends Controller
{
    protected $phongService;

    public function __construct(PhongService $phongService)
    {
        $this->phongService = $phongService;
    }

    public function main(Request $request)
    {
        $requestData = $this->getData($request);
        $this->validation($requestData);
        $responseData = $this->phongService->getPhongByKhuNha($requestData);

        return response()->json($responseData, 200);
    }

    protected function getData(Request $request)
    {
        return [
            'ma_khu' => $request->ma_khu
        ];
    }

    protected function validation($requestData)
    {
        return Validator::make($requestData, [
            'ma_khu' => 'required|integer'
        ])->validate();
    }
}
