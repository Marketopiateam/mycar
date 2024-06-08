@extends('layouts.back-end.app')

@section('title', translate('booking_details'))

@section('content')
    <div class="content container-fluid">

        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0 align-items-center d-flex gap-2">
                <img width="20" src="{{ dynamicAsset(path: 'public/assets/back-end/img/brand.png') }}" alt="">
                {{ translate('booking_details') }}
            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-start">
                        <h4>name :</h4> {{ $BookingService->name }}
                    </div>
                    <div class="card-body text-start">
                        <h4>phone :</h4> {{ $BookingService->phone }}
                    </div>
                    <div class="card-body text-start">
                        <h4>body :</h4> {{ $BookingService->body }}
                    </div>
                    @if ($BookingService->product_id != null)
                        <div class="card-body text-start">
                            <h4>product :</h4> {{ $BookingService->product->name ?? '' }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ dynamicAsset(path: 'public/assets/back-end/js/products-management.js') }}"></script>
@endpush
