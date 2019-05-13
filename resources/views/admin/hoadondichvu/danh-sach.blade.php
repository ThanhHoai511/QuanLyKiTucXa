@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các hóa đơn dịch vụ</h3>
    <div class="col-md-12" style="margin-bottom: 10px">
        <div class="col-md-3" style="padding: 10px;">
            <label>Loc</label>
            <select name="loc" class="form-control" id="loc">
                <option>-- Loc theo --</option>
                <option value="{{ config('constants.CHUA_THANH_TOAN') }}">Chua thanh toan</option>
                <option value="{{ config('constants.DA_THANH_TOAN') }}">Da thanh toan</option>
            </select>
        </div>
        <div class="col-md-8" style="border: 1px solid #cecbcb; border-radius: 10px; padding: 10px 0px 10px 120px; margin-left: 70px;">
            <label>Tim kiem</label>
            <form>
                <div class="col-md-4">
                    <select class="form-control" name="thang" id="thang">
                        <option value="">-- Chon thang --</option>
                        <option value="1">Thang 1</option>
                        <option value="2">Thang 2</option>
                        <option value="3">Thang 3</option>
                        <option value="4">Thang 4</option>
                        <option value="5">Thang 5</option>
                        <option value="6">Thang 6</option>
                        <option value="7">Thang 7</option>
                        <option value="8">Thang 8</option>
                        <option value="9">Thang 9</option>
                        <option value="10">Thang 10</option>
                        <option value="11">Thang 11</option>
                        <option value="12">Thang 12</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="nam" class="form-control" placeholder="Nam">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success" type="submit">Tim kiem</button>
                </div>
            </form>
        </div>
    </div>
    
    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Khu nhà</th>
                                <th>Phòng</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Tình trạng</th>
                                <th>Đơn giá</th>
                                <th>Tên dịch vụ</th>
                                <th>Nhân viên lập hóa đơn</th>
                                <th>Chú thích</th>
                                <th>Xử lý</th>
                                <th>Thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($hoaDon as $key => $hd)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $hd->phong->khunha->ten !!}</td>
                                <td>{!! $hd->phong->ten !!}</td>
                                <td>{{ date("d/m/Y", strtotime($hd->ngay_bat_dau)) }}</td>
                                <td>{{ date("d/m/Y", strtotime($hd->ngay_ket_thuc)) }}</td>
                                <td id="trang_thai_{{ $hd->id }}">
                                    @if($hd->trang_thai == config('constants.CHUA_THANH_TOAN'))
                                        Chua thanh toan
                                    @else 
                                        Da thanh toan
                                    @endif
                                </td>
                                <td>{!! $hd->gia !!} d</td>
                                <td>{!! $hd->dichvu->ten !!}</td>
                                <td>{!! $hd->user->nhanvien['ho_ten'] !!}</td>
                                <td>{!! $hd->chu_thich !!}</td>
                                <td>
                                    <a href="{{ route('suaHDDV', $hd->id) }}"><button class="btn btn-primary">Sửa</button></a>
                                </td>
                                <td data-hddv-id="{{ $hd->id }}">
                                    <form>
                                        {{ csrf_field() }}
                                        <button style="@if($hd->trang_thai == config('constants.DA_THANH_TOAN')) display: none @endif" class="btn btn-success thanh_toan" id="btn_thanh_toan_{{ $hd->id }}" name="id">Da thanh toan</button>
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
            if(confirm('Xac nhan thanh toan?') == true) {
                var id = $(this).closest('td').attr('data-hddv-id');
                $.ajax({
                    type: 'PUT',
                    url: '/api/v1/hoa-don-dich-vu/thanh-toan',
                    data: {
                        id: id
                    },
                    success: function()
                    {
                        $("#trang_thai_" + id).text('Da thanh toan');
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
