@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/gia.js') }}"></script>
    <script src="{{ asset('backend/dist/js/dichvu.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Cập nhật dịch vụ</h3>
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="ten">Tên <span class="error">*</span>: </label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên dịch vụ" value="{{ isset($dichVu) ? $dichVu->ten : old('ten') }}">
                    <span id="errorTen" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="mo_ta">Mô tả: </label>
                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3">{{ isset($dichVu) ? $dichVu->mo_ta : old('mo_ta') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gia">Giá <span class="error">*</span></label>
                    <input class="form-control" type="text" name="gia" id="gia" placeholder="Nhập giá" value="{{ isset($dichVu) ? number_format($dichVu->gia) : old('gia') }}">
                    <span id="errGia" class="error"></span>
                </div>
                <div class="box-footer clearfix" style="margin:0 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Cập nhật</button>
                    <button type="reset" class="btn btn-dropbox">Làm mới</button>
                </div>
            </form>
        </div>

    </div>
@endsection
