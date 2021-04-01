@extends('layouts.app', ['page' => 'reports.customer_sales'])

@section('title', __('messages.customer_sales_report'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.reports') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.customer_sales_report') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.customer_sales_report') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.customer_sales_report') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('reports.customer_sales', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.reports') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.customer_sales_report') }}
                        </li>
                    </ol>
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
                        <h4 class="card-title" id="basic-layout-round-controls">Payment List</h4>
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
                        <div class="card-body ">
                            <div class="row ">
                                <div class="col-12 col-md-12 w-100">
                                    <form method="GET">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12 col-md-2 pl-0 ml-3">
                                                <div class="form-group ">
                                                    <label for="filter[from]">{{ __('messages.from') }}</label>
                                                    <input name="filter[from]" type="text" class="form-control datepicker" value="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : date('Y-m-d') }}"
                                                           readonly="readonly" placeholder="{{ __('messages.from') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2 pl-0">
                                                <div class="form-group ">
                                                    <label for="filter[to]">{{ __('messages.to') }}</label>
                                                    <input name="filter[to]" type="text" class="form-control datepicker" value="{{ isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : date('Y-m-d') }}"
                                                           readonly="readonly" placeholder="{{ __('messages.to') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2 pl-0 mt-1">
                                                <button type="submit" class="btn btn-info mt-1">
                                                    <i class="ft-search"></i>
                                                    {{ __('Search') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="w-100">
                                    <div class="col-12 col-md-12 text-right">
                                        <div class="btn-group mb-2">
                                            <a href="{{ route('reports.customer_sales.pdf', [
                                                    'company_uid' => $currentCompany->uid,
                                                    'from' => isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : \Carbon\Carbon::now()->format('Y-m-d'),
                                                    'to' => isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : \Carbon\Carbon::now()->addMonth()->format('Y-m-d'),
                                                    'download' => true
                                                ]) }}" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="ft-download-cloud"></i>
                                                {{ __('messages.download') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pdf-iframe" >
                                <iframe src="{{ route('reports.customer_sales.pdf', [
                                        'company_uid' => $currentCompany->uid,
                                        'from' => isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : \Carbon\Carbon::now()->format('Y-m-d'),
                                        'to' => isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : \Carbon\Carbon::now()->addMonth()->format('Y-m-d')
                                    ]) }}" frameborder="0" style="width: 100% ; height: 500px">

                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
