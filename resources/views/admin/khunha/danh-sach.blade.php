@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các khu nhà</h3>
    <a href="{{ route('themKhuNha') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

    <form class="form-inline active-cyan-4 pull-right">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
        <i class="fa fa-search" aria-hidden="true"></i>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Dành cho đối tượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khuNha as $key => $kn)
                @if($key == 1)
                    <tr class="success">
                @else
                    <tr class="info">
                @endif
                        <td>{{ $kn->id }}</td>
                        <td>{{ $kn->ten }}</td>
                        <td>{{ $kn->mo_ta }}</td>
                        <td>
                            @if($kn->doi_tuong == 1) Nam
                            @else Nữ
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('suaKhuNha', [$kn->id]) }}"> <span class="fa fa-edit">Sửa</span> </a> |
                            <a href="{{ route('xoaKhuNha', [$kn->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> <span class="fa fa-trash"></span>Xóa </a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection
