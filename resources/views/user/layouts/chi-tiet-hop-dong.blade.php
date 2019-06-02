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
                                    @foreach($hopDong as $key => $hd)
                                        <tr>
                                            <td>Kì {!! $hd->ki_hoc !!} năm {!! $hd->nam_hoc !!}</td>
                                            <td>{!! $hd->tien_phong !!}</td>
                                            <td>{!! $hd->tien_cuoc !!}</td>
                                            <td>{!! $hd->phong->ten !!} {!! $hd->phong->khunha->ten !!}</td>
                                            <td data-ma-hop-dong="{!! $hd->id !!}">
                                                @if($hd->trang_thai == 1)
                                                    <button class="btn select-day">Gửi đơn xin hủy</button>
{{--                                                    <form action="{{ route('don-xin-huy') }}" method="POST">--}}
{{--                                                        {{ csrf_field() }}--}}
{{--                                                        <input type="hidden" value="{{ $hd->id }}" name="ma_hop_dong">--}}
{{--                                                        <button type="submit" class="btn btn-primary">Yêu cầu chấm dứt hợp đồng</button>--}}
{{--                                                    </form>--}}
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
                                        <th>Từ ngày đến ngày</th>
                                        <th>Đơn giá</th>
                                        <th>Chỉ số đầu</th>
                                        <th>Chỉ số cuối</th>
                                        <th>Hạn mức cho phép</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hoaDonPhong as $hdp)
                                        <tr>
                                            <td>Hóa đơn phòng</td>
                                            <td>{!! date('d/m/Y', strtotime($hdp->hopdong->ngay_bat_dau)) !!} -> {!! date('d/m/Y', strtotime($hdp->hopdong->ngay_ket_thuc)) !!}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{!! $hdp->tong_tien !!} đ</td>
                                        </tr>
                                    @endforeach
                                    @foreach($hoaDonDichVu as $hddv)
                                        <tr>
                                            <td>Hóa đơn {!! $hddv->dichvu->ten !!}</td>
                                            <td>{!! date('d/m/Y', strtotime($hddv->ngay_bat_dau)) !!} -> {!! date('d/m/Y', strtotime($hddv->ngay_ket_thuc)) !!}</td>
                                            <td>{!! $hddv->gia !!} đ</td>
                                            <td>{!! $hddv->chi_so_dau !!}</td>
                                            <td>{!! $hddv->chi_so_cuoi !!}</td>
                                            <td>{!! $hddv->so_tieu_thu_cho_phep !!}</td>
                                            @php
                                                $tongTien = $hddv->tong_tien;
                                                $soSV = $hddv->phong->so_luong_sv_hien_tai;
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
    <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Gửi email hẹn ngày làm hợp đồng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
{{--                <form action="{{ route('don-xin-huy') }}" method="POST">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <input type="hidden" value="{{ $hd->id }}" name="ma_hop_dong">--}}
{{--                    <button type="submit" class="btn btn-primary">Yêu cầu chấm dứt hợp đồng</button>--}}
{{--                </form>--}}
                <form action="{{ route('don-xin-huy') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="content">
                            <p>Chọn ngày kết thúc hợp đồng:</p>
                            <input type="date" name="ngay_ket_thuc" id="ngay_ket_thuc">
                            <input type="hidden" value="" name="ma_hop_dong" id="ma_hop_dong">
                            <br>
                            <span id="errDate" style="color:red">Bạn phải chọn ngày muốn kết thúc hợp đồng!</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default send">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.select-day').click(function () {
            var ma_hop_dong = $(this).closest('td').attr('data-ma-hop-dong');
            $('#errDate').hide();
            $('#myModal').find('#ma_hop_dong').attr('value', ma_hop_dong);
           $('#myModal').modal('show');
        });
        $('#ngay_ket_thuc').change(function() {
           if($(this).val() == '') {
               $('#errDate').show();
           } else {
               $('#errDate').hide();
           }
        });
        $('.send').click(function() {
            if($('#ngay_ket_thuc').val() == '') {
                $('#errDate').show();
                return false;
            }
        });
    </script>
@endsection