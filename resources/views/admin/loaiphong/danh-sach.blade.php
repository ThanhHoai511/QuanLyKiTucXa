@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các loại phòng</h3>
    <a href="{{ route('themLoaiPhong') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

    <form class="form-inline active-cyan-4 pull-right">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
        <i class="fa fa-search" aria-hidden="true"></i>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Gía phòng</th>
            <th>Tiền cược tài sản</th>
            <th>Số lượng sinh viên tối đa</th>
            <th>Diện tích</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loaiPhong as $key => $lp)
            @if($key == 1)
                <tr class="success">
            @else
                <tr class="info">
                    @endif
                    <td>{{ $lp->id }}</td>
                    <td>{{ $lp->ten }}</td>
                    <td>{{ number_format($lp->gia_phong) }} vnđ</td>
                    <td>{{ number_format($lp->tien_cuoc_tai_san) }} vnđ</td>
                    <td>{{ $lp->so_luong_sv_toi_da }}</td>
                    <td>{{ $lp->dien_tich }}</td>
                    <td>
                        <a href="{{ route('suaLoaiPhong', [$lp->id]) }}"> <span class="fa fa-edit">Sửa</span> </a> |
                        <a href="{{ route('xoaLoaiPhong', [$lp->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> <span class="fa fa-trash"></span>Xóa </a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
@endsection
