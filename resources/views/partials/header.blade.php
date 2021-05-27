<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Lezada - E-commerce Store')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}">

    <!-- CSS
    ============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Ionicons CSS -->
    <link href="{{ asset('frontend/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Themify CSS -->
    <link href="{{ asset('frontend/css/themify-icons.css') }}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('frontend/css/plugins.css') }}" rel="stylesheet">

    <!-- Helper CSS -->
    <link href="{{ asset('frontend/css/helper.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">

    <!-- Our CSS -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">


    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @yield('my-css')
</head>
