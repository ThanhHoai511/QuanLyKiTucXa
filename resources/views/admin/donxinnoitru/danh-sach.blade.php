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
                                <td data-ma-sinh-vien="{!! $nv->ma_sinh_vien !!}" data-ma-don="{!! $nv->id !!}">
                                    @if($nv->tinh_trang != 1)
                                        @if($nv->tinh_trang != 2 )
                                            <button class="btn btn-success" id="send-mail" style="margin-bottom: 5px;">Gửi mail hẹn ngày</button>
                                        @endif
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
    <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gửi email hẹn ngày làm hợp đồng</h4>
                </div>
                <form action="{{ route('guiMailHenNgay') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="modal-body">
                        <div class="content">
                            <p>Chọn ngày hẹn sinh viên làm hợp đồng:</p>
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
        $('#send-mail').click(function(){
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
