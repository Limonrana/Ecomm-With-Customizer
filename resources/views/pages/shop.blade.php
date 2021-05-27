@extends('layouts.app')

@section('title', 'Shop - E-commerce Store')

@section('content')
    <!--===== End of Header offcanvas about ======-->

    <!--=======  breadcrumb area =======-->

    <div class="breadcrumb-area breadcrumb-bg-2 pt-20 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">{{ $shape->name ? $shape->name : 'Uncategorized' }}</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item">
                            <a href="{{ route('front.home') }}">HOME</a>
                        </li>
                        <li class="breadcrumb-list__item">
                            <a href="{{ route('front.collection') }}">{{ $shape->name ? strtoupper($shape->name) : strtoupper('Uncategorized') }}</a>
                        </li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">
                            PRODUCTS
                        </li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of breadcrumb area =======-->

    <!--=============================================
    =            shop page content         =
    =============================================-->

    <div class="shop-page-wrapper">
        <!--=============================================
		=            shop page content         =
		=============================================-->

        <div class="shop-page-content mb-100 pt-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1 d-none">

                        <!--=======  End of page sidebar  =======-->
                    </div>
                    <div class="col-lg-12 order-1 order-lg-2 mb-md-80 mb-sm-80">
                        <div class="row product-isotope shop-product-wrap four-column">

                            @foreach($products as $p)
                                <!--=======  single product  =======-->
                                <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 sale">
                                    <div class="single-product">
                                        <!--=======  single product image  =======-->

                                        <div class="single-product__image">
                                            <a class="image-wrap" href="{{ route('front.product', [$p->slug, $p->id]) }}">
                                                <img
                                                    src="{{ asset($p->preview_image_id ? $p->photo->large : 'frontend/images/products/watch-1-2-600x800.jpg' ) }}"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                                <img
                                                    src="{{ asset($p->preview_image_id ? $p->photo->large : 'frontend/images/products/watch-1-2-600x800.jpg' ) }}"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </a>

                                            <div class="single-product__floating-badges">
                                                <span class="onsale">-10%</span>
                                            </div>

                                            <div class="single-product__floating-icons">
                            <span class="wishlist"
                            ><a
                                    href="#"
                                    data-tippy="Add to wishlist"
                                    data-tippy-inertia="true"
                                    data-tippy-animation="shift-away"
                                    data-tippy-delay="50"
                                    data-tippy-arrow="true"
                                    data-tippy-theme="sharpborder"
                                    data-tippy-placement="left"
                                ><i class="ion-android-favorite-outline"></i></a
                                ></span>
                                                <span class="compare"
                                                ><a
                                                        href="#"
                                                        data-tippy="Compare"
                                                        data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away"
                                                        data-tippy-delay="50"
                                                        data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-tippy-placement="left"
                                                    ><i class="ion-ios-shuffle-strong"></i></a
                                                    ></span>
                                                <span class="quickview"
                                                ><a
                                                        class="cd-trigger"
                                                        href="#qv-1"
                                                        data-tippy="Quick View"
                                                        data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away"
                                                        data-tippy-delay="50"
                                                        data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-tippy-placement="left"
                                                    ><i class="ion-ios-search-strong"></i></a
                                                    ></span>
                                            </div>
                                        </div>

                                        <!--=======  End of single product image  =======-->

                                        <!--=======  single product content  =======-->

                                        <div class="single-product__content">
                                            <div class="title">
                                                <h3>
                                                    <a href="#"
                                                    >{{ $p->title }}</a
                                                    >
                                                </h3>
                                                <a href="#">Setup & Buy</a>
                                            </div>
                                            <div class="price">
                                                <span class="main-price">${{ number_format($p->price, 2, '.', '') }}</span>
                                            </div>
                                        </div>

                                        <!--=======  End of single product content  =======-->
                                    </div>
                                    <div class="single-product--list">
                                        <!--=======  single product image  =======-->

                                        <div class="single-product__image">
                                            <a class="image-wrap" href="shop-product-basic.html">
                                                <img
                                                    src="{{ asset($p->preview_image_id ? $p->photo->large : 'frontend/images/products/watch-1-2-600x800.jpg' ) }}"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                                <img
                                                    src="{{ asset($p->preview_image_id ? $p->photo->large : 'frontend/images/products/watch-1-2-600x800.jpg' ) }}"
                                                    class="img-fluid"
                                                    alt=""
                                                />
                                            </a>

                                            <div class="single-product__floating-badges">
                                                <span class="onsale">-10%</span>
                                            </div>

                                            <div class="single-product__floating-icons">
                            <span class="wishlist"
                            ><a
                                    href="#"
                                    data-tippy="Add to wishlist"
                                    data-tippy-inertia="true"
                                    data-tippy-animation="shift-away"
                                    data-tippy-delay="50"
                                    data-tippy-arrow="true"
                                    data-tippy-theme="sharpborder"
                                    data-tippy-placement="bottom"
                                ><i class="ion-android-favorite-outline"></i></a
                                ></span>

                                                <span class="compare"
                                                ><a
                                                        href="#"
                                                        data-tippy="Compare"
                                                        data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away"
                                                        data-tippy-delay="50"
                                                        data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-tippy-placement="bottom"
                                                    ><i class="ion-ios-shuffle-strong"></i></a
                                                    ></span>

                                                <span class="quickview"
                                                ><a
                                                        class="cd-trigger"
                                                        href="#qv-1"
                                                        data-tippy="Quick View"
                                                        data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away"
                                                        data-tippy-delay="50"
                                                        data-tippy-arrow="true"
                                                        data-tippy-theme="sharpborder"
                                                        data-tippy-placement="bottom"
                                                    ><i class="ion-ios-search-strong"></i></a
                                                    ></span>
                                            </div>
                                        </div>

                                        <!--=======  End of single product image  =======-->

                                        <!--=======  single product content  =======-->

                                        <div class="single-product__content">
                                            <div class="title">
                                                <h3>
                                                    <a href="shop-product-basic.html"
                                                    >{{ $p->title }}</a
                                                    >
                                                </h3>
                                            </div>
                                            <div class="price">
                                                <span class="main-price">${{ number_format($p->price, 2, '.', '') }}</span>
                                            </div>
                                            <p class="short-desc">
                                                @php
                                                    $desc = \Illuminate\Support\Str::limit($p->description, 300);
                                                @endphp
                                                {!! $desc !!}
                                            </p>

                                            <a href="#" class="lezada-button lezada-button--medium"
                                            >ADD TO CART</a
                                            >
                                        </div>

                                        <!--=======  End of single product content  =======-->
                                    </div>
                                </div>
                                <!--=======  End of single product  =======-->
                            @endforeach

                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-center mt-30">
                                <a
                                    class="lezada-button lezada-button--medium lezada-button--icon--left"
                                    href="#"
                                ><i class="ion-android-add"></i> MORE</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--=====  End of shop page content  ======-->
    </div>

    <!--=====  End of shop page content  ======-->
@endsection

@section('my-css')
    <style>
        .single-product {
            border: 1px solid #afaeae;
            padding: 0px 20px 10px 19px;
            border-radius: 20px;
            box-shadow: -2px -1px 36px 2px rgb(0 0 0 / 75%);
            -webkit-box-shadow: -2px -1px 36px 2px rgb(0 0 0 / 75%);
            -moz-box-shadow: -2px -1px 36px 2px rgba(0,0,0,0.75);
        }
    </style>
@endsection
