@extends('user.layouts.app')

@section('content')
    <div class="container col-md-8" style="min-height: 250px; background-color:white;">
        <p>{!! $banQL[0]['noi_dung'] !!}</p>
    </div>
@endsection