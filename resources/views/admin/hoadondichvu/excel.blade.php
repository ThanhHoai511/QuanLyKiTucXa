@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Thêm hóa đơn dịch vụ từ file excel</h3>
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <label for="">Tải file mẫu dưới đây.</label>
                <br>
                <a href="{{ asset('Hóa đơn dịch vụ.xlsx') }}"><button class="btn btn-file">Tải file mẫu</button></a>
            </div>
            <form method="POST" enctype="multipart/form-data" id="form">
                {{ csrf_field() }}
                <div class="col-md-12 form-group">
                    <label for="file_excel">Chọn file: </label>
                    <input type="file" class="form-control" id="file_excel" name="file_excel" placeholder="Chọn file" accept=".xlsx, .xls, .csv">
                    <span class="error" id="errFile"></span>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Thêm</button>
                    <a href="{{ route('danhSachHDDV') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('backend/dist/js/phong-excel.js') }}"></script>
@endsection
