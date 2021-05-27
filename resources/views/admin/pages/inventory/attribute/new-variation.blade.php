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
            <div class="col-md-12">
                <form action="{{ route('variant.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Add New Material Variant</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="collapse" id="add-product">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="attribute_id">Collection Name</label>
                                            <select name="attribute_id" class="form-control @error('attribute_id') is-invalid @enderror" id="attribute_id" readonly>
                                                <option selected value="{{ $collection->id }}">{{ $collection->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="material_value">Material Value</label>
                                        <input type="text" id="material_value" class="form-control @error('material_value') is-invalid @enderror" name="material_value" placeholder="Red OR XL" required>
                                        @error('material_value')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="material_code">Material Code</label>
                                        <input type="text" id="material_code" class="form-control @error('material_code') is-invalid @enderror" name="material_code" placeholder="Wood.01" required>
                                        @error('fabric_code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sku">Material SKU</label>
                                        <input type="text" id="sku" class="form-control" name="sku" placeholder="SK-1234">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price">Material Price</label>
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
                                        <label for="stock">Material Stock</label>
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
                                        <label for="cushion_option">Cushion Option</label>
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
                                        <label for="lateral_option">Lateral Band Option</label>
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
                                        <label for="central_option">Central Band Option</label>
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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fab_bg">Select Material BG</label>
                                        <select onchange="getFabricBG()" class="form-control" id="fab_bg">
                                            <option value="color" selected>Color (Default)</option>
                                            <option value="image">Image</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 fab_color">
                                    <div class="form-group">
                                        <label for="material_color">Material Color</label>
                                        <input type="text" id="material_color" class="form-control @error('material_color') is-invalid @enderror" name="material_color" value="#276cb8">
                                        @error('material_color')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 fab_image" style="display: none">
                                    <label for="image">Material Image</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" name="material_image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="image">Fabric Care</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" name="care_image">
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
                            <h5 class="mb-3">Please click bellow button add new variant for this collection.</h5>
                            <a class="mb-4 btn btn-falcon-default btn-md" id="add_variant" href="#add-product" data-toggle="collapse" aria-expanded="false" aria-controls="add-product">
                                <span class="fas fa-plus"></span> <span> Add New Material</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
                <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Material Variant List</h5>
            </div>
            <div class="card-body bg-light">
                @forelse($collection->variants as $val)
                    <form action="{{ route('variant.update', $val->id) }}" method="POST">
                        @csrf
                        <div class="row"  id="value_{{ $val->id }}">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="material_code">Material Code</label>
                                        <input type="text" id="material_code" class="form-control @error('material_code') is-invalid @enderror" name="material_code" value="{{ $val->material_code }}">
                                        <input type="hidden" name="attribute_id" value="{{ $collection->id }}">
                                        @error('material_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="material_value">Material Value</label>
                                    <input type="text" id="material_value" class="form-control @error('material_value') is-invalid @enderror" name="material_value" value="{{ $val->material_value }}" placeholder="Red OR XL">
                                    @error('material_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1 lrs-col-1">
                                <div class="form-group">
                                    <label for="sku">SKU</label>
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
                                    <label for="price">Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input class="form-control" type="number" id="price" name="price" value="{{ $val->price ? $val->price : $product->price }}" placeholder="200">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 lrs-col-1">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" id="stock" class="form-control" name="stock" value="{{ $val->stock }}" placeholder="25">
                                </div>
                            </div>
                            <div class="col-md-3 lrs-md-3 text-right" style="margin-top: 2%;">
                                <button class="btn btn-success btn-md mt-2" type="submit">
                                    Save
                                </button>
                                <a href="{{ route('variant.edit.all', [$collection->id, $val->id]) }}" class="btn btn-falcon-default btn-md mt-2">
                                    Edit
                                </a>
                                <button type="button" id="{{ $val->id }}" onclick="singleDelete(this.id)" class="btn btn-outline-danger btn-md mt-2">
                                    Remove
                                </button>
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
        </div>
    </div>
@endsection

@section('admin-css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
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
    <script src="//cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
    <script>
        $('#material_color').spectrum({
            type: "component",
            hideAfterPaletteSelect: "true",
            showInput: "true",
            showInitial: "true"
        });
    </script>
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

        function getFabricBG() {
            let getValue = document.querySelector('#fab_bg').value;
            if (getValue == 'color') {
                document.querySelector('.fab_image').style.display = 'none';
                document.querySelector('.fab_color').style.display = 'block';
            } else {
                document.querySelector('.fab_color').style.display = 'none';
                document.querySelector('.fab_image').style.display = 'block';
            }
        }




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
                    axios.delete('/admin/variant/' + id)
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
