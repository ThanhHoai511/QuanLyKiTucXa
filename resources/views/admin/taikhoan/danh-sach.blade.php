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
        </tr>
        </thead>
        <tbody>
        @foreach($taiKhoan as $key => $p)
            <tr class="{{ $key % 2 == 1 ? 'success' : 'info' }}">
                <td>{{ $p->id }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    @if($p->status == 1)
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
