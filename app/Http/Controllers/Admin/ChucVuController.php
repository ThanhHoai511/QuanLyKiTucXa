<?php

namespace App\Http\Controllers\Admin;

use App\Services\ChucVuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChucVuController extends Controller
{
    protected $chucVuService;

    public function __construct(ChucVuService $chucVuService)
    {
        $this->chucVuService = $chucVuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chucVu = $this->chucVuService->getAll();

        return view('admin.chucvu.danh-sach', ['chucVu' => $chucVu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chucvu.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->chucVuService->store($request);
        return redirect()->route('danhSachChucVu')->with('success', 'Thêm chức vụ thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chucVu = $this->chucVuService->getById($id);
        return view('admin.chucvu.cap-nhat', ['chucVuUpdate' => $chucVu]);
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
        $this->chucVuService->update($request, $id);

        return redirect()->route('danhSachChucVu')->with('success', 'Sửa chức vụ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->chucVuService->destroy($id);

        return redirect()->route('danhSachChucVu')->with('success', 'Xóa chức vụ thành công!');
    }
}
