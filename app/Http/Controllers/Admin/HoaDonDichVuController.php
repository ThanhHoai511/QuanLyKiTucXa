<?php

namespace App\Http\Controllers\Admin;

use App\Services\DichVuService;
use App\Services\HoaDonDichVuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoaDonDichVuController extends Controller
{
    protected $hoaDonDichVuService;
    protected $dichVuService;

    public function __construct(HoaDonDichVuService $hoaDonDichVuService, DichVuService $dichVuService)
    {
        $this->hoaDonDichVuService = $hoaDonDichVuService;
        $this->dichVuService = $dichVuService;
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
    public function create()
    {
        $dichVu = $this->dichVuService->getAll();

        return view('admin.hoadondichvu.cap-nhat', ['dichVu' => $dichVu]);
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
