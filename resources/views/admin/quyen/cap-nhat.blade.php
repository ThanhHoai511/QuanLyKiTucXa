@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">
                {{ isset($quyenUpdate) ? 'Sửa tên quyền' : 'Thêm quyền' }}
            </h3>
        </div>
        @include('admin.layouts.flash-msg')
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="ten">Tên <span class="error">*</span>: </label>
                        <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhập tên quyền" value="{{ isset($quyenUpdate) ? $quyenUpdate->name : old('ten') }}">
                        <span id="errorTen" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="chuc_vu">Những chức vụ nào được sử dụng quyền này? <span class="error">*</span>: </label>
                        <select name="chuc_vu" id="chuc_vu" class="form-control">
                            <option value="">-- Chọn chức vụ --</option>
                            @foreach($chucVu as $cv)
                                <option value="{{ $cv->id }}">{!! $cv->name !!}</option>
                            @endforeach
                        </select>
                        <span id="errChucVu" class="error"></span>
                    </div>
                </div>

                <div class="box-footer clearfix form-group" style="margin:0 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                        @if(isset($quyenUpdate))
                            Sửa
                        @else
                            Thêm
                        @endif
                    </button>
                    @if(isset($quyenUpdate))
                        <a href="{{ route('xoaQuyen', $quyenUpdate->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button type="button" class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachQuyen') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
           $('#form').submit(function () {
              if ($('#ten').val() == "") {
                  $('#errorTen').text('Bạn phải nhập tên quyền!');
                  $('#ten').focus();
                  return false;
              }
              if ($('#chuc_vu').val() == '') {
                  $('#errChucVu').text('Bạn phải chọn chức vụ!');
                  $('#chuc_vu').focus();
                  return false;
              }
           });
        });
        $('#ten').keyup(function () {
           if ($('#ten').val() == "") {
               $('#errorTen').text('Bạn phải nhập tên quyền!');
           } else {
               $('#errorTen').text('');
           }
        });
        $('#chuc_vu').change(function() {
            if ($('#chuc_vu').val() == '') {
                $('#errChucVu').text('Bạn phải chọn chức vụ!');
            } else {
                $('#errChucVu').text('');
            }
        });
    </script>
@endsection
