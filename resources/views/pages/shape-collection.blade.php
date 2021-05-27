@extends('layouts.app')

@section('title', 'Lezada - E-commerce Store')

@section('content')
    <div class="shape-collection">
        <template>
            <!--=======  breadcrumb area =======-->

        {{--    <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100">--}}
        {{--        <div class="container">--}}
        {{--            <div class="row">--}}
        {{--                <div class="col-lg-12">--}}
        {{--                    <h1 class="breadcrumb-title">Product categories</h1>--}}

        {{--                    <!--=======  breadcrumb list  =======-->--}}

        {{--                    <ul class="breadcrumb-list">--}}
        {{--                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>--}}
        {{--                        <li class="breadcrumb-list__item"><a href="#">ELEMENTS</a></li>--}}
        {{--                        <li class="breadcrumb-list__item breadcrumb-list__item--active">PRODUCT CATEGORIES</li>--}}
        {{--                    </ul>--}}

        {{--                    <!--=======  End of breadcrumb list  =======-->--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}

        <!--=======  End of breadcrumb area =======-->

            <!--=============================================
            =            section title  container      =
            =============================================-->

            <div class="section-title-container mb-80 mt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--=======  section title  =======-->

                            <div class="section-title section-title--one text-center">
                                <h1>Sofa Shape Category</h1>
                                <p>This is where to find your satisfactory Sofa Shape</p>
                            </div>

                            <!--=======  End of section title  =======-->
                        </div>
                    </div>
                </div>
            </div>

            <!--=====  End of section title container ======-->

            <!--=======  product category container one  =======-->

            <div class="product-category-container mb-100 mb-md-90 mb-sm-90">
                <div class="container wide">
                    <div class="row">
                        @if (count($shapes) > 0)
                            @foreach($shapes as $shape)
                                <div class="col-lg-3 col-md-6 col-12" id="shape_{{ $shape->id }}" @click="getShape($event)">
                                    <!--=======  single category  =======-->

                                    <div class="single-category single-category--one wow zoomIn">
                                        <!--=======  single category image  =======-->

                                        <div class="single-category__image single-category__image--one">
                                            <img src="{{ asset($shape->image_id ? $shape->photo->small : 'uploads/default/no-image.png' ) }}" class="img-fluid" alt="{{ $shape->name }}">
                                        </div>

                                        <!--=======  End of single category image  =======-->

                                        <!--=======  single category content  =======-->

                                        <div class="single-category__content single-category__content--one mt-25 mb-25">
                                            <div class="title">
                                                <p>{{ $shape->name }}</p>
                                                <a>+ Select Shape</a>
                                            </div>

                                            <p class="product-count">
                                                <div class="icon-collection d-none-my" id="icon_{{ $shape->id }}">
                                                    <i class="ti-check"></i>
                                                </div>
                                            </p>
                                        </div>

                                        <!--=======  End of single category content  =======-->

                                        <!--=======  banner-link  =======-->

                                        <a class="banner-link"></a>

                                        <!--=======  End of banner-link  =======-->
                                    </div>

                                    <!--=======  End of single category  =======-->

                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="no-shape">
                                    <h3>No More Shape Avaiable</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--=======  End of product category container one  =======-->

            <div class="product-category-container btn--container mb-20 mb-md-20 mb-sm-20">
                <div class="container wide">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="left-btn">
                                <a href="{{ route('front.home') }}" class="lezada-button lezada-button--large lezada-button--icon lezada-button--icon--left"> <i class="ti-angle-double-left"></i> BACK</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="right-btn text-right">
                                <button class="lezada-button lezada-button--large lezada-button--icon lezada-button--icon--right" disabled style="opacity: 0.5; cursor: none;"> NEXT <i class="ti-angle-double-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection

@section('my-css')
    <style>
        .product-category-container.btn--container {
            position: fixed;
            width: 100%;
            bottom: -20px;
            background: #ebebeb;
            padding-top: 25px;
            padding-bottom: 25px;
            z-index: 100;
        }
        .single-category__image img {
            width: 100%;
            -webkit-transition: 0.8s;
            -o-transition: 0.8s;
            transition: 0.8s;
            height: 200px;
        }
        .single-category.single-category--one.wow.zoomIn {
            border: 1px solid #7a7777;
            border-radius: 25px;
        }
        .single-category__content.single-category__content--one.mt-25.mb-25 {
            padding: 0px 12px 0px 10px;
        }

        .shape--box {
            transform: scale(1.1);
            transition: transform .5s;
        }
        .icon-collection {
            text-align: center;
            margin-top: 5px;
        }
        .icon-collection i {
            background: black;
            padding: 5px;
            color: white;
            font-size: 25px;
            font-weight: 900;
            border-radius: 50px;
        }
        .d-none-my {
            display: none;
        }
        .selected--box {
            box-shadow: -1px 6px 22px 3px rgba(0,0,0,0.75);
            -webkit-box-shadow: -1px 6px 22px 3px rgba(0,0,0,0.75);
            -moz-box-shadow: -1px 6px 22px 3px rgba(0,0,0,0.75);
        }
    </style>
@endsection
