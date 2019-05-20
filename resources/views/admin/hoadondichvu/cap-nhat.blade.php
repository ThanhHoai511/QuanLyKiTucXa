@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Tạo hóa đơn</h3>
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="POST" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="ngay_bat_dau">Ngày bắt đầu <span class="error">*</span>: </label>
                        <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau" value="{{ old('ngay_bat_dau') }}">
                        <span id="errNgayBatDau" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="ngay_ket_thuc">Ngày kết thúc <span class="error">*</span>: </label>
                        <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc" value="{{ old('ngay_ket_thuc') }}">
                        <span id="errNgayKetThuc" class="error"></span>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="chi_so_dau">Chỉ số đầu (Nếu là hóa đơn mạng và hóa đơn sửa chữa thì nhập vào 0)</label>
                        <input type="chi_so_dau" name="chi_so_dau" class="form-control" placeholder="Nhập chỉ số cũ">
                        <span class="error" id="errChiSoDau"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="chi_so_cuoi">Chỉ số cuối  (Nếu là hóa đơn mạng và hóa đơn sửa chữa thì nhập vào 0)</label>
                        <input type="chi_so_cuoi" name="chi_so_cuoi" class="form-control" placeholder="Nhập chỉ số mới">
                        <span class="error" id="errChiSoCuoi"></span>
                    </div>
                </div>
                 <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="don_gia">Đơn giá</label>
                        <input type="don_gia" name="don_gia" class="form-control" placeholder="Nhập đơn giá dịch vụ">
                        <span class="error" id="errDonGia"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="so_tieu_thu_cho_phep">Số tiêu thụ cho phép với mỗi sinh viên</label>
                        <input type="so_tieu_thu_cho_phep" name="so_tieu_thu_cho_phep" class="form-control" placeholder="Nhập số tiêu thụ cho phép đối với mỗi sinh viên">
                        <span class="error" id="errSoTieuThuChoPhep"></span>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="ma_dich_vu">Dịch vụ</label>
                        <select name="ma_dich_vu" id="ma_dich_vu" class="form-control">
{{--                            @foreach($dichVu as $dv)--}}
{{--                                <option value="{{ $dv->id}}">{!! $dv->ten !!}</option>--}}
{{--                            @endforeach--}}
                        </select>
                        <span class="error" id="errDichVu"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="chu_thich">Mô tả</label>
                        <textarea class="form-control" id="chu_thich" name="chu_thich" cols="10" rows="4"></textarea>
                    </div>
                </div>
                <div class="box-footer clearfix" style="margin:10px 400px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                            Tạo
                    </button>
                    <a href="{{ route('danhSachHDDV') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
    <div id="phong">
        <option value=""></option>
    </div>
    <script type="text/javascript">
        $("#khu_nha").change(function() {
            var ma_khu = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/api/v1/phong/get-by-khu-nha',
                data: {
                    ma_khu: ma_khu
                },
                success: function(data)
                {
                    $('#ma_phong').html('');
                    data.forEach(function (phong) {
                        var tmpl = $('#phong').clone();
                        $(tmpl).find('option').text(phong.ten);
                        $(tmpl).find('option').val(phong.id);
                        $('#ma_phong').append(tmpl.html());
                    });
                }
            });
        });
    </script>
    <!-- minTuition = minTuition.replace(/,/g, '');
        var ph=/^[0-9]+$/;
        minTuition = Number(minTuition);

        if (!ph.test(minTuition)) {
            $("#errMinTuition").text("Min tuition must be integer!");
            return false;
        }
        if (minTuition < 1000000) {
            $("#errMinTuition").text("Min tuition must be greater than 1 million!");
            return false;
        }

 -->
@endsection
