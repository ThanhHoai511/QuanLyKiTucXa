@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/phong.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            @if(isset($phongUpdate))
                <h3 style="text-align: center; tab-size: 25px;">Sửa thông tin phòng</h3>
            @else
                <h3 style="text-align: center; tab-size: 25px;">Thêm phòng</h3>
                <div class="col-md-4">
                    <a href="{{ route('themPhongExcel') }}"><button class="btn btn-instagram" style="margin-bottom: 20px;">Thêm từ file</button></a>
                </div>
            @endif
        </div>
        @include('admin.layouts.flash-msg')

        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group row col-md-12">
                    <div class="col-md-6">
                        <label for="ma_khu">Khu nhà <span class="error">*</span>: </label>
                        <select name="ma_khu" id="ma_khu" class="form-control">
                            <option value="">--Chọn khu nhà--</option>
                            @foreach($khuNha as $kn)
                                <option value="{{ $kn->id }}" {{ isset($phongUpdate) ? ($phongUpdate->ma_khu == $kn->id ? 'selected' : '') : (old('ma_khu') == $kn->id ? 'selected' : '') }}>{!! $kn->ten !!}</option>
                            @endforeach
                        </select>
                        <span id="errKhuNha" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="ma_loai_phong">Loại phòng<span class="error">*</span>: </label>
                        <select name="ma_loai_phong" id="ma_loai_phong" class="form-control">
                            <option value="">--Chọn loại phòng--</option>
                            @foreach($loaiPhong as $lp)
                                <option value="{{ $lp->id }}" {{ isset($phongUpdate) ? ($phongUpdate->ma_loai_phong == $lp->id ? 'selected' : '') : (old('ma_loai_phong') == $lp->id ? 'selected' : '') }}>{!! $lp->ten !!}</option>
                            @endforeach
                        </select>
                        <span id="errLoaiPhong" class="error"></span>
                    </div>
                </div>
                <div class="form-group col-md-12 row" style="margin: 10px 10px 10px 0px;">
                    <label for="ten">Tên: <span class="error">*</span></label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên phòng" value="{{ isset($phongUpdate) ? $phongUpdate->ten : old('ten') }}">
                    <span id="errorTen" class="error"></span>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                        @if(isset($phongUpdate))
                            Sửa phòng
                        @else
                            Thêm phòng
                        @endif
                    </button>
                    @if(isset($phongUpdate))
                        <a href="{{ route('xoaPhong', [$phongUpdate->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" class="btn btn-danger">Xóa phòng</button></a>
                    @endif
                    <a href="{{ route('danhSachPhong') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
