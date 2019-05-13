<?php

namespace App\Http\Controllers\Admin;

use App\Services\HoaDonPhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoaDonPhongController extends Controller
{
    protected $hoaDonPhongService;

    public function __construct(HoaDonPhongService $hoaDonPhongService)
    {
        $this->hoaDonPhongService = $hoaDonPhongService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoaDonPhong = $this->hoaDonPhongService->getAllWithPaginate();
        return view('admin.hoadonphong.danh-sach', ['hoaDon' => $hoaDonPhong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
