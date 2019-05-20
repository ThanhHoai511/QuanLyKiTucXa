@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phản hồi</h3>
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
                                    @if ($item->loai == config('constants.GOP_Y'))
                                        Góp ý
                                    @else
                                        Báo hỏng cơ sở vật chất
                                    @endif
                                </td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->noi_dung }}</td>
                                <td><a href=""><button class="btn btn-primary">Xem chi tiết</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
