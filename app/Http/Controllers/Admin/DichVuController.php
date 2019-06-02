<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DichVuRequest;
use App\Services\DichVuService;
use App\Services\KhuNhaServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DichVuController extends Controller
{
    protected $dichVuService;

    public function __construct(DichVuService $dichVuService)
    {
        $this->dichVuService = $dichVuService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dichVu = $this->dichVuService->getAll();

        return view('admin.dichvu.danh-sach', ['dichVu' => $dichVu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dichvu.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DichVuRequest $request)
    {
        $this->dichVuService->store($request);

        return redirect()->route('danhSachDichVu')->with('success', 'Thêm dịch vụ thành công!');
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
        $dichVu = $this->dichVuService->findByID($id);

        return view('admin.dichvu.cap-nhat', ['dichVu' => $dichVu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DichVuRequest $request, $id)
    {
        $this->dichVuService->update($request, $id);

        return redirect()->route('danhSachDichVu')->with('success', 'Sửa dịch vụ thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->dichVuService->destroy($id);

        return redirect()->route('danhSachDichVu')->with('success', 'Xóa dịch vụ thành công');
    }
}
