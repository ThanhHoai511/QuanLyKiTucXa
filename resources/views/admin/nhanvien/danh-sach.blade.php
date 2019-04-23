@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các loại phòng</h3>
    <a href="{{ route('themNhanVien') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

    @include('admin.layouts.flash-msg')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Chức vụ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
        </tr>
        </thead>
        <tbody>
        @foreach($nhanVien as $key => $nv)
            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                <td>{!! $nv->id !!}</td>
                <td>{!! $nv->ho_ten !!}</td>
                <td>{!! $nv->chuc_vu !!}</td>
                <td>{!! $nv->email !!}</td>
                <td>{!! $nv->sdt !!}</td>
                <td>{!! $nv->mo_ta !!}</td>
                <td>{!! $nv->hinh_anh !!}</td>
                <td>
                    <a href="{{ route('suaNhanVien', [$nv->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
