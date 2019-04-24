@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các dịch vụ</h3>
    <a href="{{ route('themDichVu') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

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
                        <a href="{{ route('suaDichVu', [$dv->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
