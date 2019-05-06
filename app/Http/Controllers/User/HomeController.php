<?php

namespace App\Http\Controllers\User;

use App\Services\DonDangKyService;
use App\Services\KhuNhaServices;
use App\Services\LoaiPhongService;
use App\Services\TinTucService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $tinTucService;
    protected $loaiPhongService;
    protected $donDangKyService;
    protected $khuNhaService;

    public function __construct(
        TinTucService $tinTucService,
        DonDangKyService $donDangKyService,
        LoaiPhongService $loaiPhongService,
        KhuNhaServices $khuNhaService
    ) {
        $this->tinTucService = $tinTucService;
        $this->donDangKyService = $donDangKyService;
        $this->loaiPhongService = $loaiPhongService;
        $this->khuNhaService = $khuNhaService;
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

    public function donXinHuy()
    {
        $khuNha = $this->khuNhaService->getAll();
        return view('user.layouts.don-xin-huy', ['khuNha' => $khuNha]);
    }
}
