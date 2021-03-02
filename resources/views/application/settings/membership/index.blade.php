@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.membership'))
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.membership') }}</li>
            </ol>
        </nav>
        <h1 class="m-0">{{ __('messages.membership') }}</h1>
    </div>

    <div class="row">
        <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'membership'])
        </div>
        <div class="col-lg-9">
            
            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col-12 col-md-6 card-form__body card-body bg-white">
                        <div class="form-group mb-4">
                            <p class="h5 mb-0">
                                <strong class="headings-color">{{ __('messages.current_membership') }}</strong>
                            </p>
                        </div>
                        <div class="font-weight-bold">{{ __('messages.plan') }}: <p class="font-weight-normal">{{ $subscription->plan->name }}</p></div>
                        <div class="font-weight-bold">{{ __('messages.status') }}: <p class="font-weight-normal">{!! $subscription->html_status !!}</p></div>
                        @if($subscription->onTrial())
                            <div class="font-weight-bold">{{ __('messages.trial_ends') }}: <p class="font-weight-normal">{{ $subscription->trial_ends_at->format($dateFormat) }}</p></div>
                        @else
                            <div class="font-weight-bold">{{ __('messages.expiry_date') }}: <p class="font-weight-normal">{{ $subscription->ends_at->format($dateFormat) }}</p></div>
                        @endif

                        <div class="form-group text-left mt-4">
                            <a href="{{ route('order.plans') }}" class="btn btn-primary">{{ __('messages.see_plans') }}</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 card-form__body card-body bg-white">
                        <div class="form-group mb-4">
                            <p class="h5 mb-0">
                                <strong class="headings-color">{{ __('messages.feature_usage') }}</strong>
                            </p>
                        </div>
                        <div class="font-weight-bold">{{ __('messages.customers') }}: <p class="font-weight-normal">{{ $subscription->getFeatureUsage('customers') ?? 0 }} / {{ $subscription->getFeatureValue('customers') === '-1' ? __('messages.unlimited') : $subscription->getFeatureValue('customers') }}</p></div>
                        <div class="font-weight-bold">{{ __('messages.products') }}: <p class="font-weight-normal">{{ $subscription->getFeatureUsage('products') ?? 0 }} / {{ $subscription->getFeatureValue('products') === '-1' ? __('messages.unlimited') : $subscription->getFeatureValue('products') }}</p></div>
                        <div class="font-weight-bold">{{ __('messages.estimates_per_month') }}: <p class="font-weight-normal">{{ $subscription->getFeatureUsage('estimates_per_month') ?? 0 }} / {{ $subscription->getFeatureValue('estimates_per_month') === '-1' ? __('messages.unlimited') : $subscription->getFeatureValue('estimates_per_month') }}</p></div>
                        <div class="font-weight-bold">{{ __('messages.invoices_per_month') }}: <p class="font-weight-normal">{{ $subscription->getFeatureUsage('invoices_per_month') ?? 0}} / {{ $subscription->getFeatureValue('invoices_per_month') === '-1' ? __('messages.unlimited') : $subscription->getFeatureValue('invoices_per_month') }}</p></div>
                    </div>
                </div>
            </div>

            <div class="card card-form">
                @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table mb-0 thead-border-top-0 table-striped">
                            <thead>
                                <tr>
                                    <th class="w-30px" class="text-center">{{ __('messages.order_id') }}</th>
                                    <th>{{ __('messages.transaction_id') }}</th>
                                    <th>{{ __('messages.plan') }}</th>
                                    <th>{{ __('messages.price') }}</th>
                                    <th>{{ __('messages.payment_type') }}</th>
                                    <th>{{ __('messages.created_at') }}</th>
                                </tr> 
                            </thead> 
                            <tbody class="list" id="orders">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <p class="mb-0">{{ $order->order_id }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0">{{ $order->transaction_id }}</p>
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
                            </tbody>
                        </table>
                    </div>
                    @if(method_exists($orders, 'links'))
                        <div class="row card-body pagination-light justify-content-center text-center">
                            {{ $orders->links() }}
                        </div>
                    @endif
                @else
                    <div class="row justify-content-center card-body pb-0 pt-5">
                        <i class="material-icons fs-64px">account_box</i>
                    </div>
                    <div class="row justify-content-center card-body pb-5">
                        <p class="h4">{{ __('messages.no_orders_yet') }}</p>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
@endsection

