@extends('user.layouts.app')

@section('content')
    <div class="container col-md-8" style="min-height: 250px; background-color:white;">
        @include('admin.layouts.flash-msg')
        <div class="hop-dong" style="padding-top: 20px;">
            <h5 class="text-center" style="font-size: 25px; padding-bottom: 20px;">Danh sách hợp đồng</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Kì học</th>
                                        <th>Tiền phòng</th>
                                        <th>Tiền cược</th>
                                        <th>Phòng</th>
                                        <th>Yêu cầu hủy hợp đồng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $numberHD = count($hopDong); @endphp
                                    @foreach($hopDong as $key => $hd)
                                        <tr>
                                            <td>Kì {!! $hd->ki_hoc !!} năm {!! $hd->nam_hoc !!}</td>
                                            <td>{!! $hd->tien_phong !!}</td>
                                            <td>{!! $hd->tien_cuoc !!}</td>
                                            <td>{!! $hd->phong->ten !!} {!! $hd->phong->khunha->ten !!}</td>
                                            <td>
                                                @if($hd->trang_thai == 1)
                                                    <form action="{{ route('don-xin-huy') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $hd->id }}" name="ma_hop_dong">
                                                        <button type="submit" class="btn btn-primary">Yêu cầu chấm dứt hợp đồng</button>
                                                    </form>
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
        </div>

        <div class="hoa-don-da-thanh-toan">
            <h5 class="text-center" style="font-size: 25px; padding-bottom: 20px;">Hóa đơn chưa thanh toán</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Loại hóa đơn</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hoaDonPhong as $hdp)
                                        <tr>
                                            <td>Hóa đơn phòng</td>
                                            <td>{!! $hdp->tong_tien !!} đ</td>
                                        </tr>
                                    @endforeach
                                    @foreach($hoaDonDichVu as $hddv)
                                        <tr>
                                            <td>Hóa đơn {!! $hddv->dichvu->ten !!}</td>
                                            @php
                                                $tongTien = $hddv->tong_tien;
                                                $soSV = $hddv->phong->loaiphong->so_sv_hien_tai;
                                                $tien = $tongTien / $soSV;
                                            @endphp
                                            <td>{!! $tien !!} đ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection