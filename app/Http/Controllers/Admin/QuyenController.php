<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuyenRequest;
use App\Services\ChucVuService;
use App\Services\QuyenChucVuService;
use App\Services\QuyenService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QuyenController extends Controller
{
    protected $quyenService;
    protected $chucVuService;
    protected $quyenChucVuService;

    public function __construct(QuyenService $quyenService, ChucVuService $chucVuService, QuyenChucVuService $quyenChucVuService)
    {
        $this->quyenService = $quyenService;
        $this->chucVuService = $chucVuService;
        $this->quyenChucVuService = $quyenChucVuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quyen = $this->quyenService->getAll();
        return view('admin.quyen.danh-sach', ['quyen' => $quyen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chucVu = $this->chucVuService->getAll();

        return view('admin.quyen.cap-nhat', ['chucVu' => $chucVu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuyenRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $quyen = $this->quyenService->store($request);
            $params = [
                'ma_chuc_vu' => $request->chuc_vu,
                'ma_quyen' => $quyen->id
            ];
            $this->quyenChucVuService->store($params);

            return redirect()->route('danhSachQuyen')->with('success', 'Thêm quyền thành công!');
        });
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
        $quyenUpdate = $this->quyenService->getById($id);

        return view('admin.quyen.cap-nhat', ['quyenUpdate' => $quyenUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuyenRequest $request, $id)
    {
        $this->quyenService->update($request, $id);
        return redirect()->route('danhSachQuyen')->with('success', 'Sửa quyền thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->quyenService->destroy($id);
        return redirect()->route('danhSachQuyen')->with('success', 'Xóa quyền thành công!');
    }
}
