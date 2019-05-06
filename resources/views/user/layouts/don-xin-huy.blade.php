@extends('user.layouts.app')

@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="container col-md-8" style="height: 550px;">
        @include('admin.layouts.flash-msg')
        <h3 style="text-align: center; margin:20px;">Đơn xin chấm dứt hợp đồng</h3>
        <form class="col-md-12" method="post" id="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="ma_sv">Mã sinh viên</label>
                    <input type="text" name="ma_sv" class="form-control" id="ma_sv" placeholder="Nhập mã sinh viên">
                    <span class="error" id="errMSV"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="ho_ten">Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control" id="ho_ten" placeholder="Nhập họ tên">
                    <span class="error" id="errHoTen"></span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="khu_nha">Chọn khu nhà</label>
                    <select name="khu_nha" id="khu_nha" class="form-control">
                        <option value="">-- Chọn khu nhà --</option>
                        @foreach($khuNha as $kn)
                            <option value="{{ $kn->id }}">{!! $kn->ten !!}</option>
                        @endforeach
                    </select>
                    <span class="error" id="errKhuNha"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="ma_phong">Chọn phòng</label>
                    <select name="ma_phong" id="ma_phong" class="form-control">
                    </select>
                    <span class="error" id="errPhong"></span>
                </div>
            </div>
            <div class="form-group col-md-12" style="margin: 10px 500px;">
                <button class="btn btn-primary" type="submit">Gửi đơn</button>
                <a href="{{ route('home') }}"><button class="btn btn-danger" type="submit">Hủy</button></a>
            </div>
        </form>
    </div>
    <div id="phong">
        <option value=""></option>
    </div>
    <script>
        $('#form').submit(function (e) {
            e.preventDefault();
            if ($('#ma_sv').val() == '') {
                $('#errMSV').text('Bạn phải nhập mã sinh viên!');
                $('#ma_sv').focus();
                return false;
            }
            if ($('#ho_ten').val() == '') {
                $('#errHoTen').text('Bạn phải nhập họ tên!');
                $('#ho_ten').focus();
                return false;
            }
            if ($('#khu_nha').val() == '') {
                $('#errKhuNha').text('Bạn phải chọn khu nhà!');
                $('#khu_nha').focus();
                return false;
            }
            if ($('#ma_phong').val() == '') {
                $('#errPhong').text('Bạn phải chọn phòng đang ở!');
                $('#ma_phong').focus();
                return false;
            }
        });
        $('#ma_sv').keyup(function () {
            if ($('#ma_sv').val() == '') {
                $('#errMSV').text('Bạn phải nhập mã sinh viên!');
            } else {
                $('#errMSV').text('');
            }
        });
        $('#ho_ten').keyup(function () {
            if ($('#ho_ten').val() == '') {
                $('#errHoTen').text('Bạn phải nhập họ tên!');
            } else {
                $('#errHoTen').text('');
            }
        });
        $('#khu_nha').change(function () {
            if ($('#khu_nha').val() == '') {
                $('#errKhuNha').text('Bạn phải chọn khu nhà!');
            } else {
                $('#errKhuNha').text('');
            }
        });
        $('#ma_phong').change(function () {
            if ($('#ma_phong').val() == '') {
                $('#errPhong').text('Bạn phải chọn phòng đang ở!');
            } else {
                $('#errPhong').text('');
            }
        });
        $("#khu_nha").change(function() {
            var ma_khu = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'api/v1/phong/get-by-khu-nha',
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
@endsection