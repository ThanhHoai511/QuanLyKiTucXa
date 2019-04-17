@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách tin tức</h3>
    <a href="{{ route('themTinTuc') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>

    <form class="form-inline active-cyan-4 pull-right">
        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
        <i class="fa fa-search" aria-hidden="true"></i>
    </form>
    @include('admin.layouts.flash-msg')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Tình trạng</th>
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
                        @if($tt->trang_thai == 1)
                            Đang hiển thị
                        @else
                            Đang ẩn
                        @endif
                    </td>
                    <td data-tin-tuc-id="{{ $tt->id }}">
                        <form>
                            {{ csrf_field() }}
                            <button style="@if($tt->trang_thai == 1) display: none @endif" class="btn btn-success col-md-6" name="approve" id='approve-btn-{{ $tt->id  }}'>Phê duyệt</button>
                            <button style="@if($tt->trang_thai == 0) display: none @endif" class="btn btn-primary col-md-6" name="decline" id='decline-btn-{{ $tt->id  }}'>Từ chối</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('suaTinTuc', [$tt->id]) }}"> <span class="fa fa-edit">Sửa</span> </a> |
                        <a href="{{ route('xoaTinTuc', [$tt->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> <span class="fa fa-trash"></span>Xóa </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{ $tinTuc->links() }}
    </table>
    <script>
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
