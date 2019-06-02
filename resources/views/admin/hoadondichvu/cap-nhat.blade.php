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
                <div class="col-md-12 form-group">
                    <div class="col-md-12">
                        <label for="ma_dich_vu">Dịch vụ</label>
                        <select name="ma_dich_vu" id="ma_dich_vu" class="form-control">
                            @foreach($dichVu as $dv)
                                <option value="{{ $dv->id}}" {{ isset($hoaDonDV) ? ($hoaDonDV->ma_dich_vu == $dv->id ? 'selected' : '') : '' }}>{!! $dv->ten !!}</option>
                            @endforeach
                        </select>
                        <span class="error" id="errDichVu"></span>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="khu_nha">Khu nhà <span class="error">*</span>: </label>
                        <select name="khu_nha" id="khu_nha" class="form-control">
                            @foreach($khuNha as $kn)
                                <option value="{{ $kn->id }}" {{ isset($hoaDonDV) ? ($hoaDonDV->phong->khunha->id == $kn->id ? 'selected' : '') : '' }}>{!! $kn->ten !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="ma_phong">Phòng <span class="error">*</span>: </label>
                        <select name="ma_phong" id="ma_phong" class="form-control">
                        </select>
                        <span id="errNgayKetThuc" class="error"></span>
                    </div>
                </div>
                <div class="ngay">
                    <div class="form-group col-md-12">
                        <div class="col-md-6">
                            <label for="ngay_bat_dau">Ngày bắt đầu <span class="error">*</span>: </label>
                            <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau" value="{{ isset($hoaDonDV) ? $hoaDonDV->ngay_bat_dau : old('ngay_bat_dau') }}">
                            <span id="errNgayBatDau" class="error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="ngay_ket_thuc">Ngày kết thúc <span class="error">*</span>: </label>
                            <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc" value="{{ isset($hoaDonDV) ? $hoaDonDV->ngay_ket_thuc : old('ngay_ket_thuc') }}">
                            <span id="errNgayKetThuc" class="error"></span>
                        </div>
                    </div>
                </div>

                <div id="chi_so">
                    <div class="form-group col-md-12">
                        <div class="col-md-6">
                            <label for="chi_so_dau">Chỉ số đầu<span class="error">*</span>: </label>
                            <input type="chi_so_dau" name="chi_so_dau" class="form-control" placeholder="Nhập chỉ số cũ" value="{{ isset($hoaDonDV) ? $hoaDonDV->chi_so_dau : '' }}">
                            <span class="error" id="errChiSoDau"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="chi_so_cuoi">Chỉ số cuối<span class="error">*</span>: </label>
                            <input type="chi_so_cuoi" name="chi_so_cuoi" class="form-control" placeholder="Nhập chỉ số mới"  value="{{ isset($hoaDonDV) ? $hoaDonDV->chi_so_cuoi : '' }}">
                            <span class="error" id="errChiSoCuoi"></span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-12">
                            <label for="so_tieu_thu_cho_phep">Số tiêu thụ cho phép với mỗi sinh viên</label>
                            <input type="so_tieu_thu_cho_phep" readonly id="sttcp" name="so_tieu_thu_cho_phep" class="form-control" placeholder="Nhập số tiêu thụ cho phép đối với mỗi sinh viên"  value="{{ isset($hoaDonDV) ? $hoaDonDV->so_tieu_thu_cho_phep : '' }}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-md-12">
                        <label for="don_gia">Đơn giá</label>
                        <input type="don_gia" id="gia" name="don_gia" class="form-control" readonly placeholder="Nhập đơn giá dịch vụ"  value="{{ isset($hoaDonDV) ? $hoaDonDV->gia : '' }}">
                        <span class="error" id="errDonGia"></span>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-12">
                        <label for="chu_thich">Mô tả</label>
                        <textarea class="form-control" id="chu_thich" name="chu_thich" cols="10" rows="4">{{ isset($hoaDonDV) ? $hoaDonDV->mo_ta : '' }}</textarea>
                    </div>
                </div>
                <div class="box-footer clearfix" style="margin:10px 400px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                         Thêm
                    </button>
                    <a href="{{ route('danhSachHDDV') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
    <input type="hidden" id="phongOld" value="{{ isset($hoaDonDV) ? $hoaDonDV->ma_phong : ''}}">
    <input type="hidden" id="sttcpd" value="{{ $dichVu[0]->so_tieu_thu_cho_phep }}">
    <input type="hidden" id="sttcpn" value="{{ $dichVu[1]->so_tieu_thu_cho_phep }}">
    <input type="hidden" id="giad" value="{{ $dichVu[0]->gia }}">
    <input type="hidden" id="gian" value="{{ $dichVu[1]->gia }}">
    <input type="hidden" id="giam" value="{{ $dichVu[2]->gia }}">
    <div id="phong">
        <option value=""></option>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sttcp').val($('#sttcpd').val() + ' số điện');
            $('#gia').val($('#giad').val() + ' nghìn đồng');
            var ma_khu = $('#khu_nha').val();
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
                            $('#ma_phong').val($('#phongOld').val());
                    });
                }
            });
            $("#khu_nha").change(function() {
                changeKhuNha();
            });
        });

        $('#ma_dich_vu').change(function() {
           if($('#ma_dich_vu').val() == 3) {
               $('#chi_so').hide();
               $('#gia').val($('#giam').val() + ' nghìn đồng');
           } else if($('#ma_dich_vu').val() == 1) {
               $('#chi_so').show();
               $('#sttcp').val($('#sttcpd').val() + ' số điện');
               $('#gia').val($('#giad').val() + ' nghìn đồng');
           } else if($('#ma_dich_vu').val() == 2) {
               $('#chi_so').show();
               $('#sttcp').val($('#sttcpn').val() + ' khối nước');
               $('#gia').val($('#gian').val() + ' nghìn đồng');
           }
        });
        function changeKhuNha()
        {
            var ma_khu = $('#khu_nha').val();
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
        }
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
