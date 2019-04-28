@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ten_dang_nhap" class="col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập') }}</label>

                            <div class="col-md-6">
                                <input id="ten_dang_nhap" type="email" class="form-control{{ $errors->has('ten_dang_nhap') ? ' is-invalid' : '' }}" name="ten_dang_nhap" value="{{ old('ten_dang_nhap') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('ten_dang_nhap'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ten_dang_nhap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mat_khau" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="mat_khau" type="password" class="form-control{{ $errors->has('mat_khau') ? ' is-invalid' : '' }}" name="mat_khau" required autocomplete="current-password">

                                @if ($errors->has('mat_khau'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mat_khau') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
