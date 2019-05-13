@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các quyền</h3>
    <a href="{{ route('themQuyen') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>
    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên quyền</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quyen as $key => $item)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('suaQuyen', [$item->id]) }}"><button class="btn btn-primary">Sửa</button></a>
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
