@extends('user.layouts.app')

@section('content')
    <style>
        .error {
            color: red;
        }
        label {
            color:black;
        }
    </style>
    <div class="container col-md-8">
        @include('admin.layouts.flash-msg')
{{--        <div class="col-md-12 text-center" style="margin-left: 10px;">--}}
{{--            <h4 style="text-align:center; padding-bottom: 10px;">Tình trạng các loại phòng</h4>--}}
{{--            @foreach($choTrong as $lp)--}}
{{--                <p>Loại phòng {!! $lp->ten !!}: {!! $lp->so_cho_trong !!} chỗ trống.</p>--}}
{{--            @endforeach--}}
{{--        </div>--}}
        <h3 style="text-align: center; margin:20px;">Đơn đăng ký nội trú</h3>
        <form class="col-md-12" enctype="multipart/form-data" method="post" id="form">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="anh">Chọn ảnh thẻ</label>
                    <input type="file" class="form-control" name="anh" id="anh" onchange="readURL(this);" accept="image/jpg, image/jpeg, image/png">
                    <span class="error" id="errAnh"></span>
                </div>
                <div class="form-group col-md-7">
                    <img alt="" style="width: 300px; height: 250px;" id="img">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="ma_sinh_vien">Mã sinh viên</label>
                    <input type="text" class="form-control" name="ma_sinh_vien" id="ma_sinh_vien" placeholder="Ví dụ: 151211368">
                    <span class="error" id="errMSV"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="ma_loai_phong">Loại phòng muốn ở</label>
                    <select name="ma_loai_phong" id="ma_loai_phong" class="form-control">
                        <option value="">-- Chọn loại phòng --</option>
                        @foreach($choTrong as $lp)
                            <option value="{{ $lp->id }}">{!! $lp->ten !!} - {!! $lp->so_cho_trong !!} chỗ trống</option>
                        @endforeach
                    </select>
                    <span class="error" id="errLP"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="chu_thich">Chú thích</label>
                <textarea name="chu_thich" id="chu_thich" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Gửi đơn</button>
                <a href="{{ route('home') }}"><button class="btn btn-danger" type="submit">Hủy</button></a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#form').submit(function () {
                if ($('#anh').val() == "") {
                    $('#errAnh').text('Bạn phải chọn ảnh!');
                    $('#anh').focus();
                    return false;
                }

                if ($('#ten').val() == "") {
                    $('#errTen').text('Bạn phải nhập họ tên!');
                    $('#ten').focus();
                    return false;
                }

                if ($('#ma_sinh_vien').val() == "") {
                    $('#errMSV').text('Bạn phải nhập mã sinh viên!');
                    $('#ma_sinh_vien').focus();
                    return false;
                }

                if ($('#gioi_tinh').val() == "") {
                    $('#errGioiTinh').text('Bạn phải chọn giới tính!');
                    $('#gioi_tinh').focus();
                    return false;
                }

                if ($('#ngay_sinh').val() == "") {
                    $('#errNgaySinh').text('Bạn phải chọn ngày sinh!');
                    $('#ngay_sinh').focus();
                    return false;
                }

                if ($('#noi_sinh').val() == "") {
                    $('#errNoiSinh').text('Bạn phải nhập nơi sinh!');
                    $('#noi_sinh').focus();
                    return false;
                }

                if ($('#cmnd').val() == "") {
                    $('#errCMT').text('Bạn phải nhập số chứng minh nhân dân!');
                    $('#cmnd').focus();
                    return false;
                }

                if ($('#ma_loai_phong').val() == "") {
                    $('#errLoaiPhong').text('Bạn phải chọn loại phòng!');
                    $('#ma_loai_phong').focus();
                    return false;
                }

                if ($('#sdt').val() == "") {
                    $('#errSDT').text('Bạn phải nhập số điện thoại!');
                    $('#sdt').focus();
                    return false;
                }

                if ($('#email').val() == "") {
                    $('#errEmail').text('Bạn phải nhập email!');
                    $('#email').focus();
                    return false;
                }
            });

            $('#anh').change(function () {
                if ($('#anh').val() == "") {
                    $('#errAnh').text('Bạn phải chọn ảnh');
                } else {
                    $('#errAnh').text('');
                }
            });

            $('#ten').keyup(function () {
                if ($('#ten').val() == "") {
                    $('#errTen').text('Bạn phải nhập họ tên!');
                } else {
                    $('#errTen').text('');
                }
            });

            $('#ma_sinh_vien').keyup(function () {
                if ($('#ma_sinh_vien').val() == "") {
                    $('#errMSV').text('Bạn phải nhập mã sinh viên!');
                } else {
                    $('#errMSV').text('');
                }
            });

            $('#gioi_tinh').change(function () {
                if ($('#gioi_tinh').val() == "") {
                    $('#errGioiTinh').text('Bạn phải chọn giới tính!');
                } else {
                    $('#errGioiTinh').text('');
                }
            });

            $('#ngay_sinh').change(function () {
                if ($('#ngay_sinh').val() == "") {
                    $('#errNgaySinh').text('Bạn phải chọn ngày sinh!');
                } else {
                    $('#errNgaySinh').text('');
                }
            });

            $('#noi_sinh').keyup(function () {
                if ($('#noi_sinh').val() == "") {
                    $('#errNoiSinh').text('Bạn phải nhập nơi sinh!');
                } else {
                    $('#errNoiSinh').text('');
                }
            });

            $('#cmnd').keyup(function () {
                if ($('#cmnd').val() == "") {
                    $('#errCMT').text('Bạn phải nhập số chứng minh nhân dân!');
                } else {
                    $('#errCMT').text('');
                }
            });

            $('#ma_loai_phong').change(function () {
                if ($('#ma_loai_phong').val() == "") {
                    $('#errLoaiPhong').text('Bạn phải chọn loại phòng!');
                } else {
                    $('#errLoaiPhong').text('');
                }
            });

            $('#sdt').keyup(function () {
                if ($('#sdt').val() == "") {
                    $('#errSDT').text('Bạn phải nhập số điện thoại!');
                } else {
                    $('#errSDT').text('');
                }
            });

            $('#email').keyup(function () {
                if ($('#email').val() == "") {
                    $('#errEmail').text('Bạn phải nhập email!');
                } else {
                    $('#errEmail').text('');
                }
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img').attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection