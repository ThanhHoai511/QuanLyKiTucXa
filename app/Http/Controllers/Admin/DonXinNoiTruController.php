<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonDangKyService;
use App\Services\PhongService;
use App\Services\SinhVienService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DonXinNoiTruController extends Controller
{
    protected $donDangKyService;
    protected $sinhVienService;
    protected $phongService;

    public function __construct(
        DonDangKyService $donDangKyService,
        SinhVienService $sinhVienService,
        PhongService $phongService
    ) {
        $this->donDangKyService = $donDangKyService;
        $this->sinhVienService = $sinhVienService;
        $this->phongService = $phongService;
    }

    public function index()
    {
        $donDangKy = $this->donDangKyService->getAll(20);
        $maSVInDonDK = [];
        foreach($donDangKy as $ddk) {
            $maSVInDonDK[] = $ddk->ma_sinh_vien;
        }

        $sinhVienCollect = $this->sinhVienService->getByMaSVCollect($maSVInDonDK);

        foreach ($donDangKy as $ddk) {
            $ddk->sinh_vien = $sinhVienCollect->get($ddk->ma_sinh_vien);
        }
        return view('admin/donxinnoitru/danh-sach', ['donDangKy' => $donDangKy]);
    }

    public function showPhong($id)
    {
        $ddk = $this->donDangKyService->getById($id);
        $sinhVien = $this->sinhVienService->getByMSV($ddk->ma_sinh_vien);
        $gioiTinh = $sinhVien->gioi_tinh;
        $gt = 1;
        if(trim($gioiTinh) == "Nữ") {
            $gt = 2;
        }
        $khuNha = $this->phongService->getPhongByCondition($gt, $ddk->ma_loai_phong);

        return view('admin/donxinnoitru/danh-sach-phong', ['khuNha' => $khuNha, 'maDon' => $id]);
    }

    public function tuChoiDon($maDon)
    {
        $this->donDangKyService->tuChoi($maDon);
        $don = $this->donDangKyService->getById($maDon);
        $sinhVien = $this->sinhVienService->getByMSV($don->ma_sinh_vien);
        $email = $sinhVien->email;
        Mail::send('admin.mails.tu-choi-ddk',
            array('name'=> $sinhVien->ho_ten), function($message) use($email)
            {
                $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
            });
        return redirect()->route('danhSachDonDangKy')->with('success', 'Từ chối thành công!');
    }
}
