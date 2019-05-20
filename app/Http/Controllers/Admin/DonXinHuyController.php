<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonXinChamDutHopDongService;
use App\Services\HoaDonDichVuService;
use App\Services\HoaDonPhongService;
use App\Services\HopDongService;
use App\Services\PhongService;
use App\Services\PhongSinhVienService;
use App\Services\SinhVienService;
use App\Services\TaiKhoanService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DonXinHuyController extends Controller
{
    protected $donXinHuyService;
    protected $hoaDonPhongService;
    protected $phongSinhVienService;
    protected $hoaDonDichVuService;
    protected $phongService;
    protected $sinhVienService;
    protected $taiKhoanService;
    protected $hopDongService;

    public function __construct(
        DonXinChamDutHopDongService $donXinHuyService,
        HoaDonPhongService $hoaDonPhongService,
        PhongSinhVienService $phongSinhVienService,
        HoaDonDichVuService $hoaDonDichVuService,
        PhongService $phongService,
        SinhVienService $sinhVienService,
        TaiKhoanService $taiKhoanService,
        HopDongService $hopDongService
    ) {
        $this->donXinHuyService = $donXinHuyService;
        $this->hoaDonPhongService = $hoaDonPhongService;
        $this->phongSinhVienService = $phongSinhVienService;
        $this->hoaDonDichVuService = $hoaDonDichVuService;
        $this->phongService = $phongService;
        $this->sinhVienService = $sinhVienService;
        $this->taiKhoanService = $taiKhoanService;
        $this->hopDongService = $hopDongService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donXinHuy = $this->donXinHuyService->getAllWithPaginate();
        foreach ($donXinHuy as $don) {
            $hopDong = $this->hopDongService->getByID($don->ma_hop_dong);
            $don->hoa_don_phong = [];
            $don->hoa_don_dich_vu = [];

            if($don->trang_thai == 0) {
                $don->hoa_don_phong = $this->hoaDonPhongService->getHoaDonChuaThanhToanTheoSV($hopDong->ma_sv_utc)->toArray();
                $phongSV = $this->phongSinhVienService->getBySVID($hopDong->ma_sv_utc);
                $don->hoa_don_dich_vu = $this->hoaDonDichVuService->getHDChuaThanhToanByPhongID($phongSV->ma_phong)->toArray();
            }
        }
        return view('admin.donxinchamduthopdong.danh-sach', ['donXinHuy' => $donXinHuy]);
    }

    public function chapNhanDon($id)
    {
        return DB::transaction(function () use ($id) {
            $this->donXinHuyService->update($id);
            $don = $this->donXinHuyService->getById($id);
            $this->hopDongService->chuyenTrangThai($don->ma_hop_dong);
            $hopDong = $this->hopDongService->getByID($don->ma_hop_dong);
            $sinhVien = $this->sinhVienService->getById($hopDong->ma_sv_utc);
            $email = $sinhVien->email;
            Mail::send('admin.mails.huy-thanh-cong',
                array('name'=> $sinhVien->ho_ten), function($message) use($email)
                {
                    $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
                });
            $this->phongService->updateSLSinhVien($hopDong->ma_phong, config('constants.GIAM_SV'));
            $phongSV = $this->phongSinhVienService->getBySVID($hopDong->ma_sv_utc);
            $this->phongSinhVienService->destroy($phongSV->id);
            $this->taiKhoanService->voHieuHoa($sinhVien->user_id);

            return redirect()->route('danhSachDonXinHuy')->with('Phê duyệt thành công!');
        });
    }

    public function nhacNho($maDon)
    {
        $don = $this->donXinHuyService->getById($maDon);
        $hopDong = $this->hopDongService->getByID($don->ma_hop_dong);
        $sinhVien = $this->sinhVienService->getById($hopDong->ma_sv_utc);
        $email = $sinhVien->email;
        Mail::send('admin.mails.nhac-nho-dong-tien',
            array('name'=> $sinhVien->ho_ten), function($message) use($email)
            {
                $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
            });

        return redirect()->route('danhSachDonXinHuy')->with('success', 'Gửi email cho sinh viên thành công!');
    }
}
