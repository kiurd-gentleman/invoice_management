@extends('layouts.app', ['page' => 'estimates'])

@section('title', __('messages.estimates'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.estimates') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.estimates') }}</h1>--}}
{{--        </div>--}}
{{--        <a href="{{ route('estimates.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success ml-3">--}}
{{--            <i class="material-icons">add</i> --}}
{{--            {{ __('messages.create_estimate') }}--}}
{{--        </a>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title text-uppercase">{{ __('Quotation') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Quotation') }}</a>
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
                    <a href="{{ route('estimates.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-success btn-sm mt-2 text-uppercase"><i class="ft-plus"></i> {{ __('Quotation') }}</a>
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
                        <h4 class="card-title" id="basic-layout-round-controls">Quotation List</h4>
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
                                @include('application.estimates._filters')
                            </div>
                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Your All Invoice is here. Filter for specific invoice</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $tab == 'drafts' ? 'active' : '' }} text-uppercase "
                                                       href="{{ route('estimates', ['company_uid' => $currentCompany->uid, 'tab' => '']) }}"
                                                       aria-expanded="{{ $tab == 'drafts' ? 'true' : 'false' }}">
                                                        Drafts
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $tab == 'due' ? 'active' : '' }} text-uppercase"
                                                       href="{{ route('estimates', ['company_uid' => $currentCompany->uid, 'tab' => 'sent']) }}"
                                                       aria-expanded="{{ $tab == 'due' ? 'true' : 'false' }}">Due Quotation</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $tab == 'all' ? 'active' : '' }} text-uppercase"
                                                       href="{{ route('estimates', ['company_uid' => $currentCompany->uid, 'tab' => 'all']) }}"
                                                       aria-expanded="{{ $tab == 'all' ? 'true' : 'false' }}">All Quotation</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content px-1 pt-1">
                                                @include('application.estimates._table')
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{--                                <div class="card-header bg-white p-0">--}}
                                {{--                                    <div class="row no-gutters flex nav">--}}
                                {{--                                        <a href="{{ route('invoices', ['tab' => '', 'company_uid' => $currentCompany->uid]) }}" class="col-2 border-right dashboard-area-tabs__tab card-body text-center {{ $tab == 'drafts' ? 'active' : '' }}">--}}
                                {{--                                            <span class="card-header__title m-0">--}}
                                {{--                                                {{ __('messages.drafts') }}--}}
                                {{--                                            </span>--}}
                                {{--                                        </a>--}}
                                {{--                                        <a href="{{ route('invoices', ['tab' => 'due', 'company_uid' => $currentCompany->uid]) }}" class="col-2 border-right dashboard-area-tabs__tab card-body text-center {{ $tab == 'due' ? 'active' : '' }}">--}}
                                {{--                                            <span class="card-header__title m-0">--}}
                                {{--                                                {{ __('messages.due_invoices') }}--}}
                                {{--                                            </span>--}}
                                {{--                                        </a>--}}
                                {{--                                        <a href="{{ route('invoices', ['tab' => 'all', 'company_uid' => $currentCompany->uid]) }}" class="col-2 border-right dashboard-area-tabs__tab card-body text-center {{ $tab == 'all' ? 'active' : '' }}">--}}
                                {{--                                            <span class="card-header__title m-0">--}}
                                {{--                                                {{ __('messages.all_invoices') }}--}}
                                {{--                                            </span>--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


{{--    @include('application.estimates._filters')--}}

{{--    <div class="card">--}}
{{--        <div class="card-header bg-white p-0">--}}
{{--            <div class="row no-gutters flex nav">--}}
{{--                <a href="{{ route('estimates', ['company_uid' => $currentCompany->uid, 'tab' => '']) }}" class="col-2 border-right dashboard-area-tabs__tab card-body text-center {{ $tab == 'drafts' ? 'active' : '' }}">--}}
{{--                    <span class="card-header__title m-0">--}}
{{--                        {{ __('messages.drafts') }}--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <a href="{{ route('estimates', ['company_uid' => $currentCompany->uid, 'tab' => 'sent']) }}" class="col-2 border-right dashboard-area-tabs__tab card-body text-center {{ $tab == 'sent' ? 'active' : '' }}">--}}
{{--                    <span class="card-header__title m-0">--}}
{{--                        {{ __('messages.sent') }}--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <a href="{{ route('estimates', ['company_uid' => $currentCompany->uid, 'tab' => 'all']) }}" class="col-2 border-right dashboard-area-tabs__tab card-body text-center {{ $tab == 'all' ? 'active' : '' }}">--}}
{{--                    <span class="card-header__title m-0">--}}
{{--                        {{ __('messages.all') }}--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @include('application.estimates._table')--}}
{{--    </div>--}}
@endsection
