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
            @foreach($csvc as $key => $item)
                <tr class="{{ $key % 2 == 1 ? "success" : "info" }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->ten }}</td>
                    <td>{{ number_format($item->gia) }}</td>
                    <td>{{ number_format($item->tien_cong) }}</td>
                    <td>
                        <a href="{{ route('suaCSVC', [$item->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $csvc->appends(request()->all())->links() }}
    </div>
@endsection
