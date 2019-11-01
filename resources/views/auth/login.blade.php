@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 20%">
        <div class="col-md-8">
            <div class="box" style="border-top: 3px solid #fff">
                <div class="box-header with-border text-center text-bold" style="border-bottom: 1px solid #8ed1cd;">
                    {{ __('LOGIN') }}
                </div>

                <div class="box-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
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

                        <div class="form-group row" style="margin-bottom: 0;">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-success btn-block">
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
@endsection
