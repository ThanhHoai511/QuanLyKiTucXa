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
                                <td data-ma-sinh-vien="{!! $don->hopdong->sinhvien->ma_sinh_vien !!}" data-ma-don="{!! $don->id !!}">
                                    @if($don->trang_thai != 1)
                                        <button class="btn" id="sendMail">Gửi email</button>
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
    <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gửi email hẹn ngày hoàn thành thủ tục chấm dứt hợp đồng</h4>
                </div>
                <form action="{{ route('guiMailHenNgayHuy') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="content">
                            <p>Chọn ngày hẹn sinh viên hoàn thành thủ tục:</p>
                            <input type="hidden" name="ma_sinh_vien" id="ma_sinh_vien">
                            <input type="hidden" name="ma_don" id="ma_don">
                            <input type="date" name="ngay_hen" id="ngay_hen">
                            <span id="errDate" style="color:red">Bạn phải chọn ngày hẹn!</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default send">Gửi mail</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#sendMail').click(function(){
            var ma_sinh_vien = $(this).closest('td').attr('data-ma-sinh-vien');
            var ma_don = $(this).closest('td').attr('data-ma-don');
            $('#myModal').find('#ma_sinh_vien').attr('value', ma_sinh_vien);
            $('#myModal').find('#ma_don').attr('value', ma_don);
            $('#errDate').hide();
            $('.success').hide();
            $('#myModal').modal('show');
        });
        $('#ngay_hen').on('change', function () {
            if ($(this).val() == '') {
                $('#errDate').show();
                return false;
            } else {
                $('#errDate').hide();
            }
        });
        $('.send').click(function(){
            if ($('#myModal').find('#ngay_hen').val() == '') {
                $('#errDate').show();
                return false;
            }
        });
    </script>
@endsection
