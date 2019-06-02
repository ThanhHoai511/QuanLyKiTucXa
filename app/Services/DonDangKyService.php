<?php

namespace App\Services;

use App\Models\DonXinNoiTru;
use Illuminate\Support\Facades\Mail;

class DonDangKyService
{
    protected $donDangKy;
    protected $sinhVienService;

    /**
     * DonDangKyService constructor.
     * @param DonXinNoiTru $donDangKy
     * @param SinhVienService $
     */
    public function __construct(DonXinNoiTru $donDangKy, SinhVienService $sinhVienService)
    {
        $this->donDangKy = $donDangKy;
        $this->sinhVienService = $sinhVienService;
    }

    public function getAll($numberRecord = "")
    {
        if ($numberRecord != "") {
            return $this->donDangKy->orderBy('created_at', 'desc')->paginate($numberRecord);
        }
        return $this->donDangKy->all();
    }

    public function store($request)
    {
        $this->donDangKy->ma_sinh_vien = $request->ma_sinh_vien;
        $this->donDangKy->chu_thich = $request->chu_thich;
        $filename = time() . '.' . $request->file('anh')->getClientOriginalExtension();
        $request->file('anh')->move(public_path('/images/sinhvien'), $filename);
        $this->donDangKy->anh = $filename;
        $this->donDangKy->ma_loai_phong = $request->ma_loai_phong;
        $this->donDangKy->save();
    }

    //tinh trang = 1 la da phe duyet
    public function updateStatus($id)
    {
        $ddkUpdate = $this->getById($id);
        $ddkUpdate->tinh_trang = 1;
        $ddkUpdate->save();
    }

    //tinh trang = 2 la da gui mail
    public function guiMail($params)
    {
        $sinhVien = $this->sinhVienService->getByMSV($params->ma_sinh_vien);
        $email = $sinhVien->email;
        Mail::send('admin.mails.hen-ngay-lam-hop-dong',
            array('name'=> $sinhVien->ho_ten, 'ngay_hen' => $params->ngay_hen), function($message) use($email)
            {
                $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
            });
        $this->daGuiMail($params->ma_don);
    }

    public function daGuiMail($id)
    {
        $ddkUpdate = $this->getById($id);
        $ddkUpdate->tinh_trang = 2;
        $ddkUpdate->save();
    }
    //tinh trang = -1 la tu choi
    public function tuChoi($id)
    {
        $ddkUpdate = $this->getById($id);
        $ddkUpdate->tinh_trang = -1;
        $ddkUpdate->save();
    }

    public function getById($id)
    {
        return $this->donDangKy->findOrFail($id);
    }
}
