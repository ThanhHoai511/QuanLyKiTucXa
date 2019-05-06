@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Tạo hóa đơn</h3>
        </div>

        <div class="box-body">
            <form method="get" role="form" id="form">
                <div class="form-group col-md-12">
                    <div class="col-md-6">
                        <label for="ngay_bat_dau">Ngày bắt đầu <span class="error">*</span>: </label>
                        <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau">
                        <span id="errNgayBatDau" class="error"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="ngay_ket_thuc">Ngày kết thúc <span class="error">*</span>: </label>
                        <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc">
                        <span id="errNgayKetThuc" class="error"></span>
                    </div>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                            Tiếp tục
                    </button>
                    <a href="{{ route('danhSachHDDV') }}"><button type="button" class="btn btn-dropbox">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
