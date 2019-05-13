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
                            <th>Sinh viên</th>
                            <th>Phòng</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th>Nhân viên lập hóa đơn</th>
                            <th>Đã thanh toán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hoaDon as $key => $hd)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $hd->id !!}</td>
                                <td>{!! $hd->hopdong->sinhvien->ho_ten !!}</td>
                                <td>{!! $hd->hopdong->phong->ten !!} - {!! $hd->hopdong->phong->khunha->ten !!}</td>
                                <td>{!! $hd->tong_tien !!}</td>
                                <td>
                                    @if($hd->trang_thai == 0)
                                        Chưa thanh toán
                                    @else
                                        Đã thanh toán
                                    @endif
                                </td>
                                <td>{!! $hd->user->nhanvien->ho_ten !!}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
