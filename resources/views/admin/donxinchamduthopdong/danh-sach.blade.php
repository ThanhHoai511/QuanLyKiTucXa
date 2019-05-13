@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các đơn xin chấm dứt hợp đồng</h3>

    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Mã sinh viên</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Chứng minh nhân dân</th>
                            <th>Số điện thoại</th>
                            <th>Khu nhà</th>
                            <th>Phòng</th>
                            <th>Kiểm tra</th>
                            <th>Duyệt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donXinHuy as $key => $don)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $don->sinhvien->ma_sinh_vien !!}</td>
                                <td>{!! $don->sinhvien->ho_ten !!}</td>
                                <td>{!! $don->sinhvien->email !!}</td>
                                <td>
                                    @if($don->sinhvien->gioi_tinh == 1)
                                        Nữ
                                    @else
                                        Nam
                                    @endif
                                </td>
                                <td>{!! $don->sinhvien->ngay_sinh !!}</td>
                                <td>{!! $don->sinhvien->cmnd !!}</td>
                                <td>{!! $don->sinhvien->sdt !!}</td>
                                <td>{!! $don->phong->khunha->ten !!}</td>
                                <td>{!! $don->phong->ten !!}</td>
                                <td>
                                    <a data-target="#thanh_toan_{{ $don->id }}" data-toggle="modal"><button class="btn btn-default">Kiểm tra</button></a>
                                </td>
                                <td>
                                    @if($don->trang_thai != 1)
                                        <a href=""><button class="btn btn-primary">Phê duyệt</button></a>
                                        <button class="btn btn-danger" style="margin-top: 3px;">Gửi mail nhắc nhở</button>
                                    @endif
                                </td>
                            </tr>
                            <div id="thanh_toan_{{ $don->id }}" class="modal" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" id="test">
                                    @php
                                        $tien = $don->tong_tien;
                                        $tienPhong = $don->tien_phong;
                                        $tienDV = $don->tien_dich_vu;
                                    @endphp
                                    @if ($tien == 0)
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Sinh viên không còn nợ khoản chi phí nào!</h5>
                                            </div>
                                        </div>
                                    @else
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Sinh viên chưa thanh toán hết chi phí:</h5>
                                            </div>
                                            <div class="modal-body">
                                                @if ($tienPhong != 0)
                                                    <p>Tiền phòng: {!! $tienPhong !!}</p>
                                                @endif
                                                @if ($tienDV != 0)
                                                    <p>Tiền dịch vụ: {!! $tienDV !!}</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
