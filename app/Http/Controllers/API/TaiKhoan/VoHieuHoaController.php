<?php

namespace App\Http\Controllers\API\TaiKhoan;

use App\Services\TaiKhoanService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VoHieuHoaController extends Controller
{
    protected $taiKhoanService;

    public function __construct(TaiKhoanService $taiKhoanService)
    {
        $this->taiKhoanService = $taiKhoanService;
    }

    public function main(Request $request)
    {
        $requestData = $this->getData($request);
        $this->validation($requestData);
        $this->taiKhoanService->voHieuHoa($requestData['id']);

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
