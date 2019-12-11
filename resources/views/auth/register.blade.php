@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(img/login/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Register
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Username</span>
                    <input class="input100 @error('name') is-invalid @enderror" type="text" name="name"
                        placeholder="Enter username" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="focus-input100"></span>
                    @error('name')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Email</span>
                    <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                        placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Password</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="Enter password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    @error('password')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Repeat Password</span>
                    <input class="input100" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Enter repeat password">
                    <span class="focus-input100"></span>
                </div>


                <div class="container-login100-form-btn mt-2 text-center mt-4">
                    <button class="login100-form-btn" type="submit">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection