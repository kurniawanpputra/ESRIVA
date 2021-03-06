@extends('layouts.app')

@section('css')
    <style>
        img{
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            position: absolute;
        }

        @media only screen and (max-width: 767px) {
            img{
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                margin: auto;
                position: initial;
            }
        }

        .btn-profile{
            background-color: #1abc9c;
            border-color: #1abc9c;
        }

        .btn-profile:hover,
        .btn-profile:focus,
        .btn-profile:link,
        .btn-profile:active,
        .btn-profile:visited{
            background-color: #222d32;
            border-color: #222d32;
            color: #fff;
        }

        .form-control{
            border: 1px solid rgb(26, 188, 156);
        }
    </style>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 14%">
        <div class="col-md-5 text-center">
            <img src="{{asset('img/run.png')}}" style="width: 100%; height: auto; max-width: 350px;" draggable="false">
        </div>
        <div class="col-md-7">
            <div class="col-md-10 offset-md-1">
            @if (session('error'))
                <div class="alert alert-danger" role="alert" style="border: none;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="box" style="border-top: 3px solid #1abc9c">
                <div class="box-header with-border text-center text-bold" style="background-color: #1abc9c">
                    {{ __('LOGIN') }}
                </div>

                <div class="box-body" style="padding: 20px;">
                    
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" style="margin-top: 5px;">
                            <label for="email" class="col-md-12 text-center">{{ __('E-Mail') }}</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 text-center">{{ __('Password') }}</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row" style="margin-bottom: 0; margin-top: 30px;">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-block btn-profile">
                                    {{ __('Masuk') }}
                                </button>

                                <a class="btn btn-link btn-block" href="{{ route('register') }}" style="white-space: normal;">
                                    {{ __('Belum punya akun? Daftar disini!') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
