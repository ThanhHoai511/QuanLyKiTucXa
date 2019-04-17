@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/gia.js') }}"></script>
    <script src="{{ asset('backend/dist/js/dichvu.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Cập nhật cơ sở vật chất</h3>
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
                    <label for="gia">Giá <span class="error">*</span></label>
                    <input type="text" name="gia" placeholder="Nhập giá" class="form-control" id="gia" value="{{ isset($csvc) ? number_format($csvc->gia) : old('gia') }}">
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
