@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các tài khoản</h3>
    @include('admin.layouts.flash-msg')

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Chức vụ</th>
            <th>Tình trạng</th>
            <th>Vô hiệu hóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($taiKhoan as $key => $p)
            <tr class="{{ $key % 2 == 1 ? 'success' : 'info' }}">
                <td>{{ $p->id }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    @if(isset($p->role_id))
                        {{$p->chucvu->name}}
                    @endif
                </td>
                <td id="trang_thai_{{ $p->id }}">
                    @if($p->status == 1)
                        Hoạt động
                    @else
                        Bị vô hiệu hóa
                    @endif
                </td>
                <td data-taikhoan-id="{{ $p->id }}">
                    <form>
                        {{ csrf_field() }}
                        <button style="@if($p->status == 0) display: none @endif" class="btn btn-danger vo_hieu_hoa" id="btn_vo_hieu_hoa{{ $p->id }}" name="id">Vô hiệu hóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $('#khu_nha select').change(function() {
            document.getElementById('form').submit();
        });
        $(".vo_hieu_hoa").click(function(e) {
            e.preventDefault();
            if(confirm('Xác nhận vô hiệu hóa?') == true) {
                var id = $(this).closest('td').attr('data-taikhoan-id');
                $.ajax({
                    type: 'PUT',
                    url: '/api/v1/tai-khoan/vo-hieu-hoa',
                    data: {
                        id: id
                    },
                    success: function()
                    {
                        $("#trang_thai_" + id).text('Bị vô hiệu hóa');
                        $("#btn_vo_hieu_hoa" + id).hide();
                    }
                });
            }
            else {
                return false;
            }
        });
    </script>
@endsection
