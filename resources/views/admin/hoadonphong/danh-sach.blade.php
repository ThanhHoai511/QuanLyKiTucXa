@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các hóa đơn dịch vụ</h3>

    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Mã hợp đồng</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th>Giá</th>
                            <th>Chú thích</th>
                            <th>Phòng</th>
                            <th>Tên dịch vụ</th>
                            <th>Nhân viên lập hóa đơn</th>
                            <th>Đã thanh toán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hoaDon as $key => $hd)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $hd->ngay_bat_dau !!}</td>
                                <td>{!! $hd->ngay_ket_thuc !!}</td>
                                <td>{!! $hd->tinh_trang !!}</td>
                                <td>{!! $hd->gia !!}</td>
                                <td>{!! $hd->chu_thich !!}</td>
                                <td>{!! $hd->ma_phong !!}</td>
                                <td>{!! $hd->ma_dich_vu !!}</td>
                                <td>{!! $nv->nhan_vien_tao !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
