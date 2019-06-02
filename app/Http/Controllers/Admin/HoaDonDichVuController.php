<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HoaDonDichVuRequest;
use App\Services\DichVuService;
use App\Services\HoaDonDichVuService;
use App\Services\KhuNhaServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoaDonDichVuController extends Controller
{
    protected $hoaDonDichVuService;
    protected $dichVuService;
    protected $khuNhaService;

    public function __construct(
        HoaDonDichVuService $hoaDonDichVuService,
        DichVuService $dichVuService,
        KhuNhaServices $khuNhaService
    )
    {
        $this->hoaDonDichVuService = $hoaDonDichVuService;
        $this->dichVuService = $dichVuService;
        $this->khuNhaService = $khuNhaService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hoaDon = $this->hoaDonDichVuService->index($request);

        return view('admin.hoadondichvu.danh-sach', ['hoaDon' => $hoaDon, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khuNha = $this->khuNhaService->getAll();
        $dichVu = $this->dichVuService->getAll();
        return view('admin.hoadondichvu.cap-nhat', ['khuNha' => $khuNha, 'dichVu' => $dichVu]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HoaDonDichVuRequest $request)
    {
        $this->hoaDonDichVuService->store($request);

        return redirect()->back()->with('success', 'Tạo hóa đơn dịch vụ thành công!');
    }

    public function createExcel()
    {
        return view('admin.hoadondichvu.excel');
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
        $hoaDonDV = $this->hoaDonDichVuService->getById($id);
        $dichVu = $this->dichVuService->getAll();
        $khuNha = $this->khuNhaService->getAll();

        return view('admin.hoadondichvu.cap-nhat', ['hoaDonDV' => $hoaDonDV, 'dichVu' => $dichVu, 'khuNha' => $khuNha]);
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
        $this->hoaDonDichVuService->update($request, $id);

        return redirect()->route('danhSachHDDV')->with('success', 'Sửa hóa đơn dịch vụ thành công!');
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
