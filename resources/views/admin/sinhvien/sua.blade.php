@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/phong.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Sửa thông tin sinh viên</h3>
        </div>
        @include('admin.layouts.flash-msg')

        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="ma_sinh_vien">Mã sinh viên<span class="error">*</span></label>
                    <input type="text" class="form-control" id="ma_sinh_vien" name="ma_sinh_vien" placeholder="Mã sinh viên" value="{{ $sinhVienUpdate->ma_sinh_vien }}">
                    <span id="errorMaSinhVien" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="ho_ten">Họ tên<span class="error">*</span></label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Họ tên" value="{{ $sinhVienUpdate->ho_ten}}">
                    <span id="errorHoTen" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="ngay_sinh">Ngày sinh<span class="error">*</span></label>
                    <input type="text" class="form-control" id="ngay_sinh" name="ngay_sinh" placeholder="Ngày sinh" value="{{ $sinhVienUpdate->ngay_sinh}}">
                    <span id="errorNgaySinh" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="noi_sinh">Nơi sinh<span class="error">*</span></label>
                    <input type="text" class="form-control" id="noi_sinh" name="noi_sinh" placeholder="Nơi sinh" value="{{ $sinhVienUpdate->noi_sinh }}">
                    <span id="errorNoiSinh" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="lop">Lớp<span class="error">*</span></label>
                    <input type="text" class="form-control" id="lop" name="lop" placeholder="Lớp" value="{{ $sinhVienUpdate->lop }}">
                    <span id="errorLop" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="khoa">Khóa<span class="error">*</span></label>
                    <input type="text" class="form-control" id="khoa" name="khoa" placeholder="Khóa" value="{{ $sinhVienUpdate->khoa }}">
                    <span id="errorKhoa" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="dan_toc">Dân tôc<span class="error">*</span></label>
                    <input type="text" class="form-control" id="dan_toc" name="dan_toc" placeholder="Dân tộc" value="{{ $sinhVienUpdate->dan_toc }}">
                    <span id="errorDanToc" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="cmnd">CMND<span class="error">*</span></label>
                    <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND" value="{{ $sinhVienUpdate->cmnd }}">
                    <span id="errorCMND" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="sdt">SDT<span class="error">*</span></label>
                    <input type="text" class="form-control" id="sdt" name="sdt" placeholder="SDT" value="{{ $sinhVienUpdate->sdt }}">
                    <span id="errorSDT" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="sdt_bo">SDT bố<span class="error">*</span></label>
                    <input type="text" class="form-control" id="std_bo" name="sdt_bo" placeholder="SDT bố" value="{{ $sinhVienUpdate->sdt_bo }}">
                    <span id="errorSDTBo" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="sdt_me">SDT mẹ<span class="error">*</span></label>
                    <input type="text" class="form-control" id="std_me" name="sdt_me" placeholder="SDT mẹ" value="{{ $sinhVienUpdate->sdt_me }}">
                    <span id="errorSDTM" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="tinh">Tỉnh<span class="error">*</span></label>
                    <input type="text" class="form-control" id="tinh" name="tinh" placeholder="Tỉnh" value="{{ $sinhVienUpdate->tinh }}">
                    <span id="errorTinh" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="huyen">Huyện<span class="error">*</span></label>
                    <input type="text" class="form-control" id="huyen" name="huyen" placeholder="Huyện" value="{{ $sinhVienUpdate->huyen}}">
                    <span id="errorHuyen" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="xa">Xã<span class="error">*</span></label>
                    <input type="text" class="form-control" id="xa" name="xa" placeholder="Xã" value="{{ $sinhVienUpdate->xa }}">
                    <span id="errorXa" class="error"></span>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="email">Email<span class="error">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $sinhVienUpdate->email }}">
                    <span id="errorEmail" class="error"></span>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Cập nhật</button>
                    <a href="{{ route('danhSachPhong') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
