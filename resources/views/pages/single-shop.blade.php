@extends('layouts.app')

@section('title', 'Shop - E-commerce Store')

@section('content')
    <div class="single--product">
        <template>
            <div class="product--single" style="display: none;">
                <!--=======  breadcrumb area =======-->

                <div class="breadcrumb-area pt-15 pb-10 pl-30">
                    <div class="container-wide">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--=======  breadcrumb list  =======-->

                                <ul class="breadcrumb-list">
                                    <li class="breadcrumb-list__item">
                                        <a href="{{ route('front.home') }}">HOME</a>
                                    </li>
                                    <li class="breadcrumb-list__item">
                                        <a href="{{ route('front.collection') }}">{{ $single->category->name }}</a>
                                    </li>
                                    <li class="breadcrumb-list__item breadcrumb-list__item--active">
                                        {{ $single->title }}
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

                <div class="shop-page-wrapper mt-20 mb-100">
                    <div class="container-wide">
                        <div class="row">
                            <div class="col-lg-12">
                                <!--=======  shop product content  =======-->

                                <div class="shop-product">
                                    <div class="row pb-100">
                                        <div class="col-lg-9 mb-md-70 mb-sm-70 pl-30">
                                            <!--=======  shop product big image gallery  =======-->
                                            <div class="shop-product__big-image-gallery-wrapper mb-30">
                                                <!--=======  single image  =======-->
                                                <div class="single-image">
                                                    <div id="container3d">
                                                        <!--=======  shop product big image gallery  =======-->
                                                        <!--=======  shop product big image gallery  =======-->
                                                        <!--=======  shop product big image gallery  =======-->
                                                        <!--=======  shop product big image gallery  =======-->
                                                        <!--=======  shop product big image gallery  =======-->
                                                    </div>
                                                    {{--                                                <div class="loadingContent" id="loadingContent">--}}
                                                    {{--                                                    <span style="margin-bottom: 15px">Loading Model</span>--}}
                                                    {{--                                                    <div class="loading">--}}
                                                    {{--                                                        <div id="loadingBar" class="barBlue"></div>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                </div>
                                                <!--=======  End of single image  =======-->
                                            </div>
                                            <!--=======  End of shop product big image gallery  =======-->
                                        </div>

                                        <div class="col-lg-3">
                                            <!--=======  shop product description  =======-->

                                            <div class="shop-product__description">
                                                <!--=======  shop product navigation  =======-->

                                            {{--                                    <div class="shop-product__navigation">--}}
                                            {{--                                        <a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-left"></i></a>--}}
                                            {{--                                        <a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-right"></i></a>--}}
                                            {{--                                    </div>--}}

                                            <!--=======  End of shop product navigation  =======-->

                                                <!--=======  shop product title  =======-->

                                                <div class="shop-product__title mb-15">
                                                    <h2>{{ $single->title }}</h2>
                                                </div>

                                                <!--=======  End of shop product title  =======-->

                                                <div class="part my-4">
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <a class="my-btn-part collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                                        Base <span class="text-right part-icon"><i class="fa fa-angle-down rotate-icon"></i></span>
                                                                    </a>
                                                                </h2>
                                                            </div>

                                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <!--=======  shop product color block  =======-->
                                                                    @foreach($single->attribute as $att)
                                                                        @if(count($att->variants) > 0)
                                                                            <div class="shop-product__block--color mb-20">
                                                                                <div class="shop-product__block__title">{{ $att->name }}: </div>
                                                                                <div class="shop-product__block__value">
                                                                                    <div class="shop-product-color-list">

                                                                                        <ul class="single-filter-widget--list single-filter-widget--list--color">
                                                                                            @foreach($att->variants as $val)
                                                                                                <li class="mb-0 pt-5 pb-5 mr-10" @click="getMate({{ $val->id }})">
                                                                                                    <a class="active"  onclick="changeMaterialDynamic('{{ $val->material_code }}', 'base-base_001')">
                                                                                                        <span class="color-picker" style="background: {{ $val->material_color }};"></span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                    <!--=======  End of shop product color block  =======-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-header" id="headingTwo">

                                                                <h2 class="mb-0">
                                                                    <a class="my-btn-part collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Seat <span class="text-right part-icon"><i class="fa fa-angle-down rotate-icon"></i></span>
                                                                    </a>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <!--=======  shop product color block  =======-->
                                                                    @foreach($single->attribute as $att)
                                                                        @if(count($att->variants) > 0)
                                                                            <div class="shop-product__block--color mb-20">
                                                                                <div class="shop-product__block__title">{{ $att->name }}: </div>
                                                                                <div class="shop-product__block__value">
                                                                                    <div class="shop-product-color-list">

                                                                                        <ul class="single-filter-widget--list single-filter-widget--list--color">
                                                                                            @foreach($att->variants as $val)
                                                                                                <li class="mb-0 pt-5 pb-5 mr-10">
                                                                                                    <a class="active"  onclick="changeMaterialDynamic('{{ $val->material_code }}', 'Seat-Seat_001')">
                                                                                                        <span class="color-picker" style="background: {{ $val->material_color }};"></span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    @endif
                                                                @endforeach
                                                                <!--=======  End of shop product color block  =======-->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-header" id="headingThree">

                                                                <h2 class="mb-0">
                                                                    <a class="my-btn-part collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Small Coussins <span class="text-right part-icon" style="margin-left: 60%;"><i class="fa fa-angle-down rotate-icon"></i></span>
                                                                    </a>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <!--=======  shop product color block  =======-->
                                                                    @foreach($single->attribute as $att)
                                                                        @if(count($att->variants) > 0)
                                                                            <div class="shop-product__block--color mb-20">
                                                                                <div class="shop-product__block__title">{{ $att->name }}: </div>
                                                                                <div class="shop-product__block__value">
                                                                                    <div class="shop-product-color-list">

                                                                                        <ul class="single-filter-widget--list single-filter-widget--list--color">
                                                                                            @foreach($att->variants as $val)
                                                                                                <li class="mb-0 pt-5 pb-5 mr-10">
                                                                                                    <a class="active" onclick="changeMaterialDynamic('{{ $val->material_code }}', 'Cube_001-Cube_003')">
                                                                                                        <span class="color-picker" style="background: {{ $val->material_color }};"></span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    @endif
                                                                @endforeach
                                                                <!--=======  End of shop product color block  =======-->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">
                                                            <div class="card-header" id="headingFour">

                                                                <h2 class="mb-0">
                                                                    <a class="my-btn-part collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                        Main Coussins <span class="text-right part-icon" style="margin-left: 62%;"><i class="fa fa-angle-down rotate-icon"></i></span>
                                                                    </a>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <!--=======  shop product color block  =======-->
                                                                    @foreach($single->attribute as $att)
                                                                        @if(count($att->variants) > 0)
                                                                            <div class="shop-product__block--color mb-20">
                                                                                <div class="shop-product__block__title">{{ $att->name }}: </div>
                                                                                <div class="shop-product__block__value">
                                                                                    <div class="shop-product-color-list">

                                                                                        <ul class="single-filter-widget--list single-filter-widget--list--color">
                                                                                            @foreach($att->variants as $val)
                                                                                                <li class="mb-0 pt-5 pb-5 mr-10">
                                                                                                    <a class="active" onclick="changeMaterialDynamic('{{ $val->material_code }}', 'Cube_002')">
                                                                                                        <span class="color-picker" style="background: {{ $val->material_color }};" ></span>
                                                                                                    </a>
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    @endif
                                                                @endforeach
                                                                <!--=======  End of shop product color block  =======-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--=======  shop product quantity block  =======-->

                                            {{--                                        <div class="shop-product__block shop-product__block--quantity mb-40">--}}
                                            {{--                                            <div class="shop-product__block__title">Quantity: </div>--}}
                                            {{--                                            <div class="shop-product__block__value">--}}
                                            {{--                                                <div class="pro-qty d-inline-block mx-0 pt-0">--}}
                                            {{--                                                    <input type="text" value="1">--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}

                                            <!--=======  End of shop product quantity block  =======-->

                                                <!--=======  shop product buttons  =======-->

                                            {{--                                        <div class="shop-product__buttons mb-40">--}}
                                            {{--                                            <a class="lezada-button lezada-button--medium" href="#">add to cart</a>--}}
                                            {{--                                            <a class="lezada-compare-button ml-20" href="#" data-tippy="Compare" data-tippy-inertia="true"--}}
                                            {{--                                               data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-placement="left"--}}
                                            {{--                                               data-tippy-arrow="true" data-tippy-theme="sharpborder"><i class="ion-ios-shuffle"></i></a>--}}
                                            {{--                                        </div>--}}

                                            <!--=======  End of shop product buttons  =======-->

                                                <!--=======  other info table  =======-->

                                                <div class="quick-view-other-info pb-0">
                                                    <table>
                                                        <tr class="single-info">
                                                            <td class="quickview-title">SKU: </td>
                                                            <td class="quickview-value sku">{{ $single->variants[0]->sku }}</td>
                                                        </tr>
                                                        <tr class="single-info">
                                                            <td class="quickview-title">Category: </td>
                                                            <td class="quickview-value">
                                                                <a href="#">{{ $single->category->name }}</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="description pr-4 pt-10">
                                                        <h4>Fabric Description:</h4>
                                                        <p class="single-description">
                                                            {!! $single->description !!}
                                                        </p>
                                                    </div>
                                                </div>

                                                <!--=======  End of other info table  =======-->
                                            </div>

                                            <!--=======  End of shop product description  =======-->
                                        </div>
                                    </div>

                                </div>

                                <!--=======  End of shop product content  =======-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-category-container btn--container mb-20 mb-md-20 mb-sm-20">
                    <div class="container wide">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="left-btn">
                                    <button class="arrow-btn lezada-button--icon lezada-button--icon--left" @click="loadSize"> <i class="ti-angle-double-left"></i></button>
                                    <button class="text-btn lezada-button--icon lezada-button--icon--left">Main Sofa</button>
                                    <button class="arrow-btn lezada-button--icon lezada-button--icon--left" @click="loadSize"> <i class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="middle-content text-center vertical-align-middle">
                                    <div class="shop-product__price my-price">
                                        <span class="main-price discounted">$16.00</span>
                                        <span class="discounted-price">${{ number_format($single->price, 2, '.', '') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4">
                                <img src="#" class="getScreenShotImage" style="display: none;">
                                <div class="right-btn text-right">
                                    <button class="lezada-button lezada-button--large lezada-button--icon lezada-button--icon--right" @click="addToCart({{ $single->id }}, {{ $single->category_id }})"> ADD TO CART <i class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=====  End of shop page content  ======-->
            </div>
        </template>

        <template>
            <div class="sofa--size">
                <div class="shop-page-wrapper mt-100 mb-100">
                    <div class="container-wide">
                        <div class="sofa-size-area mb-100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <div class="size-form">
                                            <h2 class="text-center">Sofa Size</h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="length">Length</label>
                                                        <input type="number" class="form-control" placeholder="Length *" :v-on:change="afterFillForm" id="length" v-model="getLength" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="width">Width</label>
                                                        <input type="number" class="form-control" placeholder="Width *" id="width" :v-on:change="afterFillForm" v-model="getWidth" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="height">Height</label>
                                                        <input type="number" class="form-control" placeholder="Height *" :v-on:change="afterFillForm" id="height" v-model="getHeight" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-category-container btn--container mb-20 mb-md-20 mb-sm-20">
                    <div class="container wide">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="left-btn">
                                    <a href="{{ route('front.shop', $single->category_id) }}" class="lezada-button lezada-button--large lezada-button--icon lezada-button--icon--left"> <i class="ti-angle-double-left"></i> BACK</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="size-right-btn text-right">
                                    <button id="sizeFillBTN" class="lezada-button lezada-button--large lezada-button--icon lezada-button--icon--right" disabled style="opacity: 0.5; cursor: none;" @click="loadProduct"> NEXT <i class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection

@section('my-js')
    <script src="{{ $single->script_code }}"></script>
    <script>
        var options = {
            distID: "{{ $single->distID }}",
            solution3DName: "{{ $single->solution3DName }}",
            projectName: "{{ $single->projectName }}",
            solution3DID: "{{ $single->solution3DID }}",
            containerID: "container3d",
            // onPointerClick: function (e) {
            //     const convertArrayToObject = e.map((getPart) => getPart.shortName);
            //     getMateial(convertArrayToObject);
            // },
            // onLoadingChanged: function (loading) {
            //     //loadingBar.style.width = loading.progress + "%";
            //     Unlimited3D.getAvailableParts(function(error, result) { console.log(result); });
            // },
        };
    </script>
    <script src="{{ asset('frontend/app/front-end.js') }}"></script>
@endsection

@section('my-css')
    <style>
        body {
            overflow-x: hidden;
        }
        .product-category-container.btn--container {
            position: fixed;
            width: 100%;
            bottom: -20px;
            background: #ebebeb;
            padding-top: 15px;
            padding-bottom: 15px;
            z-index: 100;
        }

        .shop-product__price.my-price {
            padding-top: 3%;
        }
        .shop-product__price .main-price.discounted {
            font-size: 26px !important;
            margin-right: 10px;
            text-decoration: line-through;
            color: #aaa;
        }
        .shop-product__price .discounted-price {
            font-size: 26px !important;
            font-weight: 600;
            line-height: 28px;
            color: #333;
        }

        .shop-product .shop-product__big-image-gallery-wrapper {
            position: fixed;
            cursor: crosshair;
            z-index: 100;
            border: 1px solid #e6e2e2;
            border-radius: 10px;
            width: 74% !important;
        }

        canvas {
            height: 75vh !important;
            /*-webkit-box-shadow: 3px 7px 35px 0px rgba(0, 0, 0, 0.92);*/
            /*-moz-box-shadow: 3px 7px 35px 0px rgba(0, 0, 0, 0.92);*/
            /*box-shadow: 3px 7px 35px 0px rgba(0, 0, 0, 0.92);*/
            cursor: pointer;
        }

        .loadingContent {
            text-align: center;
            font-size: 1.4rem;
            font-weight: 600;
            color: #b1b1b1;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .loading {
            width: 270px;
            height: 8px;
            border-radius: 6.5px;
            background-color: #fff;
            margin-bottom: 11px;
        }

        .loading .barBlue {
            position: absolute;
            height: 8px;
            width: 0;
            border-radius: 6.5px;
            background-color: #4a90e2;
        }

        .part.my-4 {
            width: 95%;
        }
        .card-header {
            padding: .50rem 0.25rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        .card-body {
            padding: 0.75rem;
        }

        a.my-btn-part {
            font-size: 18px;
            padding-left: 12px;
            width: 100%;
        }
        span.text-right.part-icon {
            margin-left: 83%;
        }

        .form-control {
            padding: 1.375rem .75rem;
            border: 1px solid #8b8d8e;
        }
        button.arrow-btn.lezada-button--icon.lezada-button--icon--left {
            border: none;
            font-size: 28px;
            font-weight: 900;
            margin-top: 3%;
        }
        button.text-btn.lezada-button--icon.lezada-button--icon--left {
            border: none;
            font-size: 20px;
        }
    </style>
@endsection
