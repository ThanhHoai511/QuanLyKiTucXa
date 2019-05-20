<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TinTucRequest;
use App\Services\PhongService;
use App\Services\TinTucService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TinTucController extends Controller
{
    protected $tinTucService;

    protected $phongService;
    public function __construct(TinTucService $tinTucService, PhongService $phongService)
    {
        $this->tinTucService = $tinTucService;
        $this->phongService = $phongService;
    }

    public function index(Request $request)
    {
        $tinTuc = $this->tinTucService->getTinTuc($request->loai, $request->tieu_de);
        return view('admin.tintuc.danh-sach', ['tinTuc' => $tinTuc, 'params' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tintuc.cap-nhat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TinTucRequest $request)
    {
        $this->tinTucService->store($request);

        return redirect()->route('danhSachTinTuc');
    }

    public function handle($id)
    {
        $this->tinTucService->handle("approve", $id);
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
        $tinTucUpdate = $this->tinTucService->getById($id);

        return view('admin.tintuc.cap-nhat', ['tinTucUpdate' => $tinTucUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TinTucRequest $request, $id)
    {
        $this->tinTucService->update($request, $id);

        return redirect()->route('danhSachTinTuc')->with('success', 'Sửa tin thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tinTucService->destroy($id);
        return redirect()->route('danhSachTinTuc')->with('success', 'Xóa tin thành công!');
    }
}
