@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các đơn xin nội trú</h3>

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
                            <th>Nơi sinh</th>
                            <th>Chứng minh nhân dân</th>
                            <th>Số điện thoại</th>
                            <th>Loại phòng đăng ký</th>
                            <th>Chú thích</th>
                            <th>Hình ảnh</th>
                            <th>Kiểm tra</th>
                            <th>Duyệt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donDangKy as $key => $nv)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $nv->ma_sinh_vien !!}</td>
                                <td>{!! $nv->ten !!}</td>
                                <td>{!! $nv->email !!}</td>
                                <td>
                                    @if($nv->gioi_tinh == 1)
                                        Nữ
                                    @else
                                        Nam
                                    @endif
                                </td>
                                <td>{!! $nv->ngay_sinh !!}</td>
                                <td>{!! $nv->noi_sinh !!}</td>
                                <td>{!! $nv->cmnd !!}</td>
                                <td>{!! $nv->sdt !!}</td>
                                <td>{!! $nv->loaiphong->ten !!}</td>
                                <td>{!! $nv->chu_thich !!}</td>
                                <td>
                                    <img src="{{ asset('images/sinhvien/' . $nv->anh) }}" alt="" style="width:70px;height:70px;">
                                </td>
                                <td>
                                    <a href="#detail_review{{ $nv->ma_sinh_vien }}" data-toggle="modal"><button class="btn btn-default">Kiểm tra</button></a>
                                </td>
                                <td>
                                    @if($nv->tinh_trang == 0)
                                        <a href="{{ route('danhSachPhongChon', $nv->id) }}"><button class="btn btn-primary">Phê duyệt</button></a>
                                        <button class="btn btn-danger" style="margin-top: 3px;">Từ chối</button>
                                    @endif
                                </td>
                            </tr>
                            <div id="detail_review{{ $nv->ma_sinh_vien }}" class="modal" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" id="test">
                                    @php $sv = $nv->sinh_vien; @endphp
                                    @if ($sv == null)
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Không tìm thấy sinh viên này</h5>
                                            </div>
                                        </div>
                                    @else
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Chi tiết sinh viên</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Họ và tên: {!! $sv->ho_ten !!}</p>
                                                <p>Ngày sinh: {!! $sv->ngay_sinh !!}</p>
                                                <p>Nơi sinh: {!! $sv->noi_sinh !!}</p>
                                                <p>Lớp: {!! $sv->lop !!}</p>
                                                <p>Khóa: {!! $sv->khoa !!}</p>
                                                <p>Cmnd: {!! $sv->cmnd !!}</p>
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
