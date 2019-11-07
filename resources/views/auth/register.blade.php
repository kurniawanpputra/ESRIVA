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
    </style>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 5%">
        <div class="col-md-5 text-center" style="position: relative;">
            <img src="{{asset('img/landing-2.gif')}}" style="width: 100%; height: auto; max-width: 350px;" draggable="false">
        </div>
        
        <div class="col-md-7">
            <div class="col-md-10 offset-md-1">
            <div class="box" style="border-top: 3px solid #fff">
            
                <div class="box-header with-border text-center text-bold" style="border-bottom: 1px solid #8ed1cd;">
                    {{ __('PENDAFTARAN') }}
                </div>

                <div class="box-body" style="padding: 20px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row" style="margin-top: 5px;">
                            <label for="name" class="col-md-12 text-center">{{ __('Nama') }}</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12 text-center">{{ __('E-Mail') }}</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 text-center">{{ __('Konfirmasi') }}</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 0;">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Daftar') }}
                                </button>

                                <a class="btn btn-link btn-block"  href="{{ route('login') }}" style="white-space: normal;">
                                    {{ __('Sudah punya akun? Login disini!') }}
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
