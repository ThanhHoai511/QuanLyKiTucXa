@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">
                {{ isset($chucVuUpdate) ? 'Sửa tên chức vụ' : 'Thêm chức vụ' }}
            </h3>
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="ten">Tên <span class="error">*</span>: </label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên chức vụ" value="{{ isset($chucVuUpdate) ? $chucVuUpdate->name : old('ten') }}">
                    <span id="errorTen" class="error"></span>
                </div>
                <div class="box-footer clearfix" style="margin:0 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                        @if(isset($chucVuUpdate))
                            Sửa
                        @else
                            Thêm
                        @endif
                    </button>
                    @if(isset($chucVuUpdate))
                        <a href="{{ route('xoaChucVu', $chucVuUpdate->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachChucVu') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
