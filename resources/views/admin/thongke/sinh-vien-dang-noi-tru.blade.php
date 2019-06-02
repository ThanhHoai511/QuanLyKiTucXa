@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách sinh viên đang nội trú tại kí túc xá</h3>
    <p>Kết quả: {{ count($sinhVien) }} sinh viên</p>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover col-md-12">
                        <thead>
                        <tr>
                            <th>Mã sinh viên</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Nơi sinh</th>
                            <th>Giới tính</th>
                            <th>Lớp</th>
                            <th>Dân tộc</th>
                            <th>CMND</th>
                            <th>Số điện thoại</th>
                            <th>Sdt bố</th>
                            <th>Sdt mẹ</th>
                            <th>Email</th>
                            <th>Đối tượng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sinhVien as $key => $sv)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $sv->sinhvien->ma_sinh_vien !!}</td>
                                <td>{!! $sv->sinhvien->ho_ten !!}</td>
                                <td>{{ date("d/m/Y", strtotime($sv->sinhvien->ngay_sinh)) }}</td>
                                <td>{!! $sv->sinhvien->tinh !!}</td>
                                <td>{!! $sv->sinhvien->gioi_tinh !!}</td>
                                <td>{!! $sv->sinhvien->lop !!} - Khóa {!! $sv->sinhvien->khoa !!}</td>
                                <td>{!! $sv->sinhvien->dan_toc !!}</td>
                                <td>{!! $sv->sinhvien->cmnd !!}</td>
                                <td>{!! $sv->sinhvien->sdt !!}</td>
                                <td>{!! $sv->sinhvien->sdt_bo !!}</td>
                                <td>{!! $sv->sinhvien->sdt_me !!}</td>
                                <td>{!! $sv->sinhvien->email !!}</td>
                                <td>{!! $sv->sinhvien->doi_tuong !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
