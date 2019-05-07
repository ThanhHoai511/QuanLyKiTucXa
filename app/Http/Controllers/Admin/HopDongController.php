<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonDangKyService;
use App\Services\HopDongService;
use App\Services\PhongService;
use App\Services\SinhVienService;
use App\Services\TaiKhoanService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\MailSuccess;
use DB;
class HopDongController extends Controller
{
    protected $hopDongService;
    protected $donDangKiService;
    protected $phongService;
    protected $sinhVienService;
    protected $taiKhoanService;

    public function __construct(
        HopDongService $hopDongService,
        DonDangKyService $donDangKyService,
        PhongService $phongService,
        SinhVienService $sinhVienService,
        TaiKhoanService $taiKhoanService
    )
    {
        $this->hopDongService = $hopDongService;
        $this->donDangKiService = $donDangKyService;
        $this->phongService = $phongService;
        $this->sinhVienService = $sinhVienService;
        $this->taiKhoanService = $taiKhoanService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hopDong = $this->hopDongService->index();

        return view('admin.hopdong.danh-sach', ['hopDong' => $hopDong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $phong = $this->phongService->getById($request->idPhong);
        $donDangKy = $this->donDangKiService->getById($request->id);
        $sinhVien = $this->sinhVienService->getByMSV($donDangKy->ma_sinh_vien);
        return view('admin.hopdong.create', ['phong' => $phong, 'donDangKy'=> $donDangKy, 'sinhVien' => $sinhVien]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $hopDong = $this->hopDongService->store($request);
            $sinhVien = $this->sinhVienService->getById($hopDong->ma_sv_utc);
            $email = $sinhVien->email;
            if (!$this->taiKhoanService->findByEmail($sinhVien->email)) {
                $taiKhoan = $this->taiKhoanService->store($sinhVien->email, config('constants.KHONG_DUOC_TRUY_CAP'));
                Mail::send('admin.mails.user_success',
                array('name'=> $sinhVien->ho_ten, 'username' => $email, 'password'=> $taiKhoan[1]), function($message) use($email)
                {
                    $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
                });
            } else {
                Mail::send('admin.mails.dang-ki-success', 
                array('name'=> $sinhVien->ho_ten, 'username' => $sinhVien->email), function($message) use ($email)
                {
                    $message->to($email)->subject('Kí túc xá Đại học Giao thông vận tải');
                });
            }
            
            $this->donDangKiService->updateStatus($request->don_dang_ky);
            $this->phongService->incrementSLSinhVien($hopDong->ma_phong);
            
            return redirect()->route('danhSachHopDong')->with('success', 'Tạo hợp đồng thành công');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
