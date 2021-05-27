@extends('admin.layouts.app')

@section('title', 'Edit Variations | E-commerce Store')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">DashBoard > Variations > Edit</h6>
                </div>
                <div class="col-sm-auto">
                    <a class="text-600" href="{{ route('home') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="DashBoard"><svg class="svg-inline--fa fa-th fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"></path></svg><!-- <span class="fas fa-th"></span> --></a>
                </div>
            </div>
        </div>
    </div>

    <div class="edit-variant">
        <form action="{{ route('variant.update.all', $variant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row no-gutters">
                <div class="col-lg-8 pr-lg-2">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="mb-0">Edit Material Variant</h5>
                            </div>
                            <div class="card-body bg-light">
                                <div class="card-body bg-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="attribute_id">Collection Name</label>
                                                    <select name="attribute_id" class="form-control @error('attribute_id') is-invalid @enderror" id="attribute_id" readonly>
                                                        <option value="{{ $collection->id }}" selected>{{ $collection->name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="material_value">Material Value</label>
                                                <input type="text" id="material_value" class="form-control @error('material_value') is-invalid @enderror" name="material_value" value="{{ $variant->material_value }}" placeholder="Red OR XL" required>
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
                                                <input type="text" id="material_code" class="form-control @error('material_code') is-invalid @enderror" name="material_code" value="{{ $variant->material_code }}" placeholder="Red OR XL" required>
                                                @error('material_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sku">SKU</label>
                                                <input type="text" id="sku" class="form-control" name="sku" value="{{ $variant->sku }}" placeholder="SK-1234">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input class="form-control" type="number" id="price" value="{{ $variant->price }}" name="price" placeholder="200">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="stock">Stock</label>
                                                <input type="number" id="stock" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $variant->stock }}" placeholder="25">
                                                @error('stock')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="cushion_option">Cushion Option</label>
                                                    <select name="cushion_option" class="form-control @error('cushion_option') is-invalid @enderror" id="cushion_option">
                                                        <option selected>Choose..</option>
                                                        <option value="0" @if($variant->cushion_option == 0) selected @endif>Yes</option>
                                                        <option value="1" @if($variant->cushion_option == 1) selected @endif>No</option>
                                                    </select>
                                                    @error('cushion_option')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="lateral_option">Lateral Band Option</label>
                                                    <select name="lateral_option" class="form-control @error('lateral_option') is-invalid @enderror" id="lateral_option">
                                                        <option selected>Choose..</option>
                                                        <option value="0" @if($variant->lateral_option == 0) selected @endif>Yes</option>
                                                        <option value="1" @if($variant->lateral_option == 1) selected @endif>No</option>
                                                    </select>
                                                    @error('lateral_option')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="central_option">Central Band Option</label>
                                                    <select name="central_option" class="form-control @error('central_option') is-invalid @enderror" id="central_option">
                                                        <option selected>Choose..</option>
                                                        <option value="0" @if($variant->central_option == 0) selected @endif>Yes</option>
                                                        <option value="1" @if($variant->central_option == 1) selected @endif>No</option>
                                                    </select>
                                                    @error('central_option')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="mytextarea">Description</label>
                                                <textarea id="mytextarea" name="description">{!! $variant->description !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 pl-lg-2">
                    <div class="sticky-top sticky-sidebar">

                        <div class="card">

                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($variant->material_image_id)
                                            <div class="col-sm-6 col-lg-6 mb-4" id="images_{{ $variant->material_image_id }}">
                                                <label> Material Image</label>
                                                <a href="{{ asset($variant->fabPhoto->large) }}" data-lightbox="group" data-title="caption"><img class="rounded img-fluid" src="{{ asset($variant->fabPhoto->large) }}" alt=""></a>
                                                <div class="text-center">
                                                    <button class="btn btn-falcon-default btn-sm mt-2" id="{{ $variant->material_image_id }}" type="button" @click="deleteImage($event)">Remove</button>
                                                </div>
                                            </div>
                                        @endif
                                        @if($variant->care_image_id)
                                            <div class="col-sm-6 col-lg-6 mb-4" id="images_{{ $variant->care_image_id }}">
                                                <label> Care Image</label>
                                                <a href="{{ asset($variant->carePhoto->large) }}" data-lightbox="group" data-title="caption"><img class="rounded img-fluid" src="{{ asset($variant->carePhoto->large) }}" alt=""></a>
                                                <div class="text-center">
                                                    <button class="btn btn-falcon-default btn-sm mt-2" id="{{ $variant->care_image_id }}" type="button" @click="deleteImage($event)">Remove</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fab_bg">Select Material BG</label>
                                        <select onchange="getFabricBG()" class="form-control" id="fab_bg">
                                            <option value="color" @if($variant->material_image_id) @else selected @endif>Color (Default)</option>
                                            <option value="image" @if($variant->material_image_id) selected @endif>Image</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 fab_color" @if($variant->material_image_id) style="display: none;" @endif>
                                    <div class="form-group">
                                        <label for="material_color">Material Color</label>
                                        <input type="text" id="material_color" class="form-control @error('material_color') is-invalid @enderror" name="material_color" value="{{ $variant->material_color ? $variant->material_color : '#276cb8' }}">
                                        @error('fabric_color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group fab_image" @if($variant->material_image_id) style="display: block;" @else style="display: none;" @endif>
                                        <label for="image">Material Image</label>
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="fabImage" type="file" name="material_image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Fabric Care</label>
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="careImage" type="file" name="care_image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-right">
                                    <button class="btn btn-falcon-default btn-md mt-2" type="submit"><span class="fas fa-plus fs--2 mr-1" data-fa-transform="up-1"></span> Update Item</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('admin-css')
    <link href="{{ asset('assets/lib/lightbox2/css/lightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
@endsection

@section('admin-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox2/js/lightbox.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
    <script>
        $('#material_color').spectrum({
            type: "component",
            hideAfterPaletteSelect: "true",
            showInput: "true",
            showInitial: "true"
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
    </script>
@endsection
