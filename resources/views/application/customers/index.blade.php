@extends('layouts.app', ['page' => 'customers'])

@section('title', __('messages.customers'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.customers') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.customers') }}</h1>--}}
{{--        </div>--}}
{{--        <a href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success ml-3"><i class="material-icons">add</i> {{ __('messages.create_customer') }}</a>--}}
{{--    </div>--}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.customers') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('customers',  ['company_uid' => $currentCompany->uid])}}" >{{ __('messages.customers') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('List') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="media width-250 float-right">
                <div class="media-body media-right text-right">
                    <a href="{{ route('customers.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-success text-uppercase"><i class="ft-plus"></i> &nbsp;{{ __('messages.create_customer') }}</a>
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
                        <h4 class="card-title" id="basic-layout-round-controls">User List</h4>
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
                                @include('application.customers._filters')
                            </div>
                            @include('application.customers._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


{{--    @include('application.customers._filters')--}}

{{--    <div class="card">--}}
{{--        @include('application.customers._table')--}}
{{--    </div>--}}
@endsection
