@extends('layouts.app', ['page' => 'dashboard'])

@section('title', __('messages.dashboard'))

@section('page_header')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.dashboard') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.dashboard') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up" style="background-color: rgb(103 216 142 / 30%);">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info" style="color: #65bf4f !important;">{{ $customersCount}}</h3>

                                <a href="{{route('customers', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none"  >
                                    <div class="card-header__title text-muted mb-2 d-flex" style="color: #65bf4f !important;">
                                        {{ __('messages.customers') }}
                                    </div>
                                </a>
                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right"  style="color: #65bf4f !important;"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar " role="progressbar" style="width: 80%;background-color: #65bf4f !important;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up" style="background-color: rgb(206 139 79 / 30%);">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info" style="color: #e68539 !important ;" >{{ $invoicesCount}}</h3>

                                <a href="{{route('invoices', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">
                                    <div class="card-header__title text-muted mb-2 d-flex" style="color: #e68539 !important ;">
                                        {{ __('messages.invoices') }}
                                    </div>
                                </a>
                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right" style="color: #e68539 !important ;"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar" role="progressbar" style="width: 80%; background-color: #e68539 !important ;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up" style="background-color: rgb(79 144 206 / 30%);">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{ $estimatesCount}}</h3>

                                <a href="{{route('estimates', ['company_uid' => $currentCompany->uid])}}" class="text-decoration-none">
                                    <div class="card-header__title text-muted mb-2 d-flex info">
                                        {{ __('messages.estimates') }}
                                    </div>
{{--                                    <span class="h4 m-0">{{ $estimatesCount }}</span>--}}
                                </a>
                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up" style="background-color: rgb(247 93 89 / 30%); ;">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3  style="color: #d2555a !important ;" >{{ __('messages.due_amount') }}</h3>

                                <div class="card-header__title text-muted mb-2 d-flex"></div>
                                <span class="h4 m-0" style="color: #d2555a !important ;" >{{ money($totalDueAmount, $currentCompany->currency->code) }}</span>

                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right" style="color: #d2555a !important ;" ></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar" role="progressbar" style="width: 80%; background-color: #d2555a !important ;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center">
                    <h3 class="card-header__title mb-0 fs-1-3rem">{{ __('messages.earnings_this_year') }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="expensesChart" class="chart-canvas chartjs-render-monitor" width="1998" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div  class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Due Invoices</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}" target="_blank">View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="">
                        @include('application.dashboard._due_invoices')
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="col">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header card-header-large bg-white">--}}
{{--                    <h4 class="card-header__title">{{ __('messages.due_estimates') }}</h4>--}}
{{--                </div>--}}

{{--                @include('application.dashboard._due_estimates')--}}

{{--                <div class="card-footer text-center border-0">--}}
{{--                    <a class="text-muted" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.view_all') }}</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div  class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Due Quatation</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}" target="_blank">View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="">
                        @include('application.dashboard._due_estimates')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_body_scripts')
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs-rounded-bar.js') }}"></script>
    <script src="{{ asset('assets/js/charts.js') }}"></script>

    <script>
        (function () {
            'use strict';
            Charts.init();

            var Orders = function Orders(id) {
                var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'roundedBar';
                var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
                options = Chart.helpers.merge({
                    barRoundness: 1.2,
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function callback(a) {
                                    return a.toLocaleString("en-US", {style:"currency", currency: "{{ $currency_code }}"});
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function label(a, e) {
                                var t = e.datasets[a.datasetIndex].label || "",
                                    o = a.yLabel,
                                    r = "",
                                    val = o.toLocaleString("en-US", {style:"currency", currency: "{{ $currency_code }}"});
                                return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + val + "</span>";
                            }
                        }
                    }
                }, options);
                var data = {
                    labels: @json($expense_stats_label),
                    datasets: [{
                        label: "Expenses",
                        data: @json($expense_stats)
                    }]
                };
                Charts.create(id, type, options, data);
            };
            Orders('#expensesChart');
        })();
    </script>
@endsection
