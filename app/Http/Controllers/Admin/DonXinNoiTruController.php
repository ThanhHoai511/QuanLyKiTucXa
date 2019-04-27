<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonDangKyService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonXinNoiTruController extends Controller
{
    protected $donDangKyService;

    public function __construct(DonDangKyService $donDangKyService)
    {
        $this->donDangKyService = $donDangKyService;
    }

    public function index()
    {
        $donDangKy = $this->donDangKyService->getAll(20);
        return view('admin/donxinnoitru/danh-sach', ['donDangKy' => $donDangKy]);
    }
}
