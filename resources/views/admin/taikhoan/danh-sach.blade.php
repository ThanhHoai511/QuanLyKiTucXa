@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phòng</h3>
    @include('admin.layouts.flash-msg')

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
<<<<<<< HEAD
            <th>Mật khẩu</th>
            <th>Tên nhân viên</th>
            <th>Tình trạng</th>
            <th>Hành động</th>
=======
            <th>Tên nhân viên</th>
            <th>Tình trạng</th>
>>>>>>> 22ea7168de7a5fd7a6fb74e677e498ce01bd9f9b
        </tr>
        </thead>
        <tbody>
        @foreach($taiKhoan as $key => $p)
            <tr class="{{ $key % 2 == 1 ? 'success' : 'info' }}">
                <td>{{ $p->id }}</td>
                <td>{{ $p->ten_dang_nhap }}</td>
<<<<<<< HEAD
                <td>{{ $p->mat_khau }}</td>
                <td>{{ $p->tinh_trang }}</td>
                <td>{{ $p->nhanvien->ho_ten }}</td>
                <td>
                    <a href="{{ route('suaPhong', [$p->id]) }}"><button class="btn btn-primary">Sửa</button></a>
=======
                <td>{{ $p->nhanvien->ho_ten }}</td>
                <td>
                    @if($p->tinh_trang == 1)
                        Hoạt động
                    @else
                        Bị khóa
                    @endif
>>>>>>> 22ea7168de7a5fd7a6fb74e677e498ce01bd9f9b
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
