@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các tài khoản</h3>
    @include('admin.layouts.flash-msg')

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Tình trạng</th>
            <th>Tên nhân viên</th>
            <th>Hành động</th>
            <th>Tình trạng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($taiKhoan as $key => $p)
            <tr class="{{ $key % 2 == 1 ? 'success' : 'info' }}">
                <td>{{ $p->id }}</td>
                <td>{{ $p->ten_dang_nhap }}</td>
                <td>{{ $p->tinh_trang }}</td>
                <td>{{ $p->nhanvien->ho_ten }}</td>
                <td>{{ $p->tinh_trang }}</td>
                <td>
                    <a href="{{ route('suaPhong', [$p->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                <td>
                    @if($p->tinh_trang == 1)
                        Hoạt động
                    @else
                        Bị khóa
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $('#khu_nha select').change(function() {
            document.getElementById('form').submit();
        });
    </script>
@endsection
