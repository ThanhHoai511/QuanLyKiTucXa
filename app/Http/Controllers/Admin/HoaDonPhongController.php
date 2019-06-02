<?php

namespace App\Http\Controllers\Admin;

use App\Services\HoaDonPhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Pdf;
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

    public function inHDP($id)
    {
          $hd = $this->hoaDonPhongService->getById($id);
        $excel = new \PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
        $excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
        $excel->getActiveSheet()->setTitle('Hóa đơn phòng ' . $hd->hopdong->phong->ten . ' ' . $hd->hopdong->phong->khunha->ten);

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
//        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
//        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

//Xét in đậm cho khoảng cột
        $excel->getActiveSheet()->getStyle('D5')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('B12:I12')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('B13:I13')->getFont()->setBold(true);
        $excel->getActiveSheet()->mergeCells('B12:B13');
        $excel->getActiveSheet()->mergeCells('E12:E13');
        $excel->getActiveSheet()->mergeCells('F12:F13');
        $excel->getActiveSheet()->mergeCells('G12:G13');
        $excel->getActiveSheet()->mergeCells('H12:H13');
        $excel->getActiveSheet()->mergeCells('I12:I13');
        $excel->getActiveSheet()->mergeCells('C12:D12');
//Tạo tiêu đề cho từng cột

        $excel->getActiveSheet()->setCellValue('B2', 'TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI');
        $excel->getActiveSheet()->setCellValue('B3', 'PHÒNG TÀI CHÍNH - KẾ TOÁN');
        $excel->getActiveSheet()->setCellValue('D5', 'BIÊN LAI THU TIỀN PHÒNG');
        $excel->getActiveSheet()->setCellValue('E6', 'Ngày ' . date('d', strtotime(now())) . ' tháng ' . date('m', strtotime(now())) . ' năm' . date('Y', strtotime(now())));
        $excel->getActiveSheet()->setCellValue('B8', 'Họ tên người nộp tiền:.........................................................');
        $excel->getActiveSheet()->setCellValue('B9', 'Phòng: ' . $hd->hopdong->phong->ten);
        $excel->getActiveSheet()->setCellValue('F9', 'Khu: ' . $hd->hopdong->phong->khunha->ten);
        $excel->getActiveSheet()->setCellValue('B10', 'Lý do nộp : Thanh toán tiền phòng kì ' . $hd->hopdong->ki_hoc . ' năm học ' . $hd->hopdong->nam_hoc);
        $excel->getActiveSheet()->setCellValue('B11', 'Tiền phòng: ' . $hd->hopdong->tien_phong);
        $excel->getActiveSheet()->setCellValue('B12', 'Tiền cược tài sản: ' . $hd->hopdong->tien_cuoc);
        $excel->getActiveSheet()->setCellValue('B13', 'Tổng tiền:  ' . $hd->tong_tien . ' (Viết bằng chữ).............................');
        $excel->getActiveSheet()->setCellValue('B14', '..............................................................................');
        $excel->getActiveSheet()->setCellValue('B18', 'Người nộp tiền');
        $excel->getActiveSheet()->setCellValue('E18', 'Người thu tiền');
        $excel->getActiveSheet()->setCellValue('G18', 'Đơn vị quản lý');
        $excel->getActiveSheet()->setCellValue('B19', 'Ký, ghi rõ họ tên');
        $excel->getActiveSheet()->setCellValue('E19', 'Ký, ghi rõ họ tên');
        $excel->getActiveSheet()->setCellValue('G19', 'Ký, ghi rõ họ tên');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="hoadondiennuoc.xlsx"');
        \PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
        return redirect()->route("danhSachHDDV");
//            $pdf = \PDF::loadView('admin.hoadonphong.pdf', compact('hd'));
//            return $pdf->download('hoa-don-phong.pdf');
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
