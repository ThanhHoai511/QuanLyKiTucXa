<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SuaKhuNhaRequest;
use App\Http\Requests\ThemKhuNhaRequest;
use App\Services\KhuNhaServices;
use App\Http\Controllers\Controller;

class KhuNhaController extends Controller
{
    protected $khuNhaService;
    public function __construct(KhuNhaServices $khuNhaService)
    {
        $this->khuNhaService = $khuNhaService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khuNha = $this->khuNhaService->getAll();

        return view('admin.khunha.danh-sach', ['khuNha' => $khuNha]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khunha.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemKhuNhaRequest $request)
    {
        $this->khuNhaService->store($request);

        return redirect()->route('danhSachKhuNha')->with('success', 'Thêm khu nhà thành công!');
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
        $khuNhaUpdate = $this->khuNhaService->findByID($id);

        return view('admin.khunha.cap-nhat', ['khuNhaUpdate' => $khuNhaUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuaKhuNhaRequest $request, $id)
    {
        $this->khuNhaService->update($request, $id);

        return redirect()->route('danhSachKhuNha')->with('success', 'Sửa khu nhà thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->khuNhaService->destroy($id);
        return redirect()->route('danhSachKhuNha')->with('success', 'Xóa khu nhà thành công!');
    }
}
