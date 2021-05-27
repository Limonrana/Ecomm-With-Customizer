@extends('admin.layouts.app')

@section('title', 'Add Variations | E-commerce Store')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">DashBoard > Variations > Add New</h6>
                </div>
                <div class="col-sm-auto">
                    <a class="text-600" href="{{ route('home') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="DashBoard"><svg class="svg-inline--fa fa-th fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"></path></svg><!-- <span class="fas fa-th"></span> --></a>
                </div>
            </div>
        </div>
    </div>

    <div class="product">
        <div class="row no-gutters">
            <div class="fancy-tab">
                <div class="nav-bar nav-bar-center">
                    <div class="nav-bar-item px-3 px-sm-4 active">Variant</div>
                    <div class="nav-bar-item px-3 px-sm-4">Product</div>
                </div>
                <div class="tab-contents">
                    <div class="tab-content active">
                        <form action="{{ route('variant.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Add New Variant</h5>
                                </div>
                                <div class="card-body bg-light">
                                    <div class="collapse" id="add-product">
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="attribute_id">Attribute Name</label>
                                                            <select name="attribute_id" class="form-control @error('attribute_id') is-invalid @enderror" id="attribute_id" required>
                                                                <option selected>Choose..</option>
                                                                @foreach($product->attribute as $val)
                                                                    <option value="{{ $val->id }}">
                                                                        {{ $val->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('attribute_id')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="value">Variant Value</label>
                                                        <input type="text" id="value" class="form-control @error('value') is-invalid @enderror" name="value" placeholder="Red OR XL" required>
                                                        @error('value')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="sku">Variant SKU</label>
                                                        <input type="text" id="sku" class="form-control" name="sku" placeholder="SK-1234">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="price">Variant Price</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input class="form-control" type="number" id="price" name="price" placeholder="200">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="stock">Variant Stock</label>
                                                        <input type="number" id="stock" class="form-control @error('stock') is-invalid @enderror" name="stock" placeholder="25">
                                                        @error('stock')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="attribute_id">Cushion Option</label>
                                                        <select name="cushion_option" class="form-control @error('cushion_option') is-invalid @enderror" id="cushion_option" required>
                                                            <option selected>Choose..</option>
                                                            <option value="0">Yes</option>
                                                            <option value="1">No</option>
                                                        </select>
                                                        @error('cushion_option')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="attribute_id">Lateral Band Option</label>
                                                        <select name="lateral_option" class="form-control @error('lateral_option') is-invalid @enderror" id="lateral_option" required>
                                                            <option selected>Choose..</option>
                                                            <option value="0">Yes</option>
                                                            <option value="1">No</option>
                                                        </select>
                                                        @error('lateral_option')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="attribute_id">Central Band Option</label>
                                                        <select name="central_option" class="form-control @error('central_option') is-invalid @enderror" id="central_option" required>
                                                            <option selected>Choose..</option>
                                                            <option value="0">Yes</option>
                                                            <option value="1">No</option>
                                                        </select>
                                                        @error('central_option')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="mytextarea">Description</label>
                                                        <textarea id="mytextarea" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="image">Fabric Image</label>
                                                    <div class="custom-file">
                                                        <input class="custom-file-input" id="customFile" type="file">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="image">Fabric Care</label>
                                                    <div class="custom-file">
                                                        <input class="custom-file-input" id="customFile" type="file">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-right mt-3">
                                                    <button class="btn btn-falcon-default btn-md mt-2" type="submit"><span class="fas fa-plus fs--2 mr-1" data-fa-transform="up-1"></span> Add Item</button>
                                                    <button class="btn btn-outline-danger btn-md mt-2" type="button" id="variant_close">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add_variant_section text-center" id="add_variantBTN_section">
                                        <div class="variant_btn_section">
                                            <h5 class="mb-3">Please click bellow button add new variant for this product.</h5>
                                            <a class="mb-4 btn btn-falcon-default btn-md" id="add_variant" href="#add-product" data-toggle="collapse" aria-expanded="false" aria-controls="add-product">
                                                <span class="fas fa-plus"></span> <span> Add New Variant</span>
                                            </a>
                                        </div>
                                    </div>
                                    {{--                        <div id="main-container">--}}
                                    {{--                            <div class="container-item">--}}
                                    {{--                                <div class="row">--}}
                                    {{--                                    <div class="col-sm-4">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label class="control-label" for="address_line_one_0">Variant Value</label>--}}
                                    {{--                                            <input type="text" id="address_line_one_0" class="form-control" name="value[]" maxlength="255" required>--}}
                                    {{--                                            <p class="help-block help-block-error"></p>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="col-sm-4">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label class="control-label" for="address_line_two_0">Address line 2</label>--}}
                                    {{--                                            <input type="text" id="address_line_two_0" class="form-control" name="Address[]" maxlength="255">--}}
                                    {{--                                            <p class="help-block help-block-error"></p>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}

                                    {{--                                <div class="row text-right">--}}
                                    {{--                                    <div class="col-sm-12">--}}
                                    {{--                                        <div>--}}
                                    {{--                                            <a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger remove-social-media">Remove</a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                            </div>--}}
                                    {{--                        </div>--}}

                                    {{--                        <div class="mt-3">--}}
                                    {{--                            <a class="btn btn-success btn-sm" id="add-more" href="javascript:;" role="button"><i class="fa fa-plus"></i> Add more address</a>--}}
                                    {{--                        </div>--}}
                                </div>
                            </div>
                        </form>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="mb-0">Variant List</h5>
                            </div>
                            <div class="card-body bg-light">
                                @forelse($product->variants as $val)
                                    <form action="{{ route('variant.update', $val->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-1 lrs-col-1">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="attribute_id">Name</label>
                                                        <input type="text" id="attribute_id" class="form-control" name="attribute_id" value="{{ $val->attributes->name }}" readonly>
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 lrs-col-1">
                                                <div class="form-group">
                                                    <label for="value">Variant Value</label>
                                                    <input type="text" id="value" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ $val->value }}" placeholder="Red OR XL">
                                                    @error('value')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="sku">Variant SKU</label>
                                                    <input type="text" id="sku" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ $val->sku }}" placeholder="SK-1234">
                                                    @error('sku')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="price">Variant Price</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input class="form-control" type="number" id="price" name="price" value="{{ $val->price ? $val->price : $product->price }}" placeholder="200">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="stock">Variant Stock</label>
                                                    <input type="number" id="stock" class="form-control" name="stock" value="{{ $val->stock }}" placeholder="25">
                                                </div>
                                            </div>
                                            <div class="col-md-3 lrs-md-3 text-right" style="margin-top: 2%;">
                                                <button class="btn btn-success btn-md mt-2" type="submit">
                                                    Save
                                                </button>
                                                <a href="{{ route('variant.edit.all', [$product->id, $val->id]) }}" class="btn btn-falcon-default btn-md mt-2">
                                                    Edit
                                                </a>
                                                <a href="{{ route('variant.edit.all', [$product->id, $val->id]) }}" class="btn btn-outline-danger btn-md mt-2">
                                                    Remove
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                @empty
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/illustrations/4.png') }}" alt=""></div>
                                        <div class="col-lg-6 pl-lg-4 my-5 text-center text-lg-left">
                                            <h3>No More Variant Here!</h3>
                                            <p class="lead">Create a New Variant and Start Something Beautiful.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-img-top"><img class="img-fluid" src="{{ asset($product->photo->large) }}" alt="{{ $product->title }}"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{!! $product->description !!}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Category: <span class="badge badge-success">{{ $product->category->name }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Attribute:
                                                @foreach($product->attribute as $val)
                                                    <span class="badge badge-success">{{ $val->name }}</span>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="card-text"><small class="text-muted">
                                        Modified: {{ $product->updated_at ? $product->updated_at->diffForHumans() : $val->created_at->diffForHumans() }}
                                    </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="col-lg-8 pr-lg-2">--}}

{{--            </div>--}}
{{--            <div class="col-lg-4 pl-lg-2">--}}
{{--                <div class="sticky-top sticky-sidebar">--}}

{{--                    --}}

{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection

@section('admin-css')
{{--    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />--}}
    <style>
        .lrs-col-1 {
            flex: 0 0 14.33333%;
            max-width: 14.33333%;
        }
        .lrs-md-3 {
            flex: 0 0 20%;
            max-width: 20%;
        }

        @media screen and (min-device-width: 1441px) and (max-device-width: 1670px) {
            .lrs-col-1 {
                flex: 0 0 12.33333%;
                max-width: 12.33333%;
            }
            .lrs-md-3 {
                flex: 0 0 23%;
                max-width: 23%;
            }
        }

        @media screen and (min-device-width: 1080px) and (max-device-width: 1440px) {
            .lrs-col-1 {
                flex: 0 0 11.33333%;
                max-width: 11.33333%;
            }
            .lrs-md-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }
        }
    </style>
@endsection

@section('admin-js')
    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/plugins/piexif.min.js" type="text/javascript"></script>--}}
{{--    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.--}}
{{--        This must be loaded before fileinput.min.js -->--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/plugins/sortable.min.js" type="text/javascript"></script>--}}
{{--    <!-- the main fileinput plugin file -->--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.min.js"></script>--}}
{{--    <!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fa/theme.js"></script>--}}

    <script>
        $('a#add-more').cloneData({
            mainContainerId: 'main-container', // Main container Should be ID
            cloneContainer: 'container-item', // Which you want to clone
            removeButtonClass: 'remove-item', // Remove button for remove cloned HTML
            removeConfirm: true, // default true confirm before delete clone item
            removeConfirmMessage: 'Are you sure want to delete?', // confirm delete message
            //append: '<a href="javascript:void(0)" class="remove-item btn btn-sm btn-danger remove-social-media">Remove</a>', // Set extra HTML append to clone HTML
            minLimit: 1, // Default 1 set minimum clone HTML required
            maxLimit: 300, // Default unlimited or set maximum limit of clone HTML
            defaultRender: 1,
            init: function () {
                console.info(':: Initialize Plugin ::');
            },
            beforeRender: function () {
                //console.info(':: Before rendered callback called');
            },
            afterRender: function () {
                //console.info(':: After rendered callback called');
                //$(".selectpicker").selectpicker('refresh');
            },
            afterRemove: function () {
                //console.warn(':: After remove callback called');
            },
            beforeRemove: function () {
                //console.warn(':: Before remove callback called');
            }

        });
    </script>

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $("#input-44").fileinput({--}}
{{--                showUpload: false,--}}
{{--                allowedFileExtensions: ["jpg", "gif", "png", "jpeg"],--}}
{{--                maxFilePreviewSize: 10240,--}}
{{--                fileActionSettings: {--}}
{{--                            showRemove: true,--}}
{{--                            showUpload: false, // will be always false for resumable uploads--}}
{{--                            showDownload: true,--}}
{{--                            showZoom: true,--}}
{{--                            showDrag: true,--}}
{{--                            removeIcon: '<i class="far fa-trash-alt"></i>',--}}
{{--                            uploadIcon: '<i class="fas fa-cloud-upload-alt"></i>',--}}
{{--                            uploadRetryIcon: '<i class="glyphicon glyphicon-repeat"></i>',--}}
{{--                            downloadIcon: '<i class="fas fa-cloud-download-alt"></i>',--}}
{{--                            zoomIcon: '<i class="fas fa-search-plus"></i>',--}}
{{--                            dragIcon: '<i class="glyphicon glyphicon-move"></i>',--}}
{{--                            indicatorNew: '<i class="glyphicon glyphicon-plus-sign text-warning"></i>',--}}
{{--                            indicatorSuccess: '<i class="glyphicon glyphicon-ok-sign text-success"></i>',--}}
{{--                            indicatorError: '<i class="glyphicon glyphicon-exclamation-sign text-danger"></i>',--}}
{{--                            indicatorLoading: '<i class="glyphicon glyphicon-hourglass text-muted"></i>',--}}
{{--                            indicatorPaused: '<i class="glyphicon glyphicon-pause text-info"></i>'--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        var add_new_variant         = document.getElementById('add_variant');
        var add_variantBTN_section  = document.getElementById('add_variantBTN_section');
        var variant_close_btn       = document.getElementById('variant_close');
        var product_variant_section = document.getElementById('add-product');
        add_new_variant.addEventListener('click', function () {
            add_variantBTN_section.style.display = "none";
        });

        variant_close_btn.addEventListener('click', function () {
            add_variantBTN_section.style.display = "block";
            product_variant_section.classList.remove("show");
        });


        // Single Delete Option Start
        function singleDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Delete Request Send
                    axios.delete('/admin/category/' + id)
                        .then(response => {
                            $("#value_"+id).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        })
                        .catch(error => {
                            toastr.warning("Opps! Something is wrong.");
                        })
                }
            })
        };
    </script>
@endsection
