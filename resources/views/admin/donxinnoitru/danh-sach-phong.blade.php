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
                            <div class="col-lg-3 col-xs-6" style="margin-top:10px;">
                                <!-- small box -->
                                <a href="{{ route('taoHopDong', [$maDon, $phong->id]) }}">
                                    <div class="small-box bg-green" style="padding-left:20px; padding-top:5px;">
                                        <p>{!! $phong->ten !!}</p>
                                        <div class="inner">
                                            @for($i=1;$i<=$phong->so_luong_sv_hien_tai; $i++)
                                                <i class="fa fa-user" style="font-size: 60px;color:blue;"></i>
                                            @endfor
                                            @for($i=$phong->so_luong_sv_hien_tai+1;$i<=$phong->loaiphong->so_luong_sv_toi_da; $i++)
                                                <i class="fa fa-user" style="font-size: 60px;"></i>
                                            @endfor
                                        </div>
                                    </div>
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
