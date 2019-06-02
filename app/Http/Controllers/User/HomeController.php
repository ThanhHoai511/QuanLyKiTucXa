<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\DonXinHuyRequest;
use App\Http\Requests\DonXinNoiTruRequest;
use App\Services\BinhLuanService;
use App\Services\DonDangKyService;
use App\Services\DonXinChamDutHopDongService;
use App\Services\HoaDonDichVuService;
use App\Services\HoaDonPhongService;
use App\Services\HopDongService;
use App\Services\KhuNhaServices;
use App\Services\LoaiPhongService;
use App\Services\PhanHoiService;
use App\Services\PhongService;
use App\Services\PhongSinhVienService;
use App\Services\SinhVienService;
use App\Services\TinTucService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $tinTucService;
    protected $loaiPhongService;
    protected $donDangKyService;
    protected $khuNhaService;
    protected $donXinHuyService;
    protected $hoaDonPhongService;
    protected $hoaDonDVService;
    protected $phongSVService;
    protected $phanHoiService;
    protected $hopDongService;
    protected $binhLuanService;
    protected $sinhVienService;
    protected $phongService;

    public function __construct(
        TinTucService $tinTucService,
        DonDangKyService $donDangKyService,
        LoaiPhongService $loaiPhongService,
        KhuNhaServices $khuNhaService,
        DonXinChamDutHopDongService $donXinHuyService,
        HoaDonPhongService $hoaDonPhongService,
        HoaDonDichVuService $hoaDonDichVuService,
        PhongSinhVienService $phongSinhVienService,
        PhanHoiService $phanHoiService,
        HopDongService $hopDongService,
        BinhLuanService $binhLuanService,
        SinhVienService $sinhVienService,
        PhongService $phongService
    ) {
        $this->tinTucService = $tinTucService;
        $this->donDangKyService = $donDangKyService;
        $this->loaiPhongService = $loaiPhongService;
        $this->khuNhaService = $khuNhaService;
        $this->donXinHuyService = $donXinHuyService;
        $this->hoaDonPhongService = $hoaDonPhongService;
        $this->hoaDonDVService = $hoaDonDichVuService;
        $this->phongSVService = $phongSinhVienService;
        $this->phanHoiService = $phanHoiService;
        $this->hopDongService = $hopDongService;
        $this->binhLuanService = $binhLuanService;
        $this->sinhVienService = $sinhVienService;
        $this->phongService = $phongService;
    }

    public function index()
    {
        $tinTuc = $this->tinTucService->getTinTuc(config('constants.TIN_TUC'));
        $hotNews = $this->tinTucService->getTinNoiBat();
        return view('user.layouts.trang-chu', ['tinTuc' => $tinTuc, 'hotNews' => $hotNews]);
    }

    public function gioiThieu()
    {
        $gioiThieu = $this->tinTucService->getTin(2);
        return view('user.layouts.gioi-thieu', ['gioiThieu' => $gioiThieu]);
    }

    public function banQuanLy()
    {
        $banQL = $this->tinTucService->getTin(3);
        return view('user.layouts.ban-quan-ly', ['banQL' => $banQL]);
    }

    public function donDangKy()
    {
        $soChoTrong = $this->phongService->getChoTrongTheoLoaiPhong();
        return view('user.layouts.don-dang-ky', ['choTrong' => $soChoTrong]);
    }

    public function guiDonDangKy(DonXinNoiTruRequest $request)
    {
        $sinhVien = $this->sinhVienService->getByMSV($request->ma_sinh_vien);
        $phongSV = $this->phongSVService->getBySVID($sinhVien->id);
        if($phongSV != null) {
            return redirect()->back()->with('warning', 'Sinh viên này hiện đang ở kí túc xá! Bạn không thể gửi đơn đăng kí nội trú!');
        }
        $this->donDangKyService->store($request);
        return redirect()->back()->with('success', 'Gửi đơn đăng ký thành công!');
    }

    public function donXinHuy()
    {
        $khuNha = $this->khuNhaService->getAll();
        return view('user.layouts.don-xin-huy', ['khuNha' => $khuNha]);
    }

    public function guiDonXinHuy(Request $request)
    {
        $this->donXinHuyService->store($request);

        return redirect()->back()->with('success', 'Gửi đơn xin chấm dứt hợp đồng thành công!');
    }

    public function formPhanHoi()
    {
        $phanHoi = $this->phanHoiService->getByUser(1);
        foreach($phanHoi as $ph) {
            $ph->binh_luan = $this->binhLuanService->getByMaPhanHoi($ph->id);
        }

        return view('user.layouts.phan-hoi', ['phanHoi' => $phanHoi]);
    }

    public function guiPhanHoi(Request $request)
    {
        $this->phanHoiService->store($request);

        return redirect()->back()->with("success", "Gửi phản hồi thành công!");
    }

    public function chiTietHopDong()
    {
        $hopDong = $this->hopDongService->getByMSV(Auth::user()->sinhvien->id);
        $hoaDonPhong = $this->hoaDonPhongService->getHoaDonChuaThanhToanTheoSV(Auth::user()->sinhvien->id);
        $phongSV = $this->phongSVService->getBySVID(Auth::user()->sinhvien->id);
        $hoaDonDichVu = [];
        if($phongSV) {
            $hoaDonDichVu = $this->hoaDonDVService->getHDChuaThanhToanByPhongID($phongSV->ma_phong);
        }
        return view('user.layouts.chi-tiet-hop-dong', ['hopDong' => $hopDong, 'hoaDonPhong' => $hoaDonPhong, 'hoaDonDichVu' => $hoaDonDichVu]);
    }

    public function guiBinhLuan(Request $request)
    {
        $this->binhLuanService->store($request);

        return redirect()->back();
    }
}
