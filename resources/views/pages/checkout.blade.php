@extends('layouts.app')

@section('title', 'Checkout - E-commerce Store')

@section('content')
    <!--=======  breadcrumb area =======-->

    <div class="breadcrumb-area breadcrumb-bg-1 pt-30 pb-40 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Checkout</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="{{ route('home') }}">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">checkout</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <!--=======  End of breadcrumb area =======-->

    <!--=============================================
    =            checkout page content         =
    =============================================-->
    <div class="checkout-page-area mb-130 checkout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="lezada-form">
                        <!-- Checkout Form s-->
                        <form action="{{ route('front.checkout.store') }}" method="POST" class="checkout-form" id="payment-form">
                            @csrf
                            <div class="row row-40">

                                <div class="col-lg-7 mb-20">

                                    <!-- Billing Address -->
                                    <div id="billing-form" class="mb-40">
                                        <h4 class="checkout-title">Billing Address</h4>

                                        <div class="row">
                                            <div class="col-md-12 col-12 mb-20">
                                                <label>Full Name*</label>
                                                <input type="text" placeholder="First Name" name="name" required>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Email Address*</label>
                                                <input type="email" placeholder="Email Address" name="email" required>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Phone no*</label>
                                                <input type="text" placeholder="Phone number" name="phone" required>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Company Name</label>
                                                <input type="text" placeholder="Company Name (Optional)" name="company">
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Address*</label>
                                                <input type="text" placeholder="Address line 1" name="address_1" required>
                                                <input type="text" placeholder="Address line 2 (Optional)" name="address_2">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Country*</label>
                                                <select class="nice-select" name="country" required>
                                                    @foreach($country as $val)
                                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Town/City*</label>
                                                <input type="text" placeholder="Town/City" name="city" required>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>State*</label>
                                                <input type="text" placeholder="State" name="state" required>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>Zip Code*</label>
                                                <input type="text" placeholder="Zip Code" name="zip" required>
                                            </div>

{{--                                            <div class="col-12 mb-20">--}}
{{--                                                <div class="check-box">--}}
{{--                                                    <input type="checkbox" id="shiping_address" data-shipping>--}}
{{--                                                    <label for="shiping_address">Ship to Different Address</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div>

                                    </div>

                                    <!-- Shipping Address -->
{{--                                    <div id="shipping-form" class="mb-40">--}}
{{--                                        <h4 class="checkout-title">Shipping Address</h4>--}}

{{--                                        <div class="row">--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>First Name*</label>--}}
{{--                                                <input type="text" placeholder="First Name">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>Last Name*</label>--}}
{{--                                                <input type="text" placeholder="Last Name">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>Email Address*</label>--}}
{{--                                                <input type="email" placeholder="Email Address">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>Phone no*</label>--}}
{{--                                                <input type="text" placeholder="Phone number">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-12 mb-20">--}}
{{--                                                <label>Company Name</label>--}}
{{--                                                <input type="text" placeholder="Company Name">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-12 mb-20">--}}
{{--                                                <label>Address*</label>--}}
{{--                                                <input type="text" placeholder="Address line 1">--}}
{{--                                                <input type="text" placeholder="Address line 2">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>Country*</label>--}}
{{--                                                <select class="nice-select">--}}
{{--                                                    <option>Bangladesh</option>--}}
{{--                                                    <option>China</option>--}}
{{--                                                    <option>country</option>--}}
{{--                                                    <option>India</option>--}}
{{--                                                    <option>Japan</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>Town/City*</label>--}}
{{--                                                <input type="text" placeholder="Town/City">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>State*</label>--}}
{{--                                                <input type="text" placeholder="State">--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-6 col-12 mb-20">--}}
{{--                                                <label>Zip Code*</label>--}}
{{--                                                <input type="text" placeholder="Zip Code">--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                    </div>--}}

                                </div>

                                <div class="col-lg-5">
                                    <div class="row">

                                        <!-- Cart Total -->
                                        <div class="col-12 mb-60">

                                            <h4 class="checkout-title">Cart Total</h4>

                                            <div class="checkout-cart-total">

                                                <h4>Product <span>Total</span></h4>

                                                <ul>
                                                    @foreach($cart as $value)
                                                        <li>{{ $value->name }} X {{ $value->qty }} <span>${{ number_format($value->price * $value->qty, 2) }}</span></li>
                                                    @endforeach
                                                </ul>

                                                <p>Sub Total <span>${{ Cart::Subtotal() }}</span></p>
                                                <p>Shipping Fee <span>$20.00</span></p>

                                                <h4>Grand Total <span>${{ Cart::Subtotal() + 20 }}</span></h4>

                                            </div>

                                        </div>

                                        <!-- Payment Method -->
                                        <div class="col-12">

                                            <h4 class="checkout-title">Payment Method</h4>

                                            <div class="checkout-payment-method">

                                                <div class="single-method">
                                                    <input type="radio" id="card" name="payment_method" value="card" v-on:change="showPayment($event)">
                                                    <label for="card">Debit Or Credit Card (Stripe)</label>
                                                    <div id="card_content" style="display:none; margin-top: 10px;">
                                                        <div id="card-element"><!--Stripe.js injects the Card Element--></div>
                                                    </div>
                                                </div>

                                                <div class="single-method">
                                                    <input type="radio" id="paypal" name="payment_method" value="paypal" v-on:change="showPayment($event)">
                                                    <label for="paypal">Paypal</label>
                                                    <div id="paypal_content" style="display:none;">Please send a Check to Store name with Store Street, Store Town,
                                                        Store State, Store Postcode, Store Country.</div>
                                                </div>

                                                <div class="single-method">
                                                    <input type="radio" id="cash" name="payment_method" value="cash" v-on:change="showPayment($event)">
                                                    <label for="cash">Cash on Delivery</label>
                                                    <div id="cash_content" style="display:none;">Please send a Check to Store name with Store Street, Store Town, Store
                                                        State, Store Postcode, Store Country.</div>
                                                </div>

                                                <div class="single-method">
                                                    <input type="checkbox" id="accept_terms" required>
                                                    <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                                </div>

                                            </div>
                                            <button onmouseover="overBTN(this)" onmouseout="outBTN(this)" id="submit" class="lezada-button lezada-button--medium mt-30" @click="buttonEvent">
                                                <div class="spinner hidden" id="spinner"></div>
                                                <span id="button-text">Place order</span>
                                            </button>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====  End of checkout page content  ======-->
@endsection

@section('my-css')
    <link rel="stylesheet" href="{{ asset('frontend/app/stripe.css') }}">
    <style>
        button#submit {
            width: 100%;
        }
        .checkout-form .nice-select .list {
            width: 100%;
            height: 350px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('my-js')
    <script src="//js.stripe.com/v3/"></script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('{{env("STRIPE_KEY")}}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

        // Show a spinner on payment submission
        var loading = function(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("button").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("button").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        };

        function overBTN() {
            let spinner = document.getElementById('spinner');
            spinner.style.color = '#0d0d0d';
        }
        function outBTN() {
            let spinner = document.getElementById('spinner');
            spinner.style.color = '#ffffff';
        }
    </script>
@endsection
