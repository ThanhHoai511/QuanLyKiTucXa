@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các đơn xin nội trú</h3>

    @include('admin.layouts.flash-msg')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
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
                <td>{!! $nv->id !!}</td>
                <td>{!! $nv->ma_sinh_vien !!}</td>
                <td>{!! $nv->ten !!}</td>
                <td>{!! $nv->email !!}</td>
                <td>{!! $nv->gioi_tinh !!}</td>
                <td>{!! $nv->ngay_sinh !!}</td>
                <td>{!! $nv->noi_sinh !!}</td>
                <td>{!! $nv->cmn !!}</td>ối
                <td>{!! $nv->sdt !!}</td>
                <td>{!! $nv->loaiphong->ten !!}</td>
                <td>{!! $nv->chu_thich !!}</td>
                <td>
                    <img src="{{ asset('images/sinhvien/' . $nv->anh) }}" alt="" style="width:70px;height:70px;">
                </td>
                <td>
                    <button>Kiểm tra</button>
                </td>
                <td>
                    <button>Phê duyệt</button>
                    <button>Từ ch</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
