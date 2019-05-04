<?php

namespace App\Http\Controllers\Admin;

use App\Services\SinhVienService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinhVienController extends Controller
{
    protected $sinhVienService;

    public function __construct(SinhVienService $sinhVienService)
    {
        $this->sinhVienService = $sinhVienService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sinhVien = $this->sinhVienService->getAllWithPaginate($request->search);

        return view('admin.sinhvien.danh-sach', ['sinhVien' => $sinhVien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sinhvien.excel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->sinhVienService->store($request);

        return redirect()->route('danhSachSinhVien');
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
        $sinhVienUpdate = $this->sinhVienService->getById($id);

        return view('admin.sinhvien.sua', ['sinhVienUpdate' => $sinhVienUpdate]);
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
        $this->sinhVienService->update($request, $id);

        return redirect()->route('danhSachSinhVien')->with('success', 'Sửa sinh viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sinhVienService->destroy($id);
        return redirect()->back()->with('success', 'Xóa sinh viên thành công!');
    }
}
