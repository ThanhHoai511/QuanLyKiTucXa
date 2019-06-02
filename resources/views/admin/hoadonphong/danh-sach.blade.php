@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các hóa đơn phòng</h3>

    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Mã hợp đồng</th>
                            <th>Sinh viên</th>
                            <th>Phòng</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th>Nhân viên lập hóa đơn</th>
                            <th>In hóa đơn</th>
                            <th>Đã thanh toán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hoaDon as $key => $hd)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $hd->id !!}</td>
                                <td>{!! $hd->hopdong->sinhvien->ho_ten !!}</td>
                                <td>{!! $hd->hopdong->phong->ten !!} - {!! $hd->hopdong->phong->khunha->ten !!}</td>
                                <td>{!! $hd->tong_tien !!}</td>
                                <td>
                                    @if($hd->trang_thai == 0)
                                        Chưa thanh toán
                                    @else
                                        Đã thanh toán
                                    @endif
                                </td>
                                <td>{!! $hd->user->email !!}</td>
                                <td><a href="{{ route('inHDP', $hd->id) }}"><button class="btn btn-primary">In hóa đơn</button></a></td>
                                <td data-hddv-id="{{ $hd->id }}">
                                    <form>
                                        {{ csrf_field() }}
                                        <button style="@if($hd->trang_thai == config('constants.DA_THANH_TOAN')) display: none @endif" class="btn btn-success thanh_toan" id="btn_thanh_toan_{{ $hd->id }}" name="id">Đã thanh toán</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".thanh_toan").click(function(e) {
            e.preventDefault();
            if(confirm('Xác nhận thanh toán?') == true) {
                var id = $(this).closest('td').attr('data-hddv-id');
                $.ajax({
                    type: 'PUT',
                    url: '/api/v1/hoa-don-phong/thanh-toan',
                    data: {
                        id: id
                    },
                    success: function()
                    {
                        $("#trang_thai_" + id).text('Đã thanh toán');
                        $("#btn_thanh_toan_" + id).hide();
                    }
                });
            }
            else {
                return false;
            }
        });
    </script>
@endsection
