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
                            <th>Khu nha</th>
                            <th>Phong</th>
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
                                    <a><button class="btn btn-default">Kiểm tra</button></a>
                                </td>
                                <td>
                                    @if($don->trang_thai != 1)
                                        <a href=""><button class="btn btn-primary">Phê duyệt</button></a>
                                        <button class="btn btn-danger" style="margin-top: 3px;">Gửi mail nhắc nhở</button>
                                    @endif
                                </td>
                            </tr>
                            {{--<div id="detail_review{{ $nv->ma_sinh_vien }}" class="modal" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">--}}
                                {{--<div class="modal-dialog" role="document" id="test">--}}
                                    {{--@php $sv = $nv->sinh_vien; @endphp--}}
                                    {{--@if ($sv == null)--}}
                                        {{--<div class="modal-content">--}}
                                            {{--<div class="modal-header">--}}
                                                {{--<h5 class="modal-title">Không tìm thấy sinh viên này</h5>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@else--}}
                                        {{--<div class="modal-content">--}}
                                            {{--<div class="modal-header">--}}
                                                {{--<h5 class="modal-title">Chi tiết sinh viên</h5>--}}
                                            {{--</div>--}}
                                            {{--<div class="modal-body">--}}
                                                {{--<p>Họ và tên: {!! $sv->ho_ten !!}</p>--}}
                                                {{--<p>Ngày sinh: {!! $sv->ngay_sinh !!}</p>--}}
                                                {{--<p>Nơi sinh: {!! $sv->noi_sinh !!}</p>--}}
                                                {{--<p>Lớp: {!! $sv->lop !!}</p>--}}
                                                {{--<p>Khóa: {!! $sv->khoa !!}</p>--}}
                                                {{--<p>Cmnd: {!! $sv->cmnd !!}</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="modal-footer">--}}
                                                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
