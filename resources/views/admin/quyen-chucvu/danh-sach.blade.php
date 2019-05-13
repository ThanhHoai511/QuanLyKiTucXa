@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các quyền của chức vụ</h3>
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
                            <th>Tên quyền</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quyenChucVu as $key => $item)
                            <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                                <td>{!! $item->id !!}</td>
                                <td>{!! $item->chucvu->name !!}</td>
                                <td>{!! $item->quyen->name !!}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
