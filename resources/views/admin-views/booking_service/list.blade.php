@extends('layouts.back-end.app')

@section('title', translate('booking_service'))

@section('content')
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-2">
                {{ translate('booking_service') }}
            </h2>
        </div>
        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row g-2 flex-grow-1">
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="searchValue" class="form-control"
                                            placeholder="{{ translate('search_by_name') }}" aria-label="{{ translate('search_by_name') }}" value="{{ request('searchValue') }}" required>
                                        <button type="submit" class="btn btn--primary input-group-text">{{ translate('search') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-start">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">{{ translate('name') }}</th>
                                    <th class="text-center"> {{ translate('phone') }}</th>
                                    <th class="text-center"> {{ translate('service') }}</th>
                                    <th class="text-center"> {{ translate('product') }}</th>
                                    <th class="text-center"> {{ translate('body') }}</th>
                                    <th class="text-center"> {{ translate('action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($booking_service as $model)
                                    <tr>
                                        <td>{{ $model->id}}</td>
                                        <td class="overflow-hidden text-center">
                                            <span data-toggle="tooltip" data-placement="right" title="{{$model->name}}">
                                                 {{ Str::limit($model->name,20) }}
                                            </span>
                                        </td>
                                        <td class="overflow-hidden text-center">{{$model->phone}}</td>
                                        <td class="overflow-hidden text-center">{{$model->service->name}}</td>
                                        <td class="overflow-hidden text-center">{{$model->product->name??''}}</td>

                                        <td class="overflow-hidden text-center">
                                            <span data-toggle="tooltip" data-placement="right" title="{{$model->body}}">
                                                 {{ Str::limit($model->body,20) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a class="btn btn-outline-info btn-sm square-btn" title="{{ translate('edit') }}"
                                                href="{{ route('admin.booking-service.edit', [$model]) }}">
                                                <i class="tio-edit"></i>
                                            </a>
                                                <form action="{{ route('admin.booking-service.destroy', $model) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm square-btn " title="{{ translate('delete') }}" id="{{ $model->id }}">
                                                        <i class="tio-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            {{ $booking_service->links() }}
                        </div>
                    </div>
                    @if(count($booking_service)==0)
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="{{ dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg') }}" alt="">
                            <p class="mb-0">{{ translate('no_data_to_show') }}</p>
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
