@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Thêm phòng từ file excel</h3>
        </div>
        <div class="box-body">
            <form method="post" role="form" id="form">
                {{ csrf_field() }}
                <div class="form-group col-md-12 row">
                    <label for="file">Chọn file: </label>
                    <input type="file" class="form-control" id="file" name="file_excel" placeholder="Chọn file" accept=".csv, .xlsx, .xls" required/>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
