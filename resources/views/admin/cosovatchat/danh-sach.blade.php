@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách cơ sở vật chất</h3>
    <a href="{{ route('themCSVC') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

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
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($csvc as $key => $csvc)
                <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                    <td>{{ $csvc->id }}</td>
                    <td>{{ $csvc->ten }}</td>
                    <td>{{ number_format($csvc->gia) }}</td>
                    <td>
                        <a href="{{ route('suaCSVC', [$csvc->id]) }}"> <span class="fa fa-edit">Sửa</span> </a> |
                        <a href="{{ route('xoaCSVC', [$csvc->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> <span class="fa fa-trash"></span>Xóa </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
