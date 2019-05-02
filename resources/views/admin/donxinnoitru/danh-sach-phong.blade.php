@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phòng có thể chọn!</h3>

    <div class="row">
        <div class="col-md-12">
            @foreach($khuNha as $kn)
                @if($kn->phong->toArray() != null)
                    <h3>Khu {!! $kn->ten !!}</h3>
                    @foreach($kn->phong as $phong)
                        <a href="{{ route('taoHopDong', [$maDon, $phong->id]) }}">
                            <div>{!! $phong->ten !!}</div>
                            <div>{!! $phong->so_luong_sv_hien_tai !!} - {!! $phong->loaiphong->so_luong_sv_toi_da !!}</div>
                        </a>
                        <div style="border-bottom: 1px solid;"></div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
@endsection
