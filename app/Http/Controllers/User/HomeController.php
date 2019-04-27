<?php

namespace App\Http\Controllers\User;

use App\Services\DonDangKyService;
use App\Services\LoaiPhongService;
use App\Services\TinTucService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $tinTucService;
    protected $loaiPhongService;
    protected $donDangKyService;

    public function __construct(TinTucService $tinTucService, DonDangKyService $donDangKyService, LoaiPhongService $loaiPhongService)
    {
        $this->tinTucService = $tinTucService;
        $this->donDangKyService = $donDangKyService;
        $this->loaiPhongService = $loaiPhongService;
    }

    public function index()
    {
        $tinTuc = $this->tinTucService->getTinTuc(config('constants.TIN_TUC'));
        $hotNews = $this->tinTucService->getHotNews();
        return view('user.layouts.trang-chu', ['tinTuc' => $tinTuc, 'hotNews' => $hotNews]);
    }

    public function donDangKy()
    {
        $loaiPhong = $this->loaiPhongService->getAll();
        return view('user.layouts.don-dang-ky', ['loaiPhong' => $loaiPhong]);
    }

    public function guiDonDangKy(Request $request)
    {
        $this->donDangKyService->store($request);
        return redirect()->back()->with('success', 'Gửi đơn đăng ký thành công!');
    }
}
