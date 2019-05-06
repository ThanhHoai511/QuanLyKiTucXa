@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các chức vụ</h3>
    <a href="{{ route('themChucVu') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>
    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên chức vụ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($chucVu as $key => $cv)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{{ $cv->id }}</td>
                                <td>{{ $cv->name }}</td>
                                <td>
                                    <a href="{{ route('suaChucVu', [$cv->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
