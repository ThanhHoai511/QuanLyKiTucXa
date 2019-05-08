<?php

namespace App\Http\Controllers\Admin;

use App\Services\NhanVienService;
use App\Services\ChucVuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{
    protected $nhanVienService;
    protected $chucVuService;

    public function __construct(NhanVienService $nhanVienService, ChucVuService $chucVuService)
    {
        $this->nhanVienService = $nhanVienService;
        $this->chucVuService = $chucVuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanVien = $this->nhanVienService->getAll();

        return view('admin.nhanvien.danh-sach', ['nhanVien' => $nhanVien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chucVu = $this->chucVuService->getAll();
        return view('admin.nhanvien.cap-nhat', ['chucVu' => $chucVu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->nhanVienService->create($request);

        return redirect()->route('danhSachNhanVien')->with('success', 'Thêm nhân viên thành công!');
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
        $nhanVienUpdate = $this->nhanVienService->getById($id);

        return view('admin.nhanvien.cap-nhat', ['nhanVienUpdate' => $nhanVienUpdate]);
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
        $this->nhanVienService->edit($request, $id);

        return redirect()->route('danhSachNhanVien')->with('success', 'Sửa nhân viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->nhanVienService->destroy($id);

        return redirect()->route('danhSachNhanVien')->with('success', 'Xóa nhân viên thành công!');
    }
}
