<?php

namespace App\Http\Controllers\Admin;

use App\Services\DonXinChamDutHopDongService;
use App\Services\HoaDonPhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonXinHuyController extends Controller
{
    protected $donXinHuyService;
    protected $hoaDonPhongService;

    public function __construct(DonXinChamDutHopDongService $donXinHuyService, HoaDonPhongService $hoaDonPhongService)
    {
        $this->donXinHuyService = $donXinHuyService;
        $this->hoaDonPhongService = $hoaDonPhongService;
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
            $don->hoa_don_phong = $this->hoaDonPhongService->getHoaDonChuaThanhToanTheoSV($don->ma_sv_utc);
        }
        dd($donXinHuy);

        return view('admin.donxinchamduthopdong.danh-sach', ['donXinHuy' => $donXinHuy]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
