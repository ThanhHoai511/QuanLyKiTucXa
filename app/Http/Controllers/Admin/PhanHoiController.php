<?php

namespace App\Http\Controllers\Admin;

use App\Services\BinhLuanService;
use App\Services\PhanHoiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhanHoiController extends Controller
{
    protected $phanHoiService;
    protected $binhLuanService;

    public function __construct(PhanHoiService $phanHoiService, BinhLuanService $binhLuanService)
    {
        $this->phanHoiService = $phanHoiService;
        $this->binhLuanService = $binhLuanService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phanHoi = $this->phanHoiService->getAllWithPaginate();
        foreach($phanHoi as $ph) {
            $ph->binh_luan = $this->binhLuanService->getByMaPhanHoi($ph->id);
        }
        return view('admin.phanhoi.danh-sach', ['phanHoi' => $phanHoi]);
    }

    public function themBinhLuan(Request $request)
    {
        $this->binhLuanService->store($request);

        return redirect()->route('danhSachPhanHoi')->with('success', 'Thêm bình luận thành công!');
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
