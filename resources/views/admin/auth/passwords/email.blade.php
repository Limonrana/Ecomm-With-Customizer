@extends('admin.layouts.app')

@section('title', 'Forgot password | E-commerce Store')

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
                            <h5 class="mb-0">Forgot your password?</h5><small>Enter your email and we'll send you a reset link.</small>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="mt-4" method="POST" action="{{ route('admin.password.email') }}">
                                @csrf

                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email address" required/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Send reset link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
