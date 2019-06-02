<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PhongRequest;
use App\Services\HoaDonDichVuService;
use App\Services\HoaDonPhongService;
use App\Services\KhuNhaServices;
use App\Services\LoaiPhongService;
use App\Services\PhongService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class PhongController extends Controller
{
    protected $phongService;
    protected $loaiPhongService;
    protected $khuNhaService;
    protected $hoaDonDichVuService;

    public function __construct(
        PhongService $phongService,
        LoaiPhongService $loaiPhongService,
        KhuNhaServices $khuNhaService,
        HoaDonDichVuService $hoaDonDichVuService
    ) {
        $this->phongService = $phongService;
        $this->loaiPhongService = $loaiPhongService;
        $this->khuNhaService = $khuNhaService;
        $this->hoaDonDichVuService = $hoaDonDichVuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phong = $this->phongService->getAllWithPaginate($request->ten, $request->khu_nha);
        foreach($phong as $p)
        {
            $p->dien_nuoc = $this->hoaDonDichVuService->getHDDienNuoc($p->id);
            $p->mang = $this->hoaDonDichVuService->getHDByLoai($p->id, 3);
//            $p->csvc = $this->hoaDonDichVuService->getHDByLoai($p->id, 3);
        }
        $khuNha = $this->khuNhaService->getAll();
        return view('admin.phong.danh-sach', ['phong' => $phong, 'khuNha' => $khuNha, 'params' => $request]);
    }

    public function inHDDN($idPhong)
    {
        $hd = $this->hoaDonDichVuService->getHDDienNuoc($idPhong);
        $excel = new \PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
        $excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
        $excel->getActiveSheet()->setTitle('Hóa đơn điện nước ' . $hd[0]->phong->ten . ' ' . $hd[0]->phong->khunha->ten);

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
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(14);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

//Tạo tiêu đề cho từng cột
        $excel->getActiveSheet()->setCellValue('B2', 'TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI');
        $excel->getActiveSheet()->setCellValue('B3', 'PHÒNG TÀI CHÍNH - KẾ TOÁN');
        $excel->getActiveSheet()->setCellValue('D5', 'BIÊN LAI THU TIỀN ĐIỆN NƯỚC');
        $excel->getActiveSheet()->setCellValue('E6', 'Ngày ' . date('d', strtotime(now())) . ' tháng ' . date('m', strtotime(now())) . ' năm' . date('Y', strtotime(now())));
        $excel->getActiveSheet()->setCellValue('B8', 'Họ tên người nộp tiền:.........................................................');
        $excel->getActiveSheet()->setCellValue('B9', 'Phòng: ' . $hd[0]->phong->ten);
        $excel->getActiveSheet()->setCellValue('F9', 'Khu: ' . $hd[0]->phong->khunha->ten);
        $excel->getActiveSheet()->setCellValue('B10', 'Nộp tiền điện nước từ ngày. ' . date('d', strtotime($hd[0]->ngay_bat_dau)) . ' đến ngày '.date('d', strtotime($hd[0]->ngay_ket_thuc)) . 'tháng ' . date('m', strtotime($hd[0]->ngay_bat_dau)) . 'năm ' . date('Y', strtotime($hd[0]->ngay_bat_dau)));
        $excel->getActiveSheet()->setCellValue('B12', 'Nội dung');
        $excel->getActiveSheet()->setCellValue('C12', 'Chỉ số đồng hồ');
        $excel->getActiveSheet()->setCellValue('C13', 'Chỉ số cũ');
        $excel->getActiveSheet()->setCellValue('D13', 'Chỉ số mới');
        $excel->getActiveSheet()->setCellValue('E12', 'Số tiêu thụ thực tế');
        $excel->getActiveSheet()->setCellValue('F12', 'Số tiêu thụ cho phép');
        $excel->getActiveSheet()->setCellValue('G12', 'Số vượt định mức');
        $excel->getActiveSheet()->setCellValue('H12', 'Đơn giá');
        $excel->getActiveSheet()->setCellValue('I12', 'Thành tiền');

        $i = 14;
        $tongTien = 0;
        foreach($hd as $hd) {
            $tongTien += $hd->tong_tien;
            $soTieuThu = $hd->chi_so_cuoi - $hd->chi_so_dau;
            $soVuotMuc = $soTieuThu - $hd->so_tieu_thu_cho_phep * $hd->phong->so_luong_sv_hien_tai;
            if($soVuotMuc > 0) {
                if($hd->ma_dich_vu == 1)
                    $excel->getActiveSheet()->setCellValue('B' . $i, 'Điện');
                elseif($hd->ma_dich_vu == 2)
                    $excel->getActiveSheet()->setCellValue('B' . $i, 'Nước');
                $excel->getActiveSheet()->setCellValue('C' . $i, $hd->chi_so_dau);
                $excel->getActiveSheet()->setCellValue('D' . $i, $hd->chi_so_cuoi);
                $excel->getActiveSheet()->setCellValue('E' . $i, $soTieuThu);
                $excel->getActiveSheet()->setCellValue('F' . $i, $hd->so_tieu_thu_cho_phep * $hd->phong->so_luong_sv_hien_tai);
                $soVuotMuc = $soTieuThu - $hd->so_tieu_thu_cho_phep * $hd->phong->so_luong_sv_hien_tai;
                $excel->getActiveSheet()->setCellValue('G' . $i, $soVuotMuc);
                $excel->getActiveSheet()->setCellValue('H' . $i, $hd->gia . ' nghìn đồng');
                $excel->getActiveSheet()->setCellValue('I' . $i, $hd->tong_tien . ' nghìn đồng');
                $i++;
            }
        }
        $excel->getActiveSheet()->mergeCells('B' . $i . ':H' . $i);
        $excel->getActiveSheet()->setCellValue('B' . $i, 'Tổng tiền');
        $excel->getActiveSheet()->setCellValue('I' . $i, $tongTien . ' nghìn đồng');
        $i++;
        $excel->getActiveSheet()->setCellValue('B' . $i, 'Người nộp tiền');
        $excel->getActiveSheet()->setCellValue('E' . $i, 'Người thu tiền');
        $excel->getActiveSheet()->setCellValue('G' . $i, 'Đơn vị quản lý');
        $excel->getActiveSheet()->setCellValue('B' . $i, 'Ký, ghi rõ họ tên');
        $excel->getActiveSheet()->setCellValue('E' . $i, 'Ký, ghi rõ họ tên');
        $excel->getActiveSheet()->setCellValue('G' . $i, 'Ký, ghi rõ họ tên');

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="hoadondiennuoc.xlsx"');
        \PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
        return redirect()->route("danhSachHDDV");
//        $pdf = \PDF::loadView('admin.phong.hddn', compact('hd'));
//        return $pdf->download('hoa-don-dien-nuoc.pdf');
    }

    public function inHDM($idPhong)
    {
        $hd = $this->hoaDonDichVuService->getHDByLoai($idPhong, 3);
        $excel = new \PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
        $excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
        $excel->getActiveSheet()->setTitle('Hóa đơn mạng phòng ' . $hd[0]->phong->ten . ' ' . $hd[0]->phong->khunha->ten);

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
//        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
//        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

//Xét in đậm cho khoảng cột
        $excel->getActiveSheet()->getStyle('D5')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('B12:I12')->getFont()->setBold(true);
        $excel->getActiveSheet()->getStyle('B13:I13')->getFont()->setBold(true);
//        $excel->getActiveSheet()->mergeCells('B12:B13');
//        $excel->getActiveSheet()->mergeCells('E12:E13');
//        $excel->getActiveSheet()->mergeCells('F12:F13');
//        $excel->getActiveSheet()->mergeCells('G12:G13');
//        $excel->getActiveSheet()->mergeCells('H12:H13');
//        $excel->getActiveSheet()->mergeCells('I12:I13');
//        $excel->getActiveSheet()->mergeCells('C12:D12');
//Tạo tiêu đề cho từng cột

        $excel->getActiveSheet()->setCellValue('B2', 'TRƯỜNG ĐẠI HỌC GIAO THÔNG VẬN TẢI');
        $excel->getActiveSheet()->setCellValue('B3', 'PHÒNG TÀI CHÍNH - KẾ TOÁN');
        $excel->getActiveSheet()->setCellValue('D5', 'BIÊN LAI THU TIỀN PHÒNG');
        $excel->getActiveSheet()->setCellValue('E6', 'Ngày ' . date('d', strtotime(now())) . ' tháng ' . date('m', strtotime(now())) . ' năm' . date('Y', strtotime(now())));
        $excel->getActiveSheet()->setCellValue('B8', 'Họ tên người nộp tiền:.........................................................');
        $excel->getActiveSheet()->setCellValue('B9', 'Phòng: ' . $hd[0]->phong->ten);
        $excel->getActiveSheet()->setCellValue('F9', 'Khu: ' . $hd[0]->phong->khunha->ten);
        $excel->getActiveSheet()->setCellValue('B10', 'Lý do nộp : Thanh toán tiền mạng tháng ' . ' tháng ' . date('m', strtotime($hd[0]->ngay_bat_dau)).' năm ' . date('Y', strtotime($hd[0]->ngay_bat_dau)));
        $excel->getActiveSheet()->setCellValue('B13', 'Số tiền:  ' . $hd[0]->tong_tien . ' (Viết bằng chữ).............................');
        $excel->getActiveSheet()->setCellValue('B14', '..............................................................................');
        $excel->getActiveSheet()->setCellValue('B18', 'Người nộp tiền');
        $excel->getActiveSheet()->setCellValue('E18', 'Người thu tiền');
        $excel->getActiveSheet()->setCellValue('G18', 'Đơn vị quản lý');
        $excel->getActiveSheet()->setCellValue('B19', 'Ký, ghi rõ họ tên');
        $excel->getActiveSheet()->setCellValue('E19', 'Ký, ghi rõ họ tên');
        $excel->getActiveSheet()->setCellValue('G19', 'Ký, ghi rõ họ tên');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="hoadonmang.xlsx"');
        \PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
        return redirect()->route("danhSachHDDV");
//        $pdf = \PDF::loadView('admin.phong.hdm', compact('hd'));
//        return $pdf->download('hoa-don-mang.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiPhong = $this->loaiPhongService->getAll();
        $khuNha = $this->khuNhaService->getAll();

        return view('admin.phong.cap-nhat', ['loaiPhong' => $loaiPhong, 'khuNha' => $khuNha]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhongRequest $request)
    {
        $this->phongService->createPhong($request);

        return redirect()->route('danhSachPhong')->with('success', 'Thêm phòng thành công!');
    }

    public function importExcel()
    {
        $khuNha = $this->khuNhaService->getAll();
        $loaiPhong = $this->loaiPhongService->getAll();
        return view('admin.phong.excel', ['khuNha' => $khuNha, 'loaiPhong' => $loaiPhong]);
    }

    public function storeExcel(Request $request)
    {
        $result = $this->phongService->storeFromExcel($request);
        if ($result) {
            return redirect()->route('danhSachPhong')->with('success', 'Thêm phòng từ file excel thành công!' . $result["loi"] . ' bản ghi thất bại, '. $result["thanh-cong"] . ' bản ghi thành công!');
        }
        return redirect()->route('danhSachPhong')->with('warning', 'Thêm phòng từ file excel không thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiPhong = $this->loaiPhongService->getAll();
        $khuNha = $this->khuNhaService->getAll();
        $phongUpdate = $this->phongService->getById($id);

        return view('admin.phong.cap-nhat', ['loaiPhong' => $loaiPhong, 'khuNha' => $khuNha, 'phongUpdate' => $phongUpdate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhongRequest $request, $id)
    {
        $this->phongService->update($request, $id);

        return redirect()->route('danhSachPhong')->with('success', 'Sửa phòng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->phongService->destroy($id);

        return redirect()->route('danhSachPhong')->with('success', 'Xóa phòng thành công!');
    }
}
