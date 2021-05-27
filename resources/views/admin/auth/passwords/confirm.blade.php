@extends('admin.layouts.app')

@section('title', 'Confirm password | E-commerce Store')

@section('content')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <div class="container" data-layout="container">
            <div class="row flex-center min-vh-100 py-6 text-center">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href="{{ route('admin.login.form') }}"><img class="mr-2" src="{{ asset('assets/img/illustrations/falcon.png') }}" alt="" width="58" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">E-commerce</span></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="mb-0">Confirm Password</h5><small>Please confirm your password before continuing.</small>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="mt-4" method="POST" action="{{ route('admin.password.confirm') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Confirm Password</button>
                                </div>
                                @if (Route::has('admin.password.request'))
                                    <a class="fs--1" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
