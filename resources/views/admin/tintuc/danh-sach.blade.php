@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách tin tức</h3>
    @include('admin.layouts.flash-msg')

    <div class="row col-md-12 form-group" style="margin-top: 10px;">
        <div class="col-md-4">
            <a href="{{ route('themTinTuc') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>
        </div>

        <form class="form-inline active-cyan-4 col-md-8" action="{{ route('danhSachTinTuc') }}" method="get" id="form">
            <div class="row col-md-3" id="loai">
                <select name="loai" class="form-control col-md-2">
                    <option value="">--Chọn loại tin--</option>
                    <option value="{{ config('constants.TIN_TUC') }}" {{ isset($params['loai']) ? ($params['loai'] == config('constants.TIN_TUC') ? 'selected' : '') : '' }}>Tin tức</option>
                    <option value="{{ config('constants.GIOI_THIEU') }}" {{ isset($params['loai']) ? ($params['loai'] == config('constants.GIOI_THIEU') ? 'selected' : '') : '' }}>Giới thiệu</option>
                    <option value="{{ config('constants.NHAN_S') }}" {{ isset($params['loai']) ? ($params['loai'] == config('constants.NHAN_SU') ? 'selected' : '') : '' }}>Bộ máy quản lý</option>
                </select>
            </div>
            <div class="col-md-8 pull-right">
                <input class="form-control form-control-sm mr-3 w-75" name="ten" value="{{ isset($params['tieu_de']) ? $params['tieu_de'] : '' }}" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Tình trạng</th>
            <th>Nổi bật</th>
            <th>Xử lý</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tinTuc as $key => $tt)
                <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                    <td>{!! $tt->id !!}</td>
                    <td>{!! $tt->tieu_de !!}</td>
                    <td>{!! $tt->noi_dung !!}</td>
                    <td>
                        @if($tt->anh == "")
                            <img src="{{ asset('images/common/utc2.jpg') }}" alt="" style="width:70px;height: 70px;">
                        @else
                            <img src="{{ asset('images/tintuc/' . $tt->hinh_anh) }}" alt=""  style="width:70px;height: 70px;">
                        @endif
                    </td>
                    <td>
                        @if($tt->trang_thai == 1)
                            Đang hiển thị
                        @else
                            Đang ẩn
                        @endif
                    </td>
                    <td>
                        @if($tt->noi_bat == 1)
                            Tin nổi bật
                        @else
                            Tin thường
                        @endif
                    </td>
                    <td data-tin-tuc-id="{{ $tt->id }}">
                        <form>
                            {{ csrf_field() }}
                            <button style="@if($tt->trang_thai == 1) display: none @endif" class="btn btn-success col-md-6" name="approve" id='approve-btn-{{ $tt->id  }}'>Phê duyệt</button>
                            <button style="@if($tt->trang_thai == 0) display: none @endif" class="btn btn-danger col-md-6" name="decline" id='decline-btn-{{ $tt->id  }}'>Từ chối</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('suaTinTuc', [$tt->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{ $tinTuc->links() }}
    </table>
    <script>
        $('#loai select').change(function() {
            document.getElementById('form').submit();
        });
        {{--$(document).on("click","button",function(e) {--}}
        {{--    e.preventDefault();--}}
        {{--    var self = $(this);--}}
        {{--    var typeBtn = self.attr("name");--}}
        {{--    var url = "";--}}
        {{--    if (typeBtn == "approve") {--}}
        {{--        url = "{{ route('approve') }}";--}}
        {{--    } else {--}}
        {{--        url = "{{ route('decline') }}";--}}
        {{--    }--}}
        {{--    var tinTucID = parseInt(self.closest('td').attr('data-tin-tuc-id'));--}}
        {{--    $.ajax({--}}
        {{--        type: "POST",--}}
        {{--        url: url,--}}
        {{--        dataType: "json",--}}
        {{--        data: {--}}
        {{--            "id" : tinTucID--}}
        {{--        },--}}
        {{--        success: function()--}}
        {{--        {--}}
        {{--            if (typeBtn == "approve") {--}}
        {{--                $("#status-td-" + tinTucID).text('Đang hiển thị');--}}
        {{--                $("#approve-btn-" + tinTucID).hide();--}}
        {{--                $("#decline-btn-" + tinTucID).show();--}}
        {{--            } else {--}}
        {{--                $("#status-td-" + tinTucID).text('Đang ẩn');--}}
        {{--                $("#approve-btn-" + tinTucID).show();--}}
        {{--                $("#decline-btn-" + tinTucID).hide();--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function () {--}}
        {{--            alert("Phê duyệt không thành công!");--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

    </script>
@endsection
