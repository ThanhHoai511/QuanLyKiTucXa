@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các hợp đồng</h3>
    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Kì học</th>
                                <th>Năm học</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Tiền phòng</th>
                                <th>Tiền cược</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hopDong as $hd)
                                <tr>
                                    <td>{{ $hd->id }}</td>
                                    <td>{{ $hd->ma_sv_utc }}</td>
                                    <td>{{ $hd->sinhvien->ho_ten }}</td>
                                    <td>{{ $hd->ki_hoc }}</td>
                                    <td>{{ $hd->nam_hoc }}</td>
                                    <td>{{ $hd->ngay_bat_dau }}</td>
                                    <td>{{ $hd->ngay_ket_thuc }}</td>
                                    <td>{{ $hd->tien_phong }}</td>
                                    <td>{{ $hd->tien_cuoc }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $hopDong->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
