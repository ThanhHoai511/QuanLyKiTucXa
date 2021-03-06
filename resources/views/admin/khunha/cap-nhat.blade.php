@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/khunha.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Cập nhật khu nhà</h3>
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="ten">Tên <span class="error">*</span>: </label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên khu nhà" value="{{ isset($khuNhaUpdate) ? $khuNhaUpdate->ten : old('ten') }}">
                    <span id="errorTen" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="mo_ta">Mô tả: </label>
                    <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3">{{ isset($khuNhaUpdate) ? $khuNhaUpdate->mo_ta : old('mo_ta') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="doi_tuong">Khu nhà này dành cho nam hay nữ? <span class="error">*</span></label>
                    <select class="form-control" id="doi_tuong" name="doi_tuong" required>
                        <option value="1" {{ isset($khuNhaUpdate) ? ($khuNhaUpdate->doi_tuong == 1 ? 'selected' : '') : old('doi_tuong') }}>Nam</option>
                        <option value="2" {{ isset($khuNhaUpdate) ? ($khuNhaUpdate->doi_tuong == 2 ? 'selected' : '') : old('doi_tuong') }}>Nữ</option>
                    </select>
                </div>
                <div class="box-footer clearfix" style="margin:0 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                        @if(isset($khuNhaUpdate))
                            Sửa
                        @else
                            Thêm
                        @endif
                    </button>
                    @if(isset($khuNhaUpdate))
                        <a href="{{ route('xoaKhuNha', [$khuNhaUpdate->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachKhuNha') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>

    </div>
@endsection
