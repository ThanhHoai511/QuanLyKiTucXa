@extends('admin.layouts.app')

@section('content')
    <h3 style="text-align:center;">Danh sách các phòng có thể chọn!</h3>

    <div class="row">
        <div class="col-md-12">
            @foreach($khuNha as $kn)
                <h3>Khu {!! $kn->ten !!}</h3>
                @foreach($kn->phong as $phong)
                    <div>{!! $phong->ten !!}</div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
