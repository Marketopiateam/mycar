@extends('layouts.back-end.app')

@section('title', translate('messages.service_Add'))

@push('css_or_js')
    <link href="{{ dynamicAsset(path: 'public/assets/back-end/css/tags-input.min.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset(path: 'public/assets/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="content container-fluid">

        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0 d-flex align-items-center gap-2">
                <img width="20" src="{{ dynamicAsset(path: 'public/assets/back-end/img/brand.png') }}" alt="">
                {{ translate('service_Setup') }}
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body text-start">
                        <form action="{{ route('admin.service-car.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                            <div>
                                                <label for="name"
                                                    class="title-color text-capitalize font-weight-bold mb-0">{{ translate('product_thumbnail') }}</label>
                                                <span
                                                    class="badge badge-soft-info">{{ THEME_RATIO[theme_root_path()]['Product Image'] }}</span>
                                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                                    title="{{ translate('add_your_product’s_thumbnail_in') }} JPG, PNG or JPEG {{ translate('format_within') }} 2MB">
                                                    <img src="{{ dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg') }}"
                                                        alt="">
                                                </span>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom_upload_input">
                                                <input type="file" name="image"
                                                    class="custom-upload-input-file action-upload-color-image"
                                                    id="" data-imgpreview="pre_img_viewer"
                                                    accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">

                                                <span
                                                    class="delete_file_input btn btn-outline-danger btn-sm square-btn d--none">
                                                    <i class="tio-delete"></i>
                                                </span>

                                                <div class="img_area_with_preview position-absolute z-index-2">
                                                    <img id="pre_img_viewer" class="h-auto aspect-1 bg-white d-none"
                                                        src="dummy" alt="">
                                                </div>
                                                <div
                                                    class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        <img alt="" class="w-75"
                                                            src="{{ dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg') }}">
                                                        <h3 class="text-muted">{{ translate('Upload_Image') }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-muted mt-2">
                                                {{ translate('image_format') }} : {{ 'Jpg, png, jpeg, webp,' }}
                                                <br>
                                                {{ translate('image_size') }} : {{ translate('max') }}
                                                {{ '2 MB' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="title-color">
                                            {{ translate('name') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="title-color">
                                            {{ translate('address') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="title-color">
                                        {{ translate('brands') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control color-var-select"
                                        name="brands[]" multiple="multiple" id="brands" >
                                        @foreach ($brands as $key => $color)
                                            <option value="{{ $color->id }}">
                                                {{ $color['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 d-flex align-items-center gap-2">
                                        <label for="colors" class="title-color mb-0">
                                            {{ translate('Star') }} :
                                        </label>
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher_input" id="star-switcher"  name="star">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex gap-3 justify-content-end">
                                <button type="reset" id="reset"
                                    class="btn btn-secondary px-4">{{ translate('reset') }}</button>
                                <button type="submit" class="btn btn--primary px-4">{{ translate('submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/products-management.js') }}"></script>
@endpush
@push('script')
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/tags-input.min.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/spartan-multi-image-picker.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/admin/product-add-update.js') }}"></script>
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/admin/product-add-colors-img.js') }}"></script>
@endpush
