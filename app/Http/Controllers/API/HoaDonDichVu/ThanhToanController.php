<?php

namespace App\Http\Controllers\API\HoaDonDichVu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Services\HoaDonDichVuService;

class ThanhToanController extends Controller
{
    protected $hoaDonDichVuService;

    public function __construct(HoaDonDichVuService $hoaDonDichVuService)
    {
        $this->hoaDonDichVuService = $hoaDonDichVuService;
    }

    public function main(Request $request)
    {
        $requestData = $this->getData($request);
        $this->validation($requestData);
        $this->hoaDonDichVuService->changeStatus($requestData['id']);

        return response()->json([], 204);
    }

    protected function getData(Request $request)
    {
        return [
            'id' => $request->id
        ];
    }

    protected function validation($requestData)
    {
        return Validator::make($requestData, [
            'id' => 'required|integer'
        ])->validate();
    }
}
