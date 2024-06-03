@extends('layouts.back-end.app')

@section('title', translate('model_Update'))

@section('content')
    <div class="content container-fluid">

        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0 align-items-center d-flex gap-2">
                <img width="20" src="{{ dynamicAsset(path: 'public/assets/back-end/img/brand.png') }}" alt="">
                {{ translate('model_Update') }}
            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-start">
                        <form action="{{ route('admin.models.update', $model) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="title-color">
                                            {{ translate('name') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $model->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand" class="title-color">
                                            {{ translate('brand') }}
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="brand_id" class="form-control" id="brand_id">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $model->brand_id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
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
