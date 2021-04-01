@extends('layouts.app', ['page' => 'vendors'])

@section('title', __('messages.vendors'))

@section('page_header')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.vendors') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.vendors') }}</a>
                        </li>
                        <li class="breadcrumb-item active">List
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="media width-250 float-right">
                <div class="media-body media-right text-right">
                    <a href="{{ route('vendors.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success btn-sm text-uppercase"><i class="ft-plus"></i> {{ __('messages.create_vendor') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-round-controls">Vendor List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                @include('application.vendors._filters')
                            </div>
                            @include('application.vendors._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--@include('application.vendors._filters')

    <div class="card">
        @include('application.vendors._table')
    </div>--}}
@endsection
