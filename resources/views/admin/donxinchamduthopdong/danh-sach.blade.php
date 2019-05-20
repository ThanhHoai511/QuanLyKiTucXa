@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các đơn xin chấm dứt hợp đồng</h3>

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
                            <th>Chứng minh nhân dân</th>
                            <th>Số điện thoại</th>
                            <th>Phòng</th>
                            <th>Kiểm tra</th>
                            <th>Duyệt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($donXinHuy as $key => $don)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $don->hopdong->sinhvien->ma_sinh_vien !!}</td>
                                <td>{!! $don->hopdong->sinhvien->ho_ten !!}</td>
                                <td>{!! $don->hopdong->sinhvien->email !!}</td>
                                <td>{!! $don->hopdong->sinhvien->gioi_tinh !!}</td>
                                <td>{!! $don->hopdong->sinhvien->ngay_sinh !!}</td>
                                <td>{!! $don->hopdong->sinhvien->cmnd !!}</td>
                                <td>{!! $don->hopdong->sinhvien->sdt !!}</td>
                                <td>{!! $don->hopdong->phong->ten !!} {!! $don->hopdong->phong->khunha->ten !!}</td>
                                <td>
                                    @php
                                        $countHDP = count($don['hoa_don_phong']);
                                        $countHDDV = count($don['hoa_don_dich_vu']);
                                    @endphp
                                    @if($countHDP == 0 && $countHDDV == 0)
                                        Đã thanh toán toàn bộ chi phí
                                    @else
                                        Còn nợ chi phí
                                    @endif
                                </td>
                                <td>
                                    @if($don->trang_thai != 1)
                                        <a onclick="return confirm('Bạn có chắc chắn muốn phê duyệt?')">
                                            <form action="{{ route('chapNhanDon', $don->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">Phê duyệt</button>
                                            </form>
                                        </a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn gửi email nhắc nhở?')">
                                            <form action="{{ route('nhacNhoSV', $don->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger" style="margin-top: 3px;">Gửi mail nhắc nhở</button>
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
