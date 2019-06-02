@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các hóa đơn dịch vụ chưa thanh toán tính đến thời điểm hiện tại</h3>
    <p>Kết quả: {{ count($hoaDon) }} hóa đơn.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Khu nhà</th>
                            <th>Phòng</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Đơn giá</th>
                            <th>Chỉ số đầu</th>
                            <th>Chỉ số cuối</th>
                            <th>Tên dịch vụ</th>
                            <th>Tổng tiền</th>
                            <th>Nhân viên lập hóa đơn</th>
                            <th>Chú thích</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hoaDon as $key => $hd)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $hd->phong->khunha->ten !!}</td>
                                <td>{!! $hd->phong->ten !!}</td>
                                <td>{{ date("d/m/Y", strtotime($hd->ngay_bat_dau)) }}</td>
                                <td>{{ date("d/m/Y", strtotime($hd->ngay_ket_thuc)) }}</td>
                                <td>{!! $hd->gia !!} đ</td>
                                <td>{!! $hd->chi_so_dau !!}</td>
                                <td>{!! $hd->chi_so_cuoi !!}</td>
                                <td>{!! $hd->dichvu->ten !!}</td>
                                <td>{!! $hd->tong_tien !!} đ</td>
                                <td>{!! $hd->user->nhanvien['ho_ten'] !!}</td>
                                <td>{!! $hd->chu_thich !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
