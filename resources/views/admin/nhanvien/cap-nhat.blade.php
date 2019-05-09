@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('backend/dist/js/loaiphong.js') }}"></script>
    <div class="box box-info">
        <div class="box-header">
            @if(isset($nhanVienUpdate))
                <h3 style="text-align: center; tab-size: 25px;">Sửa thông tin nhân viên</h3>
            @else
                <h3 style="text-align: center; tab-size: 25px;">Thêm nhân viên</h3>
            @endif
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="ten">Họ và tên: <span class="error">*</span></label>
                        <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên nhân viên" value="{{ isset($nhanVienUpdate) ? $nhanVienUpdate->ho_ten : old('ho_ten') }}">
                        <span id="errorTen" class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="chuc_vu">Chức vụ: <span class="error">*</span></label>
                        <select name="chuc_vu" id="chuc_vu" class="form-control">
                            @foreach($chucVu as $cv)
                                <option value="{{ $cv->id }}">{!! $cv->name !!}</option>
                            @endforeach
                        </select>
                        <span id="errorChucVu" class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="email">Email <span class="error">*</span>: </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{ isset($nhanVienUpdate) ? $nhanVienUpdate->email : old('email') }}">
                        <span id="errorEmail" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="sdt">Số điện thoại <span class="error">*</span>: </label>
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại của nhân viên" value="{{ isset($nhanVienUpdate) ? $nhanVienUpdate->sdt : old('sdt') }}">
                        <span id="errSdt" class="error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="mo_ta">Mô tả: <span class="error">*</span></label>
                        <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control">
                            @if(isset($nhanVienUpdate))
                                {!! $nhanVienUpdate->mo_ta !!}
                            @endif
                        </textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="hinh_anh">Hình ảnh: <span class="error">*</span></label>
                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
                    <span id="errHinhAnh" class="error"></span>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">@if(isset($nhanVienUpdate)) Sửa @else Thêm @endif</button>
                    @if(isset($nhanVienUpdate))
                        <a href="{{ route('xoaNhanVien', [$nhanVienUpdate->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachNhanVien') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
