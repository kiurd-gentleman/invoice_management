@extends('layouts.app', ['page' => 'customers'])

@section('title', __('messages.customer_details'))

@section('page_header')

{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.customers') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.customer_details') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.customer_details') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.customers') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('customers',  ['company_uid' => $currentCompany->uid])}}" >{{ __('messages.customers') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Details')  }}
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
            <div class="col-12 col-md-4 mt-4 mb-4">
                <h4 class="content-header-title text-center">{{ __('messages.details') }}</h4>
                <hr>
                <p class="mb-1">
                    <strong>{{ __('messages.name') }}:</strong> {{ $customer->display_name }} <br>
                </p>
                <p class="mb-1">
                    <strong>{{ __('messages.contact') }}:</strong> {{ $customer->contact_name }} <br>
                </p>
                <p class="mb-1">
                    <strong>{{ __('messages.email') }}:</strong> {{ $customer->email }} <br>
                </p>
            </div>
            <div class="col-12 col-md-4 mt-4 mb-4">
                <h4 class="content-header-title text-center">{{ __('messages.billing') }}</h4>
                <hr>
                <p>
                    {{ $customer->displayLongAddress('billing') }}
                </p>
            </div>
            <div class="col-12 col-md-4 mt-4 mb-4">
                <h4 class="content-header-title text-center">{{ __('messages.standing') }}</h4>
                <hr>
                <strong>{{ __('messages.due_amount') }}:</strong>
                <p class="h5 mt-1 ">{{ money($customer->invoice_due_amount, $customer->currency_code)  }}</p>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-12 col-md-12 text-right  mb-4 d-flex justify-content-center">
                <a href="{{ route('customers.edit', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-primary">
                    <i class="ft-edit"></i>
                    {{ __('messages.edit') }}
                </a>
                <a href="{{ route('customers.delete', ['customer' => $customer->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm ml-1 btn-danger delete-confirm">
                    <i class="ft-trash"></i>
                    {{ __('messages.delete') }}
                </a>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="col-xl-12 col-lg-12">
        <div class="card-header">
            <h4 class="card-title">Customer Info</h4>
        </div>
        <div class="card-body">
            <div class="card-block">
{{--           <p>Customer Info</p>--}}
                <ul class="nav nav-pills nav-pill-toolbar nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" id="active2-pill1" data-toggle="pill" href="#active21" aria-expanded="true">{{ __('messages.invoices') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link2-pill1" data-toggle="pill" href="#link21" aria-expanded="false">{{ __('Quotations') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="pill" id="dropdownOpt1-pill1" href="#dropdownOpt21"  aria-expanded="true">{{ __('messages.payments') }}</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="linkOpt2-pill1" data-toggle="pill" href="#linkOpt21">{{ __('messages.activities') }}</a>
                    </li>
                </ul>
                <div class="tab-content px-1 pt-1">
                    <div role="tabpanel" class="tab-pane active" id="active21" aria-labelledby="active2-pill1"
                         aria-expanded="true">
                        @include('application.invoices._table')
                    </div>
                    <div class="tab-pane" id="link21" role="tabpanel" aria-labelledby="link2-pill1" aria-expanded="false">
                        @include('application.estimates._table')
                    </div>
                    <div class="tab-pane" id="dropdownOpt21" aria-labelledby="dropdownOpt1-pill1" aria-expanded="false">
                        @include('application.payments._table')
                    </div>
                    <div class="tab-pane" id="linkOpt21" role="tabpanel" aria-labelledby="linkOpt2-pill1"
                         aria-expanded="false">
                        <div class="container-fluid page__container">
                            <p class="text-dark-gray d-flex justify-content-center mt-3">
{{--                                    <i class="material-icons icon-muted mr-2">dvr</i>--}}
                                <strong>{{ __('messages.activities') }}</strong>
                            </p>

                            @if($activities->count() > 0)
                                @foreach($activities as $activity)
                                    <div class="row align-items-center  projects-item mb-1">
                                        <div class="col-sm-auto mb-1 mb-sm-0">
                                            <div class="text-dark-gray">{{ $activity->created_at->format($currentCompany->getSetting('date_format')) }}</div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="card m-0">
                                                <div class="px-4 py-3">
                                                    <div class="row align-items-center">
                                                        <div class="col mw-300px">
                                                            <div class="d-flex justify-content-center">
                                                                <a class="text-body">
                                                                    <strong class="text-15pt mr-2">{{ $activity->description }}</strong>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row align-items-center projects-item mb-1">
                                    <div class="col-sm-auto mb-1 mb-sm-0"></div>
                                    <div class="col-sm">
                                        <div class="card m-0">
                                            <div class="px-4 py-3">
                                                <div class="row align-items-center">
                                                    <div class="col mw-300px">
                                                        <div class="d-flex justify-content-center">
                                                            <a class="text-body">
                                                                <strong class="text-15pt mr-2 text-danger">{{ __('messages.no_activities_yet') }}</strong>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


{{--    <nav class="nav nav-pills nav-justified w-100" role="tablist">--}}
{{--        <a href="#invoices" class="h6 nav-item nav-link bg-secondary text-white active show" data-toggle="tab" role="tab" aria-selected="true">{{ __('messages.invoices') }}</a>--}}
{{--        <a href="#estimates" class="h6 nav-item nav-link bg-secondary text-white" data-toggle="tab" role="tab" aria-selected="false">{{ __('messages.estimates') }}</a>--}}
{{--        <a href="#payments" class="h6 nav-item nav-link bg-secondary text-white" data-toggle="tab" role="tab" aria-selected="false">{{ __('messages.payments') }}</a>--}}
{{--        <a href="#activities" class="h6 nav-item nav-link bg-secondary text-white" data-toggle="tab" role="tab" aria-selected="false">{{ __('messages.activities') }}</a>--}}
{{--    </nav>--}}

{{--    <div class="tab-content">--}}
{{--        <div class="tab-pane active show" id="invoices">--}}
{{--            <div class="card">--}}
{{--                @include('application.invoices._table')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="tab-pane" id="estimates">--}}
{{--            <div class="card">--}}
{{--                @include('application.estimates._table')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="tab-pane" id="payments">--}}
{{--            <div class="card">--}}
{{--                @include('application.payments._table')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="tab-pane" id="activities">--}}
{{--            <div class="container-fluid page__container">--}}
{{--                <p class="text-dark-gray d-flex align-items-center mt-3">--}}
{{--                    <i class="material-icons icon-muted mr-2">dvr</i>--}}
{{--                    <strong>{{ __('messages.activities') }}</strong>--}}
{{--                </p>--}}

{{--                @if($activities->count() > 0)--}}
{{--                    @foreach($activities as $activity)--}}
{{--                        <div class="row align-items-center projects-item mb-1">--}}
{{--                            <div class="col-sm-auto mb-1 mb-sm-0">--}}
{{--                                <div class="text-dark-gray">{{ $activity->created_at->format($currentCompany->getSetting('date_format')) }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm">--}}
{{--                                <div class="card m-0">--}}
{{--                                    <div class="px-4 py-3">--}}
{{--                                        <div class="row align-items-center">--}}
{{--                                            <div class="col mw-300px">--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <a class="text-body">--}}
{{--                                                        <strong class="text-15pt mr-2">{{ $activity->description }}</strong>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                    <div class="row align-items-center projects-item mb-1">--}}
{{--                        <div class="col-sm-auto mb-1 mb-sm-0"></div>--}}
{{--                        <div class="col-sm">--}}
{{--                            <div class="card m-0">--}}
{{--                                <div class="px-4 py-3">--}}
{{--                                    <div class="row align-items-center">--}}
{{--                                        <div class="col mw-300px">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <a class="text-body">--}}
{{--                                                    <strong class="text-15pt mr-2">{{ __('messages.no_activities_yet') }}</strong>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
