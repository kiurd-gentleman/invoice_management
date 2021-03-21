@extends('layouts.app', ['page' => 'vendors'])

@section('title', __('messages.vendor_details'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.vendors') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.vendor_details') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.vendor_details') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.vendor_details') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.vendors') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.vendor_details') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="row pl-4 pr-4">
            <div class="col-12 col-md-3 mt-4 mb-4">
                <h5>{{ __('messages.details') }}</h5>
                <p class="mb-1">
                    <strong>{{ __('messages.name') }}:</strong> {{ $vendor->display_name }} <br>
                </p>
                <p class="mb-1">
                    <strong>{{ __('messages.contact') }}:</strong> {{ $vendor->contact_name }} <br>
                </p>
                <p class="mb-1">
                    <strong>{{ __('messages.email') }}:</strong> {{ $vendor->email }} <br>
                </p>
            </div>
            <div class="col-12 col-md-3 mt-4 mb-4">
                <h5>{{ __('messages.billing') }}</h5>
                <p>
                    {{ $vendor->displayLongAddress('billing') }}
                </p>
            </div>
            <div class="col-12 col-md-3 offset-md-3 text-right mt-4 mb-4">
                <a href="{{ route('vendors.edit', ['vendor' => $vendor->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm  btn-primary">
                    <i class="ft-edit"></i>
                    {{ __('messages.edit') }}
                </a>
                <a href="{{ route('vendors.delete', ['vendor' => $vendor->id, 'company_uid' => $currentCompany->uid]) }}" class="btn  btn-sm btn-danger delete-confirm">
                    <i class="ft-trash-2"></i>
                    {{ __('messages.delete') }}
                </a>
            </div>
        </div>
    </div>

    <nav class="nav nav-pills nav-justified w-100" role="tablist">
        <a href="#expenses" class="h6 nav-item nav-link bg-secondary text-white active show" data-toggle="tab" role="tab" aria-selected="true">{{ __('messages.expenses') }}</a>
    </nav>

    <div class="tab-content">
        <div class="tab-pane active show" id="expenses">
            <div class="card">
                @include('application.expenses._table')
            </div>
        </div>
    </div>

@endsection
