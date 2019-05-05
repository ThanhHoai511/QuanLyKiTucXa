<?php

namespace App\Http\Controllers\Admin;

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
    public function store(Request $request)
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
