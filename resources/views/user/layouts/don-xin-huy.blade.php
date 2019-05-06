@extends('user.layouts.app')

@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="container col-md-8" style="height: 550px;">
        @include('admin.layouts.flash-msg')
        <h3 style="text-align: center; margin:20px;">Đơn xin chấm dứt hợp đồng</h3>
        <form class="col-md-12" enctype="multipart/form-data" method="post" id="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="khu_nha">Chọn khu nhà</label>
                    <select name="khu_nha" id="khu_nha" class="form-control">
                        <option value="">-- Chọn khu nhà --</option>
                        @foreach($khuNha as $kn)
                            <option value="{{ $kn->id }}">{!! $kn->ten !!}</option>
                        @endforeach
                    </select>
                    <span class="error" id="errKhuNha"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="ma_phong">Chọn phòng</label>
                    <select name="ma_phong" id="ma_phong" class="form-control">
                    </select>
                    <span class="error" id="errPhong"></span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Gửi đơn</button>
                <a href="{{ route('home') }}"><button class="btn btn-danger" type="submit">Hủy</button></a>
            </div>
        </form>
    </div>
    <div id="phong">
        <option value=""></option>
    </div>
    <script>
        $("#khu_nha").change(function() {
            var ma_khu = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'api/v1/phong/get-by-khu-nha',
                data: {
                    ma_khu: ma_khu
                },
                success: function(data)
                {
                    $('#ma_phong').html('');
                    data.forEach(function (phong) {
                        var tmpl = $('#phong').clone();
                        $(tmpl).find('option').text(phong.ten);
                        $(tmpl).find('option').val(phong.id);
                        $('#ma_phong').append(tmpl.html());
                    });
                }
            });
        });
    </script>
@endsection