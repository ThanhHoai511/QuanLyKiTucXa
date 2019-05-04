@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Lập hợp đồng</h3>
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="row">
                    <input type="hidden" value="{!! $donDangKy->id !!}" name="don_dang_ky">
                    <div class="form-group col-md-2">
                        <label for="ma_sinh_vien">Mã sinh viên</label>
                        <input type="hidden" name="ma_sinh_vien" value="{!! $sinhVien->id !!}">
                        <input type="text" class="form-control" id="ma_sinh_vien" value="{!! $donDangKy->ma_sinh_vien !!}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ten_sv">Tên sinh viên</label>
                        <input type="text" class="form-control" id="ten_sv" name="ten_sv" value="{!! $sinhVien->ho_ten !!}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ma_phong">Phòng</label>
                        <input type="hidden" name="ma_phong" value="{!! $phong->id !!}">
                        <input type="text" class="form-control" id="ma_phong" value="{!! $phong->ten !!} - {!! $phong->khunha->ten !!}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="ki_hoc">Kì học</label>
                        <select name="ki_hoc" class="form-control" id="ki_hoc">
                            <option value="">-- Chọn kì học --</option>
                            <option value="1">Kì 1</option>
                            <option value="2">Kì 2</option>
                        </select>
                        <span class="error" id="errKiHoc"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nam_hoc">Năm học</label>
                        <input type="text" class="form-control" id="nam_hoc" name="nam_hoc" placeholder="Ví dụ: 2016-2017">
                        <span class="error" id="errNamHoc"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="ngay_bat_dau">Ngày bắt đầu</label>
                        <input type="date" class="form-control" id="ngay_bat_dau" name="ngay_bat_dau">
                        <span class="error" id="errNgayBatDau"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ngay_ket_thuc">Ngày kết thúc</label>
                        <input type="date" class="form-control" id="ngay_ket_thuc" name="ngay_ket_thuc">
                        <span class="error" id="errNgayKetThuc"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="tien_phong">Tiền phòng</label>
                        <input type="text" class="form-control" id="gia_phong" name="tien_phong" value="{!! number_format($phong->loaiphong->gia_phong) !!}">
                        <span class="error" id="errorGiaPhong"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tien_cuoc">Tiền cược</label>
                        <input type="text" class="form-control" id="tien_cuoc_tai_san" name="tien_cuoc" value="{!! number_format($phong->loaiphong->tien_cuoc_tai_san) !!}">
                        <span class="error" id="errorTc"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="chu_thich">Chú thích</label>
                    <textarea name="chu_thich" id="chu_thich" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <div class="box-footer clearfix" style="margin:0 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Tạo hợp đồng</button>
                    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-dropbox">Quay lại</button></a>
                </div>
            </form>
        </div>
    </div>
    <script>
        $("#form").submit(function () {
            if ($('#ki_hoc').val() == '') {
                $('#errKiHoc').text("Bạn phải chọn kì học!");
                $('#ki_hoc').focus();
                return false;
            }

            if ($('#nam_hoc').val() == '') {
                $('#errNamHoc').text("Bạn phải nhập năm học!");
                $('#nam_hoc').focus();
                return false;
            }

            if ($('#ngay_bat_dau').val() == '') {
                $('#errNgayBatDau').text("Bạn phải chọn ngày bắt đầu hợp đồng!");
                $('#ngay_bat_dau').focus();
                return false;
            }

            if ($('#ngay_ket_thuc').val() == '') {
                $('#errNgayKetThuc').text("Bạn phải chọn ngày kết thúc hợp đồng!");
                $('#ngay_ket_thuc').focus();
                return false;
            }

            if ($('#gia_phong').val() == '') {
                $('#errGiaPhong').text("Bạn phải nhập giá phòng");
                $('#gia_phong').focus();
                return false;
            }
            if ($('#tien_cuoc_tai_san').val() == '') {
                $('#errorTc').text("Bạn phải nhập tiền cược tài sản");
                $('#tien_cuoc_tai_san').focus();
                return false;
            }
        });
        $("#gia_phong").keyup(function () {
            var giaPhong = $("#gia_phong");
            giaPhong.val(giaPhong.val().replace(/,/g, '').replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
            if ($('#gia_phong').val() != '') {
                $('#errorGiaPhong').text("");
            } else {
                $('#errorGiaPhong').text("Bạn phải nhập giá phòng!");
            }
        });

        $("#tien_cuoc_tai_san").keyup(function () {
            var tienCuoc = $("#tien_cuoc_tai_san");
            tienCuoc.val(tienCuoc.val().replace(/,/g, '').replace(/(\d)(?=(\d{3})+\b)/g, '$1,'));
            if ($('#tien_cuoc_tai_san').val() != '') {
                $('#errorTc').text("");
            } else {
                $('#errorTc').text("Bạn phải tiền cược tài sản!");
            }
        });
        $('#ki_hoc').change(function() {
            if ($('#ki_hoc').val() != '') {
                $('#errKiHoc').text("");
            } else {
                $('#errKiHoc').text("Bạn phải chọn kì học!");
            }
        });
        $('#nam_hoc').keyup(function() {
            if ($('#nam_hoc').val() != '') {
                $('#errNamHoc').text("");
            } else {
                $('#errNamHoc').text("Bạn phải nhập năm học!");
            }
        });

        $('#ngay_bat_dau').change(function() {
            if ($('#ngay_bat_dau').val() != '') {
                $('#errNgayBatDau').text("");
            } else {
                $('#errNgayBatDau').text("Bạn phải chọn ngày bắt đầu hợp đồng!");
            }
        });

        $('#ngay_ket_thuc').change(function() {
            if ($('#ngay_ket_thuc').val() != '') {
                $('#errNgayKetThuc').text("");
            } else {
                $('#errNgayKetThuc').text("Bạn phải chọn ngày kết thúc hợp đồng!");
            }
        });
    </script>
@endsection
