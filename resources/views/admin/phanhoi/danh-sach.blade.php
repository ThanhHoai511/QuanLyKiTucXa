@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phản hồi</h3>
    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người gửi phản hồi</th>
                            <th>Loại</th>
                            <th>Nội dung</th>
                            <th>Xem chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($phanHoi as $key => $item)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if($item->user_id)
                                        @if($item->user->nhanvien)
                                            {{ $item->user->nhanvien->ho_ten }}
                                        @else
                                            {{ $item->user->sinhvien->ho_ten }}
                                        @endif
                                    @else
                                        Ẩn danh
                                    @endif
                                </td>
                                <td>
                                    @if ($item->loai == config('constants.GOP_Y'))
                                        Góp ý
                                    @else
                                        Báo hỏng cơ sở vật chất
                                    @endif
                                </td>
                                <td>{{ $item->noi_dung }}</td>
                                <td>
                                    @if($item->user_id != "")
                                   <button class="btn btn-primary show-comment" data-toggle="modal" data-target="#myModal{{ $item->id }}">Xem bình luận</button>
                                    @endif
                                </td>
                            </tr>
                            <div id="myModal{{$item->id}}" class="modal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Bình luận</h4>
                                        </div>
                                        <form action="{{ route('themBinhLuan') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                @foreach($item->binh_luan as $bl)
                                                    <strong>
                                                        @if($bl->user->nhanvien)
                                                            {!! $bl->user->nhanvien->ho_ten !!}
                                                        @else
                                                            {!! $bl->user->sinhvien->ho_ten !!}
                                                        @endif
                                                    </strong>
                                                    <p style="padding-left:15px;">{!! $bl->noi_dung !!}</p>
                                                @endforeach
                                                <strong>Viết bình luận:</strong>
                                                <input type="hidden" name="ma_phan_hoi" value="{!! $item->id !!}">
                                                    <textarea name="noi_dung" id="" cols="60" rows="5"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit">Gửi bình luận</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $('.show-comment').click(function() {
        //    $('#myModal').modal('show');
        // });
    </script>
@endsection
