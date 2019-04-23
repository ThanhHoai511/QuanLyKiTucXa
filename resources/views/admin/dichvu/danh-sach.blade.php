@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các dịch vụ</h3>
    <a href="{{ route('themDichVu') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

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
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dichVu as $key => $dv)
                <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                    <td>{{ $dv->id }}</td>
                    <td>{{ $dv->ten }}</td>
                    <td>{{ $dv->mo_ta }}</td>
                    <td>{{ number_format($dv->gia) }}</td>
                    <td>
                        <a href="{{ route('suaDichVu', [$dv->id]) }}"> <span class="fa fa-edit">Sửa</span> </a> |
                        <a href="{{ route('xoaDichVu', [$dv->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> <span class="fa fa-trash"></span>Xóa </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
