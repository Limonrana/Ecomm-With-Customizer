@extends('admin.layouts.app')

@section('title', 'Rest password | E-commerce Store')

@section('content')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

        <div class="container" data-layout="container">
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href="{{ route('admin.login.form') }}"><img class="mr-2" src="{{ asset('assets/img/illustrations/falcon.png') }}" alt="" width="58" /><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">E-commerce</span></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="text-center">Reset new password</h5>
                            <form class="mt-3" method="POST" action="{{ route('admin.password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                                <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Set password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
