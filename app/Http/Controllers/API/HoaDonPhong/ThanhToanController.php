<?php

namespace App\Http\Controllers\API\HoaDonPhong;

use App\Services\HoaDonPhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ThanhToanController extends Controller
{
    protected $hoaDonPhongService;

    public function __construct(HoaDonPhongService $hoaDonPhongService)
    {
        $this->hoaDonPhongService = $hoaDonPhongService;
    }

    public function main(Request $request)
    {
        $requestData = $this->getData($request);
        $this->validation($requestData);
        $this->hoaDonPhongService->thanhToan($requestData['id']);

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
