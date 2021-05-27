@extends('layouts.app')

@section('title', 'Customer Login - E-commerce Store')

@section('content')
    <!--=======  breadcrumb area =======-->

    <div class="breadcrumb-area breadcrumb-bg-1 pt-30 pb-40 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Customer login</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="{{ route('home') }}">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">customer login</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of breadcrumb area =======-->

    <!--=============================================
    =            login page content         =
    =============================================-->

    <div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-md-50 mb-sm-50">
                    <div class="lezada-form login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  login title  =======-->

                                    <div class="section-title section-title--login text-center mb-50">
                                        <h2 class="mb-20">Login</h2>
                                        <p>Great to have you back!</p>
                                    </div>

                                    <!--=======  End of login title  =======-->
                                </div>
                                <div class="col-lg-12 mb-60">
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-60">
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-center mb-30">
                                    <button class="lezada-button lezada-button--medium">login</button>
                                </div>

                                <div class="col-lg-12">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="remember-text">Remember me</span>
                                    @if (Route::has('password.request'))
                                        <a class="reset-pass-link" href="{{ route('password.request') }}">
                                            Lost your password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="lezada-form login-form--register">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  login title  =======-->

                                    <div class="section-title section-title--login text-center mb-50">
                                        <h2 class="mb-20">Register</h2>
                                        <p>If you don’t have an account, register now!</p>
                                    </div>

                                    <!--=======  End of login title  =======-->
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <label for="name">Name <span class="required">*</span> </label>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <label for="email">Email Address <span class="required">*</span> </label>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-50">
                                    <label for="regPassword">Password <span class="required">*</span> </label>
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-50">
                                    <label for="regPassword">Confirm Password <span class="required">*</span> </label>
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="lezada-button lezada-button--medium">register</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of login content  ======-->



@endsection
