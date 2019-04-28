@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách sinh viên</h3>
    <a href="{{ route('themCSVCExcel') }}"><button class="btn btn-google" style="margin-bottom: 20px;">Thêm từ file</button></a>
    <form class="form-inline active-cyan-4 pull-right" action="{{ route('danhSachSinhVien') }}" method="get">
        <input class="form-control form-control-sm mr-3 w-75" name="search" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    @include('admin.layouts.flash-msg')
    <table class="table col-md-12">
        <thead>
        <tr>
            <th>ID</th>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Nơi sinh</th>
            <th>Lớp</th>
            <th>Khóa</th>
            <th>Dân tộc</th>
            <th>CMND</th>
            <th>Số điện thoại</th>
            <th>Sdt bố</th>
            <th>Sdt mẹ</th>
            <th>Tỉnh</th>
            <th>Huyện</th>
            <th>Xã</th>
            <th>Email</th>
            <th>Đối tượng</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sinhVien as $key => $sv)
            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                <td>{!! $sv->id !!}</td>
                <td>{!! $sv->ma_sinh_vien !!}</td>
                <td>{!! $sv->ho_ten !!}</td>
                <td>{!! $sv->ngay_sinh !!}</td>
                <td>{!! $sv->noi_sinh !!}</td>
                <td>{!! $sv->lop !!}</td>
                <td>{!! $sv->khoa !!}</td>
                <td>{!! $sv->dan_toc !!}</td>
                <td>{!! $sv->cmnd !!}</td>
                <td>{!! $sv->sdt !!}</td>
                <td>{!! $sv->sdt_bo !!}</td>
                <td>{!! $sv->sdt_me !!}</td>
                <td>{!! $sv->tinh !!}</td>
                <td>{!! $sv->huyen !!}</td>
                <td>{!! $sv->xa !!}</td>
                <td>{!! $sv->email !!}</td>
                <td>{!! $sv->doi_tuong !!}</td>
                <td>
                    <a href="{{ route('suaSinhVien', [$sv->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
