<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        $hoaDon = $this->hoaDonDichVuService->index();

        return view('admin.hoadondichvu.danh-sach', ['hoaDon' => $hoaDon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chonKhu(Request $request)
    {
        $khuNha = $this->khuNhaService->getAll();
        return view('admin.hoadondichvu.chon-khu-nha', ['request' => $request, 'khuNha' => $khuNha]);
    }

    public function chonThoiGian()
    {
        return view('admin.hoadondichvu.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
