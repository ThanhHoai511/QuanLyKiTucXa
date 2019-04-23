@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách cơ sở vật chất</h3>
    <a href="{{ route('themCSVC') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>
    <a href="{{ route('themCSVCExcel') }}"><button class="btn btn-google" style="margin-bottom: 20px;">Thêm từ file</button></a>
    <form class="form-inline active-cyan-4 pull-right" action="{{ route('danhSachCSVC') }}" method="get">
        <input class="form-control form-control-sm mr-3 w-75" name="ten" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    @include('admin.layouts.flash-msg')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Tiền công</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($csvc as $key => $csvc)
                <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                    <td>{{ $csvc->id }}</td>
                    <td>{{ $csvc->ten }}</td>
                    <td>{{ number_format($csvc->gia) }}</td>
                    <td>{{ number_format($csvc->tien_cong) }}</td>
                    <td>
                        <a href="{{ route('suaCSVC', [$csvc->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
