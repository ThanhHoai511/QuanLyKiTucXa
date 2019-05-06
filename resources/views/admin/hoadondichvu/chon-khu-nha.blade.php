@extends('admin.layouts.app')

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 style="text-align: center; tab-size: 25px;">Tạo hóa đơn</h3>
        </div>
        <div class="box-body">
            <form method="get" role="form" id="form" action="{{ route('chonKhu') }}">
                <input type="hidden" name="ngay_bat_dau" value="{{ $request->ngay_bat_dau }}">
                <input type="hidden" name="ngay_ket_thuc" value="{{ $request->ngay_ket_thuc }}">
                <div class="form-group col-md-12">
                    <label for="khu_nha">Chọn khu nhà</label>
                    <select name="khu_nha" id="khu_nha" class="form-control">
                        <option value="">-- Chọn khu nhà --</option>
                        @foreach($khuNha as $kn)
                            <option value="{{ $kn->id }}">{!! $kn->ten !!}</option>
                        @endforeach
                    </select>
                    <span class="error" id="errKhuNha"></span>
                </div>
                <div class="box-footer clearfix" style="margin:10px 300px;">
                    <button type="submit" class="btn btn-success" style="margin-left:50px;">
                        Tiếp tục
                    </button>
                    <a href="{{ route('danhSachHDDV') }}"><button type="button" class="btn btn-danger">Hủy</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
