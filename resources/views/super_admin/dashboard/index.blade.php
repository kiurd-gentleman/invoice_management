@extends('layouts.app', ['page' => 'super_admin.dashboard'])

@section('title', __('messages.dashboard'))

@section('page_header')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">DashBoard</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Form</a>
                    </li>
                    <li class="breadcrumb-item active">DashBoard
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <section>
        <div class="row match-height ">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info">{{ isset($users) ? $users : '0'}}</h3>
                                    <h6>Users</h6>
                                </div>
                                <div>
                                    <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">{{ isset($active_subscriptions) ? $active_subscriptions : '0'}}</h3>
                                    <h6>Active Subscriptions</h6>
                                </div>
                                <div>
                                    <i class="icon-basket-loaded danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card pull-up">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{ money($total_earnings, get_system_setting('application_currency')) }}</h3>
                                    <h6>Total Earnings</h6>
                                </div>
                                <div>
                                    <i class="icon-basket-loaded success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex align-items-center">
                    <h3 class="card-header__title mb-0 fs-1-3rem">{{ __('messages.earnings_this_year') }}</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="earningsChart" class="chart-canvas chartjs-render-monitor" width="1998" height="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Orders</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="{{ route('super_admin.orders') }}" target="_blank">View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="w-30px" class="text-center">{{ __('messages.order_id') }}</th>
                                    <th>{{ __('messages.transaction_id') }}</th>
                                    <th>{{ __('messages.user') }}</th>
                                    <th>{{ __('messages.plan') }}</th>
                                    <th>{{ __('messages.price') }}</th>
                                    <th>{{ __('messages.payment_type') }}</th>
                                    <th>{{ __('messages.created_at') }}</th>
                                </tr>
                            </thead>
                            <tbody >
                            @if($latest_orders->count() > 0)
                                @foreach ($latest_orders as $order)
                                <tr>
                                    <td>
                                        <p class="mb-0">{{ $order->order_id }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0">{{ $order->transaction_id }}</p>
                                    </td>
                                    <td>
                                        @if($order->company)
                                            <a class="mb-0" href="{{ route('super_admin.users.edit', $order->company->owner->id) }}">{{ $order->company->owner->full_name }}</a>
                                        @else
                                            <a class="mb-0">-</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->plan)
                                            <a class="mb-0" href="{{ route('super_admin.plans.edit', $order->plan->id) }}">{{ $order->plan->name ?? '-' }}</a>
                                        @else
                                            <a class="mb-0">-</a>
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-0">{{ money($order->price, $order->currency) }}</p>
                                    </td>
                                    <td>
                                        {{ $order->payment_type }}
                                    </td>
                                    <td class="text-center"><i class="material-icons icon-16pt text-muted-light mr-1">today</i> {{ $order->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <p class="text-center "> No Order Yet</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
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
                                    return a.toLocaleString("en-US", {style:"currency", currency: "{{ get_system_setting('application_currency') }}"});
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
                                    val = o.toLocaleString("en-US", {style:"currency", currency: "{{ get_system_setting('application_currency') }}"});
                                return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + val + "</span>";
                            }
                        }
                    }
                }, options);
                var data = {
                    labels: @json($earnings_stats_label),
                    datasets: [{
                        label: "Earnings",
                        data: @json($earnings_stats)
                    }]
                };
                Charts.create(id, type, options, data);
            };
            Orders('#earningsChart');
        })();
    </script>
@endsection
