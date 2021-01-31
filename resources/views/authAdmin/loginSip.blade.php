@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Penilaian | PENDIKAR Muslim</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card card-primary card-outline">
            <div style="padding-top: 15px"></div>

            {{-- <div class="card-header">{{ __('Login') }}</div> --}}
            <h3 class="profile-username text-center">KOORDINATOR</h3>

            <p class="text-muted text-center">PENDIKAR MUSLIM UNTAN</p>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                        <div class="col-md-6">
                            {{--  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>  --}}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback fas fa-lock" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            {{--  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">  --}}
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback fas fa-envelope" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-7">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                    {{-- <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div> --}}


                            {{-- <div class="social-auth-links text-center mb-3 ">
                                <p>- Login with -</p>
                                <a href="{{ route('sekretaris.index') }}" class="btn btn-block btn-info">
                                  <i class=""></i> SEKRETARIS
                                </a>
                                <a href="{{ route('tutor') }}" class="btn btn-block btn-info">
                                  <i class=""></i> TUTOR
                                </a>
                                <a href="{{ route('mahasiswa') }}" class="btn btn-block btn-info">
                                  <i class=""></i> MAHASISWA
                                </a>
                                <a href="{{ route('admin.login') }}" class="btn btn-block btn-info">
                                  <i class=""></i> KOORDINATOR
                                </a>
                              </div>
                              <div class="text-md-left">
                                <a href="{{ route('register')}}" >Register Sekretaris</a>
                            </div> --}}
                              <div class="text-md-left">
                                <a href="{{ route('welcome')}}" >Login with</a>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
