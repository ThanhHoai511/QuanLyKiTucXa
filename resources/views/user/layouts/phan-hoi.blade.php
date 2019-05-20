@extends('user.layouts.app')

@section('content')
    <style>
        .error {
            color: red;
        }
        label{
            color:black;
        }
    </style>
    <div class="container col-md-8">
        @include('admin.layouts.flash-msg')
        <div class="danh-sach-phan-hoi col-md-12">
            <h3 class="text-center" style="padding-top: 20px; padding-bottom: 20px;">Lịch sử phản hồi</h3>
            @foreach($phanHoi as $ph)
                <div class="phan-hoi">
                    <p>Loại phản hồi :
                        @if($ph->loai == config('constants.GOP_Y'))
                            Góp ý
                        @else
                            Báo hỏng cơ sở vật chất
                        @endif
                    </p>
                    <p>Nội dung : {!! $ph->noi_dung !!}</p>
                    @foreach($ph->binh_luan as $bl)
                        @if($bl->user->is_access == 1)
                            <p>{!! $bl->user->nhanvien->ho_ten !!}</p>
                        @else
                            <p>{!! $bl->user->sinhvien->ho_ten !!}</p>
                        @endif
                        <p>{!! $bl->noi_dung !!}</p>
                    @endforeach
                    <div class="row col-md-12">
                        <form action="{{ route('guiBinhLuan', $ph->id) }}" method="POST" id="formBinhLuan">
                            {{ csrf_field() }}
                            <input type="hidden" name="ma_phan_hoi" value="{{ $ph->id }}">
                            <span style="padding-right: 5px; padding-top: 5px;">Trả lời</span>
                            <textarea name="noi_dung" id="" cols="30" rows="4"></textarea>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
                @endforeach
        </div>
        <h3 style="text-align: center; margin:20px;">Phản hồi</h3>
        <form class="col-md-12" method="post" id="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="loai">Loại phản hôì</label>
                <select name="loai" id="loai" class="form-control">
                    <option value="{{ config('constants.GOP_Y') }}">Góp ý</option>
                    <option value="{{ config('constants.BAO_HONG') }}">Báo hỏng cơ sở vật chất</option>
                </select>
                <span class="error" id="errLoai"></span>
            </div>
            <div class="form-group">
                <label for="noi_dung">Nội dung phản hồi</label>
                <textarea name="noi_dung" id="noi_dung" cols="30" rows="5" class="form-control"></textarea>
                <span class="error" id="errNoiDung"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Gửi phản hồi</button>
                <a href="{{ route('home') }}"><button class="btn btn-danger" type="submit">Hủy</button></a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#form').submit(function () {
                if ($('#noi_dung').val() == "") {
                    $('#errNoiDung').text('Bạn phải nhập nội dung phản hồi!');
                    $('#noi_dung').focus();
                    return false;
                }

                if ($('#loai').val() == "") {
                    $('#errLoai').text('Bạn phải chọn loại phản hồi!');
                    $('#loai').focus();
                    return false;
                }
            });
            $('#noi_dung').keyup(function () {
                if ($('#noi_dung').val() == "") {
                    $('#errNoiDung').text('Bạn phải nhập nội dung phản hồi!');
                } else {
                    $('#errNoiDung').text('');
                }
            });

            $('#loai').change(function () {
                if ($('#loai').val() == "") {
                    $('#errLoai').text('Bạn phải chọn loại phản hồi!');
                } else {
                    $('#errLoai').text('');
                }
            });
            $('#formBinhLuan').submit(function() {
                
            });
        });
    </script>
@endsection