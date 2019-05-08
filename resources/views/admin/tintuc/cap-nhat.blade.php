@extends('admin.layouts.app')

@section('content')
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">
                @if(isset($tinTucUpdate))
                    Sua tin tuc
                @else
                    Them tin tuc
                @endif
            </h3>
        </div>
        @include('admin.layouts.flash-msg')

        <div class="box-body">
            <form method="post" role="form" id="form" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group col-md-12">
                    <div class="col-md-12">
                        <label for="tieu_de">Tiêu đề: <span class="error">*</span></label>
                        <input type="text" class="form-control" id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề cho tin" value="{{ isset($tinTucUpdate) ? $tinTucUpdate->tieu_de : old('tieu_de') }}">
                        <span id="errTieuDe" class="error"></span>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-12">
                        <label for="anh">Chọn ảnh cho tin tức: </label>
                        <input type="file" class="form-control" id="anh" name="anh" value="Chọn ảnh" class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-12">
                        <label for="noi_dung">Nội dung tin tức: </label>
                        <textarea class="ckeditor" name="noi_dung" id="editor1" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="loai">Loại</label>
                        <select name="loai" id="loai" class="form-control">
                            <option value="1">Tin tức</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tinh_trang">Trạng thái</label>
                        <div class="form-control">
                            <input type="radio" name="trang_thai" value="1" checked> Hiển thị
                            <input type="radio" name="trang_thai" value="0"> Ẩn
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="noi_bat">Nổi bật</label>
                        <div class="form-control">
                            <input type="radio" name="noi_bat" value="1"> Nổi bật
                            <input type="radio" name="noi_bat" value="0" checked> Thường
                        </div>
                    </div>
                </div>

                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                        @if(isset($tinTucUpdate))
                            Sua
                        @else
                            Them
                        @endif
                    </button>
                    @if(isset($tinTucUpdate))
                        <a href="{{ route('xoaTinTuc', [$tinTucUpdate->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button class="btn btn-danger">Xóa</button></a>
                    @endif
                    <a href="{{ route('danhSachTinTuc') }}"><button type="button" class="btn btn-danger">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
