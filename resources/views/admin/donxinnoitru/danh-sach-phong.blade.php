@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phòng có thể chọn!</h3>

    <div class="row">
        <div class="col-md-12">
            @foreach($khuNha as $kn)
                @if($kn->phong->toArray() != null)
                    <div class="col-md-12">
                        <h3>Khu {!! $kn->ten !!}</h3>
                        @foreach($kn->phong as $phong)
                            <div class="col-md-2 float-left" style="border: 1px solid; margin-top: 5px; font-size: 16px; margin-right:5px;">
                                <a href="{{ route('taoHopDong', [$maDon, $phong->id]) }}" style="color:black">
                                    <div>Phòng {!! $phong->ten !!}</div>
                                    <div>Số SV hiện tại: {!! $phong->so_luong_sv_hien_tai !!}</div>
                                    <div>Số SV tối đa: {!! $phong->loaiphong->so_luong_sv_toi_da !!}</div>
                                </a>
                            </div>
                            <div style="border-bottom: 1px solid;"></div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
