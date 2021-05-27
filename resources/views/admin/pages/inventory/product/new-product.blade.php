@extends('admin.layouts.app')

@section('title', 'Add Product | E-commerce Store')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h6 class="mb-0">DashBoard > Products > Add New</h6>
                </div>
                <div class="col-sm-auto">
                    <a class="text-600" href="{{ route('home') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="DashBoard"><svg class="svg-inline--fa fa-th fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="th" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"></path></svg><!-- <span class="fas fa-th"></span> --></a>
                </div>
            </div>
        </div>
    </div>

    <form class="product" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row no-gutters">
            <div class="col-lg-8 pr-lg-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Product</h5>
                    </div>
                    <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Product Title</label>
                                        <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" required>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="subtitle">Sub Title</label>
                                        <input class="form-control" id="subtitle" name="subtitle" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="category_id">Shape Category Name</label>
                                        <select id="category_id" name="category_id" class="custom-select mb-3  @error('category_id') is-invalid @enderror" required>
                                            <option selected>Choose One</option>
                                            @foreach($category as $val)
                                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input class="form-control @error('price') is-invalid @enderror" type="text" id="price" name="price" placeholder="200" required>
                                            @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="attribute_id">Select Collection</label>
                                        <select class="selectpicker form-control @error('attribute_id') is-invalid @enderror" id="attribute_id" name="attribute_id[]" multiple data-options='{"placeholder":"Select collections"}'>
                                            @foreach($attribute as $val)
                                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('attribute_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="mytextarea">Product Description</label>
                                        <textarea id="mytextarea" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="card mb-3 overflow-hidden">
                    <div class="card-header">
                        <h5 class="mb-0">API Details</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="solution3DID">API solution3DID</label>
                                    <input class="form-control @error('solution3DID') is-invalid @enderror" id="solution3DID" name="solution3DID" type="text" placeholder="EX: 4200" required>
                                    @error('solution3DID')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="solution3DName">API solution3DName</label>
                                    <input class="form-control @error('solution3DName') is-invalid @enderror" id="solution3DName" name="solution3DName" placeholder="EX: sofa" type="text" required>
                                    @error('solution3DName')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="distID">API distID</label>
                                    <input class="form-control @error('distID') is-invalid @enderror" id="distID" name="distID" type="text" required placeholder="EX: 9906">
                                    @error('distID')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="projectName">API ProjectName</label>
                                    <input class="form-control @error('projectName') is-invalid @enderror" id="projectName" name="projectName" type="text" placeholder="EX: l-shape-sofa" required>
                                    @error('projectName')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="script_code">API 3d Script Code</label>
                                    <input class="form-control @error('script_code') is-invalid @enderror" id="script_code" name="script_code" type="text" placeholder="EX: https://distcdn.unlimited3d.com/pres/v/1.1.3/unlimited3d.min.js" required>
                                    @error('script_code')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pl-lg-2">
                <div class="sticky-top sticky-sidebar">
                    <div class="card mb-3 overflow-hidden">
                        <div class="card-header">
                            <h5 class="mb-0">Featured Image</h5>
                        </div>
                        <div class="card-body bg-light">
                            <h6 class="mt-2 font-weight-bold">Product Status<span class="fs--2 ml-1 text-primary" data-toggle="tooltip" data-placement="top" title="You can go draft mode for this product. Then Product will be Invisible."><span class="fas fa-question-circle"></span></span></h6>
                            <div class="pl-2">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="status" value="1" id="active" checked="checked" />
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="0" name="status" id="draft" />
                                    <label class="custom-control-label" for="draft">Draft</label>
                                </div>
                            </div>
                            <hr class="border-dashed border-bottom-0">
                            <div class="f_image ml-2">
                                <label>Featured Image</label>
                            </div>
                            <div class="pl-2">
                                <div class="fallback"><input id="fallback" type="file" onchange="showImage(this.files[0])" name="image"></div>
                                <div class="preview">
                                    <div class="image-complete" id="image_complete"  style="display: block;">
                                        <div class="message-text" id="uploadImage" style="display: block;">
                                            <img class="mr-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="">Drop your file here
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-2 text-center" id="img_show">
                                <img id="preview_img" src="#" class="my-preview-img" style="display: none; border: 2px dashed">
                                <a class="img-remove btn btn-danger btn-sm" onclick="imgRemove()" href="#!" style="display: none;">
                                    Remove
                                </a>
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-4"><button class="btn btn-primary" type="submit">Publish </button></div>
                        </div>
                    </div>

                    <div class="card mb-3 overflow-hidden">
                        <div class="card-header">
                            <h5 class="mb-0">SEO Details</h5>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="seo_title">SEO Title</label>
                                        <input class="form-control" id="seo_title" name="seo_title" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="seo_slug">SEO Slug</label>
                                        <input class="form-control" id="seo_slug" name="seo_slug" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input class="form-control" data-role="tagsinput" id="meta_keywords" name="meta_keywords" placeholder="Enter Keywords" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('admin-css')
    <link href="{{ asset('assets/lib/tagsinput/tagsinput.css') }}" rel="stylesheet">
    <style>
        .image-complete {
            border: 2px dashed;
            padding: 70px;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
        }
        .fallback {
            display: none;
        }
        .img-remove {
            text-align: right !important;
            display: none;
        }
        .img-remove {
            display: none;
        }
        .my-preview-img {
            width: 98%;
        }
        .my-preview-img:hover {
            opacity: 0.6;
        }
    </style>
@endsection

@section('admin-js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
        var imageInput      = document.getElementById('fallback');
        var uploadImage     = document.getElementById('uploadImage');
        var uploadImg       = document.getElementById('image_complete');

        if (uploadImg) {
            uploadImg.addEventListener("click", function(event) {
                imageInput.click();
            });
        }
        function showImage(img) {
            document.querySelector('.image-complete').style.display = "none";
            document.querySelector('.image-complete').style.border = "none";
            document.querySelector('.img-remove').style.display = "inline-block";
            document.querySelector('.my-preview-img').style.display = "block";
            document.querySelector('.my-preview-img').style.border = "2px dashed";
            document.getElementById('preview_img').src = window.URL.createObjectURL(img);
        }
        function imgRemove() {
            document.querySelector('.my-preview-img').style.display = "none";
            document.querySelector('.img-remove').style.display = "none";
            document.querySelector('.image-complete').style.display = "block";
            document.querySelector('.image-complete').style.border = "2px dashed";
            uploadImage.style.display = "block";
        }
    </script>

    <script>
        $('#title').keyup(function () {
            $('#seo_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });

        $('#title').keyup(function () {
            $('#seo_title').val($(this).val());
        });
    </script>
@endsection
