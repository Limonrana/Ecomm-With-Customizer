@extends('layouts.app')

@section('title', 'Lezada - E-commerce Store')

@section('content')
    <!--=============================================
    =            slider area         =
    =============================================-->

    <div class="slider-area mb-30">
        <!--=======  slider-wrapper  =======-->

        <div class="lezada-slick-slider lezada-slick-slider--fullscreen" data-slick-setting='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "arrows": true,
            "dots": true,
            "autoplay": false,
            "autoplaySpeed": 5000,
            "speed": 1000,
            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
        }'>


            <!--=======  single slider  =======-->
            <div class="lezada-single-slider bg-img" data-bg="{{ asset('frontend/images/decor-two/slider-1.jpg') }}">
                <div class="container h-100">
                    <div class="row text-center justify-content-center align-items-center h-100">
                        <div class="lezada-single-slider__content">
                            <h5 class="subtitle">INDOOR</h5>
                            <h2 class="main-title">UP TO <br> 30% OFF </h2>
                            <a href="{{ route('front.collection') }}" class="lezada-button lezada-button--medium">shop now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--=======  End of single slider  =======-->

            <!--=======  single slider  =======-->
            <div class="lezada-single-slider bg-img" data-bg="{{ asset('frontend/images/decor-two/slider-2.jpg') }}">
                <div class="container h-100">
                    <div class="row text-center justify-content-center align-items-center h-100">
                        <div class="lezada-single-slider__content">
                            <h5 class="subtitle subtitle--black">INDOOR</h5>
                            <h2 class="main-title main-title--black">UP TO <br> 30% OFF </h2>
                            <a href="{{ route('front.collection') }}" class="lezada-button lezada-button--dark lezada-button--medium">shop
                                now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--=======  End of single slider  =======-->


        </div>

        <!--=======  End of slider-wrapper  =======-->
    </div>

    <!--=====  End of slider area  ======-->


    <!--=============================================
    =            product category container two         =
    =============================================-->

    <div class="product-category-container mb-90 mb-md-70 mb-sm-55 overflow-hidden">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product category wrapper  =======-->

                    <div class="lezada-slick-slider product-category-slider" data-slick-setting='{
						"slidesToShow": 3,
						"arrows": true,
						"autoplay": true,
						"autoplaySpeed": 5000,
						"speed": 1000,
						"prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-thin-left" },
						"nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-thin-right" }
					}' data-slick-responsive='[
						{"breakpoint":1501, "settings": {"slidesToShow": 3} },
						{"breakpoint":1199, "settings": {"slidesToShow": 3} },
						{"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false} },
						{"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
						{"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
						{"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
					]'>

                        <div class="col">
                            <!--=======  single category  =======-->

                            <div class="single-category single-category--two">
                                <!--=======  single category image  =======-->

                                <div class="single-category__image single-category__image--two">
                                    <img src="{{ asset('frontend/images/decor-two/banner-1.jpg') }}" class="img-fluid" alt="">
                                </div>

                                <!--=======  End of single category image  =======-->

                                <!--=======  single category content  =======-->

                                <div class="single-category__content single-category__content--two mt-25">
                                    <div class="title">
                                        <a href="shop-left-sidebar.html">Sale</a>
                                    </div>

                                    <p class="product-count">8</p>
                                </div>

                                <!--=======  End of single category content  =======-->


                                <!--=======  banner-link  =======-->

                                <a href="shop-left-sidebar.html" class="banner-link"></a>

                                <!--=======  End of banner-link  =======-->
                            </div>

                            <!--=======  End of single category  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single category  =======-->

                            <div class="single-category single-category--two">
                                <!--=======  single category image  =======-->

                                <div class="single-category__image single-category__image--two">
                                    <img src="{{ asset('frontend/images/decor-two/banner-2.jpg') }}" class="img-fluid" alt="">
                                </div>

                                <!--=======  End of single category image  =======-->

                                <!--=======  single category content  =======-->

                                <div class="single-category__content single-category__content--two mt-25">
                                    <div class="title">
                                        <a href="shop-left-sidebar.html">New</a>
                                    </div>

                                    <p class="product-count">6</p>
                                </div>

                                <!--=======  End of single category content  =======-->


                                <!--=======  banner-link  =======-->

                                <a href="shop-left-sidebar.html" class="banner-link"></a>

                                <!--=======  End of banner-link  =======-->
                            </div>

                            <!--=======  End of single category  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single category  =======-->

                            <div class="single-category single-category--two">
                                <!--=======  single category image  =======-->

                                <div class="single-category__image single-category__image--two">
                                    <img src="{{ asset('frontend/images/decor-two/banner-3.jpg') }}" class="img-fluid" alt="">
                                </div>

                                <!--=======  End of single category image  =======-->

                                <!--=======  single category content  =======-->

                                <div class="single-category__content single-category__content--two mt-25">
                                    <div class="title">
                                        <a href="shop-left-sidebar.html">Sale</a>
                                    </div>

                                    <p class="product-count">10</p>
                                </div>

                                <!--=======  End of single category content  =======-->


                                <!--=======  banner-link  =======-->

                                <a href="shop-left-sidebar.html" class="banner-link"></a>

                                <!--=======  End of banner-link  =======-->
                            </div>

                            <!--=======  End of single category  =======-->
                        </div>

                        <div class="col">
                            <!--=======  single category  =======-->

                            <div class="single-category single-category--two">
                                <!--=======  single category image  =======-->

                                <div class="single-category__image single-category__image--two">
                                    <img src="{{ asset('frontend/images/decor-two/banner-4.jpg') }}" class="img-fluid" alt="">
                                </div>

                                <!--=======  End of single category image  =======-->

                                <!--=======  single category content  =======-->

                                <div class="single-category__content single-category__content--two mt-25">
                                    <div class="title">
                                        <a href="shop-left-sidebar.html">New</a>
                                    </div>

                                    <p class="product-count">12</p>
                                </div>

                                <!--=======  End of single category content  =======-->


                                <!--=======  banner-link  =======-->

                                <a href="shop-left-sidebar.html" class="banner-link"></a>

                                <!--=======  End of banner-link  =======-->
                            </div>

                            <!--=======  End of single category  =======-->
                        </div>


                    </div>

                    <!--=======  End of product category wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of product category container two  ======-->


    <!--=============================================
    =            section title  container      =
    =============================================-->

    <div class="section-title-container mb-80 mb-md-60 mb-sm-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title section-title--one text-center">
                        <h1>Best Products</h1>
                        <p class="subtitle subtitle--deep subtitle--trending-home">Find your style. Decorate your world.</p>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of section title container ======-->

    <!--=============================================
    =            product carousel container         =
    =============================================-->

    <div class="product-carousel-container mb-70 mb-md-50 mb-sm-30">
        <div class="container wide">
            <div class="row column-five">

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-1.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-2.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                                <span class="hot">hot</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>

                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>

                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>


                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="single-product__variations">
                                <div class="size-container mb-5">
                                    <span class="size">L</span>
                                    <span class="size">M</span>
                                    <span class="size">S</span>
                                    <span class="size">XS</span>
                                </div>
                                <div class="color-container">
                                    <span class="black"></span>
                                    <span class="blue"></span>
                                    <span class="yellow"></span>
                                </div>
                                <!-- <a href="#" class="clear-link">clear</a> -->
                            </div>
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product one</a></h3>
                                <a href="#">Select options</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$160.00</span>
                                <span class="discounted-price">$180.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-3.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-4.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product two</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price">$130.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-5.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-6.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="hot">hot</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product three</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$260.00</span>
                                <span class="discounted-price">$230.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-7.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-8.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product four</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$120.00</span>
                                <span class="discounted-price">$100.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-9.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-5%</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product five</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$100.00</span>
                                <span class="discounted-price">$80.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-10.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                                <span class="hot">hot</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>

                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>

                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>


                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="single-product__variations">
                                <div class="size-container mb-5">
                                    <span class="size">L</span>
                                    <span class="size">M</span>
                                    <span class="size">S</span>
                                    <span class="size">XS</span>
                                </div>
                                <div class="color-container">
                                    <span class="black"></span>
                                    <span class="blue"></span>
                                    <span class="yellow"></span>
                                </div>
                                <!-- <a href="#" class="clear-link">clear</a> -->
                            </div>
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product six</a></h3>
                                <a href="#">Select options</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$160.00</span>
                                <span class="discounted-price">$180.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-11.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product seven</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price">$130.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-12.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-13.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="hot">hot</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product eight</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$260.00</span>
                                <span class="discounted-price">$230.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-14.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-15.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-5%</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product nine</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$100.00</span>
                                <span class="discounted-price">$80.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-16.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-17.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html"> Demo product ten</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$120.00</span>
                                <span class="discounted-price">$100.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-18.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-19.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                                <span class="hot">hot</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>

                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>

                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>


                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="single-product__variations">
                                <div class="size-container mb-5">
                                    <span class="size">L</span>
                                    <span class="size">M</span>
                                    <span class="size">S</span>
                                    <span class="size">XS</span>
                                </div>
                                <div class="color-container">
                                    <span class="black"></span>
                                    <span class="blue"></span>
                                    <span class="yellow"></span>
                                </div>
                                <!-- <a href="#" class="clear-link">clear</a> -->
                            </div>
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product one</a></h3>
                                <a href="#">Select options</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$160.00</span>
                                <span class="discounted-price">$180.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-20.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-1.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product two</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price">$130.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-2.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-3.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="hot">hot</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product three</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$260.00</span>
                                <span class="discounted-price">$230.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-4.jpg') }}" class="img-fluid" alt="">
                                <img src="{{ asset('frontend/images/decor-two/product-5.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product four</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$120.00</span>
                                <span class="discounted-price">$100.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->

                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->

                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('frontend/images/decor-two/product-5.jpg') }}" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-5%</span>
                            </div>

                            <div class="single-product__floating-icons">
								<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                                          data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                          data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-android-favorite-outline"></i></a></span>
                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                                         data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-shuffle-strong"></i></a></span>
                                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                            class="ion-ios-search-strong"></i></a></span>
                            </div>
                        </div>

                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->

                        <div class="single-product__content">
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product five</a></h3>
                                <a href="#">Add to cart</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$100.00</span>
                                <span class="discounted-price">$80.00</span>
                            </div>
                        </div>

                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->


            </div>

            <div class="row">
                <div class="col-lg-12 text-center mb-25 mt-30 mt-sm-20">
                    <a class="lezada-loadmore-button" href="#"><i class="ion-ios-plus-empty"></i> LOAD MORE ...</a>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of product carousel container  ======-->


    <!--=============================================
    =            section title  container      =
    =============================================-->

    <div class="section-title-container mb-80 mb-md-60 mb-sm-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title section-title--one text-center">
                        <h1><a href="https://www.instagram.com/lezada_shop/">@lezada_shop</a></h1>
                        <p class="subtitle subtitle--deep subtitle--trending-home">Follow us on instagram</p>

                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of section title container ======-->

    <!--=============================================
    =            instagram image slider         =
    =============================================-->

    <div class="instagram-image-slider-area mb-50 mb-md-70">

        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  instagram image container  =======-->

                    <div class="instagram-image-slider-container">
                        <div class="instagram-feed-thumb">
                            <div id="instagramFeedTwo" class="instagram-carousel-type2">
                            </div>
                        </div>
                    </div>

                    <!--=======  End of instagram image container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of instagram image slider  ======-->
@endsection
