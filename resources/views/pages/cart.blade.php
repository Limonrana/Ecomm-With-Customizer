@extends('layouts.app')

@section('title', 'Shop - E-commerce Store')

@section('content')
    <!--=======  breadcrumb area =======-->

    <div class="breadcrumb-area breadcrumb-bg-1 pt-30 pb-50 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Shopping Cart</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="{{ route('home') }}">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">cart</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of breadcrumb area =======-->

    <!--=============================================
    =            cart page content         =
    =============================================-->

    <div class="shopping-cart-area mb-130">
        <div class="container">
            <div class="row">
                @if(count($cart) > 0)
                    <div class="col-lg-12 mb-30">
                        <!--=======  cart table  =======-->
                            <div class="cart-table-container">
                                <table class="cart-table">
                                    <thead>
                                    <tr>
                                        <th class="product-name" colspan="2">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($cart as $value)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ asset('uploads/cart/'. $value->options->image) }}" class="img-fluid" alt="">
                                            </td>
                                            <td class="product-name">
                                                <a>{{ $value->name }}</a>
                                                <span class="product-variation">Color: Black</span>
                                            </td>

                                            <td class="product-price"><span class="price">${{ $value->price }}</span></td>

                                            <td class="product-quantity">
                                                <div class="pro-qty d-inline-block mx-0">
                                                    <input type="text" value="{{ $value->qty }}" min="1" max="100">
                                                </div>
                                            </td>

                                            <td class="total-price"><span class="price">${{ number_format($value->price * $value->qty, 2) }}</span></td>

                                            <td class="product-remove">
                                                <a href="{{ route('front.cart.remove', $value->rowId) }}">
                                                    <i class="ion-android-close"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    <!--=======  End of cart table  =======-->
                    </div>
                    <div class="col-lg-12 mb-80">
                        <!--=======  coupon area  =======-->

                        <div class="cart-coupon-area pb-30">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-md-30 mb-sm-30">
                                    <!--=======  coupon form  =======-->

                                    <div class="lezada-form coupon-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-7 mb-sm-10">
                                                    <input type="text" placeholder="Enter your coupon code">
                                                </div>
                                                <div class="col-md-5">
                                                    <button class="lezada-button lezada-button--medium">apply coupon</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!--=======  End of coupon form  =======-->
                                </div>

                                <div class="col-lg-6 text-left text-lg-right">
                                    <!--=======  update cart button  =======-->

                                    <button class="lezada-button lezada-button--medium">update cart</button>

                                    <!--=======  End of update cart button  =======-->
                                </div>
                            </div>
                        </div>

                        <!--=======  End of coupon area  =======-->
                    </div>

                    <div class="col-xl-4 offset-xl-8 col-lg-5 offset-lg-7">
                        <div class="cart-calculation-area">
                            <h2 class="mb-40">Cart totals</h2>

                            <table class="cart-calculation-table mb-30">
                                <tr>
                                    <th>SUBTOTAL</th>
                                    <td class="subtotal">${{ Cart::Subtotal() }}</td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td class="total">${{ Cart::Subtotal() }}</td>
                                </tr>
                            </table>

                            <div class="cart-calculation-button text-center">
                                <a href="{{ route('front.checkout.show') }}" class="lezada-button lezada-button--medium">proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12 mb-30">
                        <div class="cart-empty text-center">
                            <h3>Cart is empty!</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!--=====  End of cart page content  ======-->
@endsection

@section('my-css')
    <style>

    </style>
@endsection
