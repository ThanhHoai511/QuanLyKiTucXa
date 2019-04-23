<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CoSoVatChatRequest;
use App\Services\CoSoVatChatService;
use App\Services\KhuNhaServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoSoVatChatController extends Controller
{
    protected $csvcService;

    public function __construct(CoSoVatChatService $coSoVatChatService)
    {
        $this->csvcService = $coSoVatChatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $csvc = $this->csvcService->getAllWithPaginate($request->ten);

        return view('admin.cosovatchat.danh-sach', ['csvc' => $csvc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cosovatchat.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoSoVatChatRequest $request)
    {
        $this->csvcService->store($request);

        return redirect()->route('danhSachCSVC')->with('success', 'Thêm cơ sở vật chất thành công!');
    }

    public function importExcel()
    {
        return view('admin.cosovatchat.excel');
    }

    public function storeExcel(Request $request)
    {
        $result = $this->csvcService->storeFromExcel($request);
        if ($result) {
            return redirect()->route('danhSachCSVC')->with('success', 'Thêm cơ sở vật chất từ file excel thành công!');
        }
        return redirect()->route('danhSachCSVC')->with('warning', 'Không có cơ sở vật chất nào được thêm mới!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $csvc = $this->csvcService->findByID($id);

        return view('admin.cosovatchat.cap-nhat', ['csvc' => $csvc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoSoVatChatRequest $request, $id)
    {
        $this->csvcService->update($request, $id);

        return redirect()->route('danhSachCSVC')->with('success', 'Sửa cơ sở vật chất thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->csvcService->destroy($id);

        return redirect()->route('danhSachCSVC')->with('success', 'Xóa cơ sở vật chất thành công!');
    }
}
