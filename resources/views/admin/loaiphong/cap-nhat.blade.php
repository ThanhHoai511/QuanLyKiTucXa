@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/loaiphong.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            @if(isset($loaiPhongUpdate))
                <h3 style="text-align: center; tab-size: 25px;">Sửa thông tin loại phòng</h3>
            @else
                <h3 style="text-align: center; tab-size: 25px;">Thêm loại phòng</h3>
            @endif
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="ten">Tên: <span class="error">*</span></label>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập loại phòng" value="{{ isset($loaiPhongUpdate) ? $loaiPhongUpdate->ten : old('ten') }}">
                        <span id="errorTen" class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="gia_phong">Giá phòng(1 SV / 1 học kỳ) <span class="error">*</span>: </label>
                        <input type="text" class="form-control" id="gia_phong" name="gia_phong" onkeyup="format_gia_phong()" placeholder="Nhập giá phòng" value="{{ isset($loaiPhongUpdate) ? number_format($loaiPhongUpdate->gia_phong) : old('gia_phong') }}">
                        <span id="errorGiaPhong" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="tien_cuoc_tai_san">Tiền cược tài sản(1 SV) <span class="error">*</span>: </label>
                        <input type="text" class="form-control" id="tien_cuoc_tai_san" onkeyup="format_tien_cuoc()"  name="tien_cuoc_tai_san" placeholder="Nhập tiền cược tài sản" value="{{ isset($loaiPhongUpdate) ? number_format($loaiPhongUpdate->tien_cuoc_tai_san) : old('tien_cuoc_tai_san') }}">
                        <span id="errorTc" class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6" style="padding-top: 20px;">
                        <label for="so_luong_sv_toi_da">Số lượng sinh viên tối đa<span class="error">*</span>: </label>
                        <input type="number" class="form-control" id="so_luong_sv_toi_da" name="so_luong_sv_toi_da" placeholder="Nhập số lượng sinh viên tối đa" value="{{ isset($loaiPhongUpdate) ? $loaiPhongUpdate->so_luong_sv_toi_da : old('so_luong_sv_toi_da') }}">
                        <span id="errorSLSV" class="error"></span>
                    </div>
                    <div class="col-md-6"  style="padding-top: 20px; padding-bottom: 20px;">
                        <label for="dien_tich">Diện tích <span class="error">*</span>: </label>
                        <input type="text" class="form-control" id="dien_tich" name="dien_tich" placeholder="Nhập diện tích phòng" value="{{ isset($loaiPhongUpdate) ? $loaiPhongUpdate->dien_tich : old('dien_tich') }}">
                        <span id="errorDienTich" class="error"></span>
                    </div>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">@if(isset($loaiPhongUpdate))Sửa @else Thêm @endif</button>
                    @if(isset($loaiPhongUpdate))
                        <a href="{{ route('xoaLoaiPhong', [$loaiPhongUpdate->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachLoaiPhong') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
