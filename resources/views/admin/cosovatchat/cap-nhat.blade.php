@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/gia.js') }}"></script>
    <script src="{{ asset('backend/dist/js/dichvu.js') }}"></script>
    <script src="{{ asset('backend/dist/js/csvc.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            @if(isset($csvcUpdate))
                <h3 style="text-align: center; tab-size: 25px;">Sửa cơ sở vật chất</h3>
            @elseif
                <h3 style="text-align: center; tab-size: 25px;">Thêm cơ sở vật chất</h3>
            @endif
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="ten">Tên <span class="error">*</span>: </label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên cơ sở vật chất" value="{{ isset($csvc) ? $csvc->ten : old('ten') }}">
                    <span id="errorTen" class="error"></span>
                </div>
                <div class="form-group">
                    <div class="col-md-6 form-group">
                        <label for="gia">Giá <span class="error">*</span></label>
                        <input type="text" name="gia" placeholder="Nhập giá" class="form-control" id="gia" value="{{ isset($csvc) ? number_format($csvc->gia) : old('gia') }}">
                        <span id="errGia" class="error"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="tien_cong">Tiền công <span class="error">*</span></label>
                        <input type="text" name="tien_cong" placeholder="Nhập tiền công sửa chữa" class="form-control" id="tien_cong" value="{{ isset($csvc) ? number_format($csvc->tien_cong) : old('tien_cong') }}">
                        <span id="errTienCong" class="error"></span>
                    </div>
                </div>
                <div class="box-footer clearfix" style="margin:0 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Cập nhật</button>
                    @if(isset($csvc))
                        <a href="{{ route('xoaCSVC', [$csvc->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachCSVC') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
