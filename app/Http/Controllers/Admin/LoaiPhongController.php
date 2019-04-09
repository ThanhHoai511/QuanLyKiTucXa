<?php

namespace App\Http\Controllers\Admin;

use App\Services\LoaiPhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoaiPhongController extends Controller
{
    protected $loaiPhongService;

    public function __construct(LoaiPhongService $loaiPhongService)
    {
        $this->loaiPhongService = $loaiPhongService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiPhong = $this->loaiPhongService->getAll();

        return view('admin.loaiphong.danh-sach', ['loaiPhong' => $loaiPhong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loaiphong.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->loaiPhongService->store($request);

        return redirect()->route('danhSachLoaiPhong');
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
        $loaiPhongUpdate = $this->loaiPhongService->getByID($id);
        return view('admin.loaiphong.cap-nhat', ['loaiPhongUpdate' => $loaiPhongUpdate]);
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
        $this->loaiPhongService->update($request, $id);

        return redirect()->route('danhSachLoaiPhong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->loaiPhongService->destroy($id);

        return redirect()->route('danhSachLoaiPhong');
    }
}
