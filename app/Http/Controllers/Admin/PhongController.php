<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PhongRequest;
use App\Services\KhuNhaServices;
use App\Services\LoaiPhongService;
use App\Services\PhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhongController extends Controller
{
    protected $phongService;
    protected $loaiPhongService;
    protected $khuNhaService;

    public function __construct(
        PhongService $phongService,
        LoaiPhongService $loaiPhongService,
        KhuNhaServices $khuNhaService
    ) {
        $this->phongService = $phongService;
        $this->loaiPhongService = $loaiPhongService;
        $this->khuNhaService = $khuNhaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phong = $this->phongService->getAllWithPaginate($request->ten, $request->khu_nha);
        $khuNha = $this->khuNhaService->getAll();

        return view('admin.phong.danh-sach', ['phong' => $phong, 'khuNha' => $khuNha, 'params' => $request]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiPhong = $this->loaiPhongService->getAll();
        $khuNha = $this->khuNhaService->getAll();

        return view('admin.phong.cap-nhat', ['loaiPhong' => $loaiPhong, 'khuNha' => $khuNha]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhongRequest $request)
    {
        $this->phongService->store($request);

        return redirect()->route('danhSachPhong')->with('success', 'Thêm phòng thành công!');
    }

    public function importExcel()
    {
        $khuNha = $this->khuNhaService->getAll();
        $loaiPhong = $this->loaiPhongService->getAll();
        return view('admin.phong.excel', ['khuNha' => $khuNha, 'loaiPhong' => $loaiPhong]);
    }

    public function storeExcel(Request $request)
    {
        $result = $this->phongService->storeFromExcel($request);
        if ($result) {
            return redirect()->route('danhSachPhong')->with('success', 'Thêm phòng từ file excel thành công!');
        }
        return redirect()->route('danhSachPhong')->with('warning', 'Thêm phòng từ file excel không thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiPhong = $this->loaiPhongService->getAll();
        $khuNha = $this->khuNhaService->getAll();
        $phongUpdate = $this->phongService->getById($id);

        return view('admin.phong.cap-nhat', ['loaiPhong' => $loaiPhong, 'khuNha' => $khuNha, 'phongUpdate' => $phongUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhongRequest $request, $id)
    {
        $this->phongService->update($request, $id);

        return redirect()->route('danhSachPhong')->with('success', 'Sửa phòng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->phongService->destroy($id);

        return redirect()->route('danhSachPhong')->with('success', 'Xóa phòng thành công!');
    }
}
