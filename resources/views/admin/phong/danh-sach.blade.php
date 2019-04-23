@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phòng</h3>
    <a href="{{ route('themPhong') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

    <form class="form-inline active-cyan-4 pull-right">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
        <i class="fa fa-search" aria-hidden="true"></i>
    </form>
    @include('admin.layouts.flash-msg')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Số lượng sinh viên hiện tại</th>
            <th>Khu nhà</th>
            <th>Loại phòng</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach($phong as $key => $p)
                <tr class="{{ $key % 2 == 1 ? 'success' : 'info' }}">
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->ten }}</td>
                    <td>{{ $p->so_luong_sv_hien_tai }}</td>
                    <td>{{ $p->khunha->ten }}</td>
                    <td>{{ $p->loaiphong->ten }}</td>
                    <td>
                        <a href="{{ route('suaPhong', [$p->id]) }}"> <span class="fa fa-edit">Sửa</span> </a> |
                        <a href="{{ route('xoaPhong', [$p->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> <span class="fa fa-trash"></span>Xóa </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
