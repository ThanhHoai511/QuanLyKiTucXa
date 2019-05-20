@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các đơn xin nội trú</h3>

    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Mã sinh viên</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Nơi sinh</th>
                            <th>Chứng minh nhân dân</th>
                            <th>Số điện thoại</th>
                            <th>Loại phòng đăng ký</th>
                            <th>Chú thích</th>
                            <th>Hình ảnh</th>
                            <th>Duyệt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donDangKy as $key => $nv)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $nv->ma_sinh_vien !!}</td>
                                <td>{!! $nv->sinh_vien->ho_ten !!}</td>
                                <td>{!! $nv->sinh_vien->email !!}</td>
                                <td>{!! $nv->sinh_vien->gioi_tinh !!}</td>
                                <td>{!! $nv->sinh_vien->ngay_sinh !!}</td>
                                <td>{!! $nv->sinh_vien->noi_sinh !!}</td>
                                <td>{!! $nv->sinh_vien->cmnd !!}</td>
                                <td>{!! $nv->sinh_vien->sdt !!}</td>
                                <td>{!! $nv->loaiphong->ten !!}</td>
                                <td>{!! $nv->chu_thich !!}</td>
                                <td>
                                    <img src="{{ asset('images/sinhvien/' . $nv->anh) }}" alt="" style="width:70px;height:70px;">
                                </td>
                                <td>
                                    @if($nv->tinh_trang == 0)
                                        <a href="{{ route('danhSachPhongChon', $nv->id) }}"><button class="btn btn-primary">Phê duyệt</button></a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn từ chối?')">
                                            <form action="{{ route('tuChoiDonDK', $nv->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" style="margin-top: 3px;">Từ chối</button>
                                            </form>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
