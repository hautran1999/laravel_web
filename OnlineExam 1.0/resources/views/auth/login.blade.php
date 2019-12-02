@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/login.css')}}">

<div class="limiter">

    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(img/login/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Login
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Email</span>
                    <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                        placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>

                    @error('email')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Password</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="password"
                        placeholder="Enter password" name="password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    @error('password')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mt-2">
                    <div class="col-sm-6 contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="col-sm-6">
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn mt-2 text-center">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection