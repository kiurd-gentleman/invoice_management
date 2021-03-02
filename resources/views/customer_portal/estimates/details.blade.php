@extends('layouts.customer_portal', ['page' => 'estimates'])

@section('title', __('messages.estimate_details'))
 
@section('page_header')
    <div class="page__heading d-flex align-items-center">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                    <li class="breadcrumb-item" aria-current="page">{{ __('messages.portal') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.estimate_details') }}</li>
                </ol>
            </nav>
            <h1 class="m-0">{{ __('messages.estimate_details') }}</h1>
        </div>
    </div>
@endsection
 
@section('content') 
    <div class="row">
        <div class="col-12 col-md-4">
            <p class="h2 pb-4">
                #{{ $estimate->estimate_number }}
            </p>
        </div>
        <div class="col-12 col-md-8 text-right">
            <div class="mb-2">
                <a href="{{ route('pdf.estimate', ['estimate' => $estimate->uid, 'download' => true]) }}" target="_blank" class="btn btn-light">
                    <i class="material-icons">cloud_download</i> 
                    {{ __('messages.download') }}
                </a>
                @if(!in_array($estimate->status, ['ACCEPTED', 'REJECTED']))
                    <a href="{{ route('customer_portal.estimates.mark', ['customer' => $currentCustomer->uid, 'estimate' => $estimate->uid, 'status' => 'accepted']) }}" class="btn btn-success">
                        <i class="material-icons">check</i> 
                        {{ __('messages.accept') }}
                    </a>
                    <a href="{{ route('customer_portal.estimates.mark', ['customer' => $currentCustomer->uid, 'estimate' => $estimate->uid, 'status' => 'rejected']) }}" class="btn btn-danger">
                        <i class="material-icons">cancel</i> 
                        {{ __('messages.reject') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="col-12 mb-4">
            @if($estimate->status == 'EXPIRED')
                <div class="alert alert-soft-danger d-flex align-items-center" role="alert">
                    <i class="material-icons mr-3">schedule</i>
                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.expired') }}</div>
                </div>
            @elseif($estimate->status == 'ACCEPTED')
                <div class="alert alert-soft-success d-flex align-items-center" role="alert">
                    <i class="material-icons mr-3">done</i>
                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.accepted') }}</div>
                </div>
            @elseif($estimate->status == 'REJECTED')
                <div class="alert alert-soft-danger d-flex align-items-center" role="alert">
                    <i class="material-icons mr-3">cancel</i>
                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.rejected') }}</div>
                </div>
            @else
                <div class="alert alert-soft-info d-flex align-items-center" role="alert">
                    <i class="material-icons mr-3">send</i>
                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.waiting_approval') }}</div>
                </div>
            @endif
        </div>
    </div>
    <div class="pdf-iframe">
        <iframe src="{{ route('pdf.estimate', $estimate->uid) }}" frameborder="0"></iframe>
    </div>
@endsection
