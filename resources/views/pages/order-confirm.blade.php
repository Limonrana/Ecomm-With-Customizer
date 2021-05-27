@extends('layouts.app')

@section('title', 'Order Confirmation - E-commerce Store')

@section('content')
    <!--=============================================
    =            order tracking content         =
    =============================================-->

    <div class="order-tracking-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-12 offset-lg-2 offset-md-1">
                    <!--=======  order tracking box  =======-->

                    <div class="order-tracking-box pt-40 pr-50 pb-50 pl-50  pt-xxs-40 pr-xxs-20 pb-xxs-40 pl-xxs-20">
                        <div class="order text-center">
                            <h1>Thank You!</h1>
                            <h4>Your Order No: {{ $order->order_number }} has been placed!</h4>
                            <p class="info-text mb-20">We sent an email to <strong>{{ $order->billing->email }}</strong> with your order confirmation and receipt. If the email hasn't arrived within 2 minutes, please check your spam folder to see if the email was routed there.</p>
                            <div class="date">
                                <h5>Order Date: {{ $order->date }}</h5>
                            </div>
                        </div>
                        <!--=======  order-tracking form  =======-->

                        <div class="lezada-form order-tracking-form">
                            <div class="row">
                                <div class="col-lg-4 mb-20 order-col">
                                    <div class="icon-box-icon mb-2">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <h5>Shipping Details</h5>
                                    <div class="details">
                                        <b>{{ $order->shipping->name }}</b>
                                        <address>
                                            {{ $order->shipping->address_1 }}, {{ $order->shipping->state }}<br>
                                            {{ $shipping_country->name }}, {{ $order->shipping->zip }}<br>
                                            <strong>{{ $order->shipping->phone }}</strong>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-20 order-col">
                                    <div class="icon-box-icon mb-2">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <h5>Billing Details</h5>
                                    <div class="details">
                                        <b>{{ $order->billing->name }}</b>
                                        <address>
                                            {{ $order->billing->address_1 }}, {{ $order->billing->state }}<br>
                                            {{ $billing_country->name }}, {{ $order->billing->zip }}<br>
                                            <strong>{{ $order->billing->phone }}</strong>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-20 order-col">
                                    <div class="icon-box-icon mb-2">
                                        <i class="fa fa-truck"></i>
                                    </div>

                                    <h5>Shipping Method</h5>
                                    <div class="details">
                                        <p>Preferred Methods:<br>
                                            {{ $order->shipping_method }} Standard<br>
                                            <small>(Normally 10-12 business days, unless otherwise noted)</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Order List</h3>
                                    <hr>
                                    <div class="flex-container">
                                        @foreach($order->orderDetails as $val)
                                            <div class="order-image">
                                                <img src="{{ asset('uploads/cart/'.$val->image) }}" alt="" width="70px" style="border: 1px solid #000e14; border-radius: 5px;">
                                            </div>
                                            <div class="order-title">
                                                <h5>
                                                    {{ $val->title }}<br>
                                                    Qty: {{ $val->quantity }}
                                                </h5>
                                            </div>
                                            <div class="order-price">
                                                <h5>${{ $val->total_price }}</h5>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4 order-col">
                                    <h3>Order Summary</h3>
                                    <hr>
                                    <div class="flex-container">
                                        <div class="order-title">
                                            <h5>Subtotal:</h5>
                                            <h5>Shipping Cost:</h5>
                                            <h5>Sales Tax:</h5>
                                            <hr>
                                            <h5>Total:</h5>
                                        </div>
                                        <div class="order-price">
                                            <h5>${{ number_format($order->total - $order->shipping_cost, 2) }}</h5>
                                            <h5>${{ number_format($order->shipping_cost, 2) }}</h5>
                                            <h5>$6.04</h5>
                                            <hr>
                                            <h5>${{ number_format($order->total + 6.04, 2) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--=======  End of order-tracking form  =======-->

                        <div class="go-button text-center mt-30">
                            <a href="{{ route('front.collection') }}" class="btn btn-success">Continue Shopping</a>
                        </div>
                    </div>

                    <!--=======  End of order tracking box  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of order tracking content  ======-->

@endsection

@section('my-css')
    <style>
        .order-col {
            border: 1px solid #dddbdb;
            padding: 20px 20px;
        }
        address {
            margin-bottom: 0px;
        }
        .flex-container {
            display: flex;
            flex-wrap: nowrap;
        }

        .order-image {
            width: 30%;
            margin: 10px;
        }

        .order-title {
            width: 90%;
            margin: 10px;
        }

        .order-price {
            width: 30%;
            margin: 10px;
        }
    </style>
@endsection
