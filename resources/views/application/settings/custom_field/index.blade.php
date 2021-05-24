@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.custom_fields'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.custom_fields') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.custom_fields') }}</h1>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.account_settings') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.custom_fields') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-detached content-right">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('messages.custom_fields') }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
{{--                                <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Submit Bug</button>--}}
                                <a href="{{ route('settings.custom_fields.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary btn-sm">
                                    <i class="ft-plus white"></i>  {{ __('messages.add_custom_field') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->
{{--                                <div class="form-row align-items-center mb-4">--}}
{{--                                    <div class="col">--}}
{{--                                        <p class="h4 mb-0">--}}
{{--                                            <strong class="headings-color"></strong>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    --}}

{{--                                </div>--}}
                                @include('application.settings.custom_field._table')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="sidebar-detached sidebar-left">
        <div class="sidebar">
            <div class="bug-list-sidebar-content">
                <!-- Predefined Views -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Predefined Views</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- bug-list search -->
                    <div class="card-content">
                        <!-- /bug-list search -->
                        <!-- bug-list view -->
                        <div class="card-body ">
                            @include('application.settings._aside', ['tab' => 'custom_fields'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="row">
        <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'custom_fields'])
        </div>
        <div class="col-lg-9">
            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">

                        <div class="form-row align-items-center mb-4">
                            <div class="col">
                                <p class="h4 mb-0">
                                    <strong class="headings-color">{{ __('messages.custom_fields') }}</strong>
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('settings.custom_fields.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary text-white">
                                    {{ __('messages.add_custom_field') }}
                                </a>
                            </div>
                        </div>

                        @include('application.settings.custom_field._table')
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection

