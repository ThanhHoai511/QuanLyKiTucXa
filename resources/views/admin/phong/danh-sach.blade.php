@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phòng</h3>
    <p>Kết quả: {{ count($phong) }} phòng</p>
    @include('admin.layouts.flash-msg')
    <div class="row col-md-12 form-group" style="margin-top: 10px;">
        <div class="col-md-4">
            <a href="{{ route('themPhong') }}"><button class="btn btn-primary" style="margin-bottom: 20px;">Thêm</button></a>
            <a href="{{ route('themPhongExcel') }}"><button class="btn btn-google" style="margin-bottom: 20px;">Thêm từ file</button></a>
        </div>

        <form class="form-inline active-cyan-4 col-md-8" action="{{ route('danhSachPhong') }}" method="get" id="form">
            <div class="row col-md-3" id="khu_nha">
                <select name="khu_nha" class="form-control col-md-2">
                    <option value="">--Chọn khu nhà --</option>
                    @foreach($khuNha as $kn)
                        <option value="{{ $kn->id }}" {{ isset($params['khu_nha']) ? ($params['khu_nha'] == $kn->id ? 'selected' : '') : '' }}>{!! $kn->ten !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8 pull-right">
                <input class="form-control form-control-sm mr-3 w-75" name="ten" value="{{ isset($params['ten']) ? $params['ten'] : '' }}" type="text" placeholder="Tìm kiếm" aria-label="Search" style="border-radius:3px;">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th style="width:30px;">Số SV hiện tại</th>
                            <th style="width: 30px;">Khu nhà</th>
                            <th style="width: 50px;">Loại phòng</th>
                            <th>In hóa đơn</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($phong as $key => $p)
                            <tr class="">
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->ten }}</td>
                                <td>{{ $p->so_luong_sv_hien_tai }}</td>
                                <td>{{ $p->khunha->ten }}</td>
                                <td>{{ $p->loaiphong->ten }}</td>
                                <td>
                                    @php
                                        $dienNuoc = count($p->dien_nuoc);
                                        $mang = count($p->mang);
                                    @endphp
                                    @if($dienNuoc != 0)
                                        <a href="{{ route('inHDDienNuoc', $p->id) }}"><button>Điện nước</button></a>
                                    @endif
                                    @if($mang != 0)
                                    <a href="{{ route('inHDMang', $p->id) }}"><button>Mạng</button></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('suaPhong', [$p->id]) }}">
                                        <button class="btn btn-primary">Sửa</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $phong->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#khu_nha select').change(function () {
            document.getElementById('form').submit();
        });
    </script>
@endsection
