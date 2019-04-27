@extends('user.layouts.app')

@section('content')

    <div class="container col-md-8">
        @include('admin.layouts.flash-msg')
        <h3 style="text-align: center; margin:20px;">Đơn đăng ký nội trú</h3>
        <form class="col-md-12" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="anh">Chọn ảnh thẻ</label>
                    <input type="file" class="form-control" name="anh" id="anh" onchange="readURL(this);" accept="image/jpg, image/jpeg, image/png" required>
                </div>
                <div class="form-group col-md-7">
                    <img src="" alt="" style="width: 300px; height: 250px;" id="img">
                </div>
            </div>
            <div class="form-group">
                <label for="ten">Họ và tên</label>
                <input type="text" class="form-control" name="ten" id="ten" placeholder="Ví dụ: Nguyễn Thị Thanh Hoài" required>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="ma_sinh_vien">Mã sinh viên</label>
                    <input type="text" class="form-control" name="ma_sinh_vien" id="ma_sinh_vien" placeholder="Ví dụ: 151211368" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="gioi_tinh">Giới tính</label>
                    <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                        <option value="">-- Chọn giới tính --</option>
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="ngay_sinh">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="cmnd">Chứng minh thư</label>
                    <input type="text" class="form-control" name="cmnd" id="cmnd" placeholder="Ví dụ: 017472917" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Ví dụ: 0396136933" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ma_loai_phong">Loại phòng muốn ở</label>
                    <select name="ma_loai_phong" id="ma_loai_phong" class="form-control">
                        <option value="">-- Chọn loại phòng --</option>
                        @foreach($loaiPhong as $lp)
                            <option value="{{ $lp->id }}">{!! $lp->ten !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Ví dụ: hoaintt97.gtvt@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="noi_sinh">Nơi sinh</label>
                <input type="text" class="form-control" name="noi_sinh" id="noi_sinh" placeholder="Ví dụ: Phù Lưu - Ứng Hòa - Hà Nội" required>
            </div>
            <div class="form-group">
                <label for="chu_thich">Chú thích</label>
                <textarea name="chu_thich" id="chu_thich" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Gửi đơn</button>
                <a href="{{ route('home') }}"><button class="btn btn-danger" type="submit">Hủy</button></a>
            </div>
        </form>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection