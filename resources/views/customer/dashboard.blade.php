@extends('layouts.app')

@section('title', 'Customer Portal - E-commerce Store')

@section('content')
    <!--=======  breadcrumb area =======-->

    <div class="breadcrumb-area breadcrumb-bg-1 pt-20 pb-30 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">My Account</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="{{ route('front.home') }}">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">Customer Portal</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of breadcrumb area =======-->

    <!--=============================================
    =            my account page content         =
    =============================================-->
    <div class="my-account-area customer-dashboard mb-120 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
        <template>
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboard" class="active" data-toggle="tab">
                                    Dashboard</a>
                                <a href="#orders" data-toggle="tab">All Orders</a>
                                <a href="#refund" data-toggle="tab"> Refund & Disputes</a>
                                <a href="#coupons" data-toggle="tab"> My Coupons</a>
                                <a href="#address-edit" data-toggle="tab"> address</a>
                                <a href="#account-info" data-toggle="tab"> Account Details</a>
                                <a href="#password" data-toggle="tab"> Change Password</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-12 col-md-12">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                    @include('customer.partials.dashboard')
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    @include('customer.partials.order')
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="refund" role="tabpanel">
                                    @include('customer.partials.refund-dispute')
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="coupons" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>My Coupons</h3>
                                        <p class="saved-message">You don't have any coupon code now.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    @include('customer.partials.address')
                                    @include('customer.partials.edit-address')
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="password" role="tabpanel">
                                    @include('customer.partials.change-password')
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    @include('customer.partials.account-details')
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
        </template>
    </div>
    <!--=====  End of my account page content  ======-->
@endsection

@section('my-css')
    <link rel="stylesheet" href="{{ asset('frontend/app/stripe.css') }}">
    <style>
        .address_form .nice-select .list {
            width: 100%;
            height: 350px;
            overflow-y: auto;
        }
        select#country {
            width: 100%;
            height: 50px;
        }
        button.arrow-btn.lezada-button--icon.lezada-button--icon--left {
            border: none;
            font-size: 16px;
        }
    </style>
@endsection
