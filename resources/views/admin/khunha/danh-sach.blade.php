@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các khu nhà</h3>
    <a href="{{ route('themKhuNha') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

    @include('admin.layouts.flash-msg')
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
                <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                    <td>{{ $kn->id }}</td>
                    <td>{{ $kn->ten }}</td>
                    <td>{{ $kn->mo_ta }}</td>
                    <td>
                        @if($kn->doi_tuong == 0) Nam
                        @else Nữ
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('suaKhuNha', [$kn->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
