@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Thêm phòng từ file excel</h3>
        </div>
        <div class="box-body">
            <form method="POST" enctype="multipart/form-data" id="form">
                {{ csrf_field() }}
                <div class="col-md-12 row">
                    <div class="col-md-6 form-group">
                        <label for="khu_nha">Chọn khu nhà</label>
                        <select name="khu_nha" id="khu_nha" class="form-control">
                            <option value="">--Chọn khu nhà--</option>
                            @foreach($khuNha as $kn)
                                <option value="{{ $kn->id }}">{!! $kn->ten !!}</option>
                            @endforeach
                        </select>
                        <span class="error" id="errKhuNha"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="file_excel">Chọn file: </label>
                        <input type="file" class="form-control" id="file_excel" name="file_excel" placeholder="Chọn file" accept=".xlsx, .xls, .csv">
                        <span class="error" id="errFile"></span>
                    </div>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Cập nhật</button>
                    <a href="{{ route('danhSachPhong') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('backend/dist/js/phong-excel.js') }}"></script>
@endsection
