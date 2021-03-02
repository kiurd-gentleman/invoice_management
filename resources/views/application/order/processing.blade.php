@extends('layouts.onboard')

@section('title', __('messages.order_processing'))

@section('content')
    <div class="page__heading">
        <h1>{{ __('messages.order_processing') }}</h1>
    </div> 

    <div class="row card-group-row pt-2">
        <div class="card">
            <div class="card-header" id="paypal">
                <h5 class="mb-0">
                    <button class="btn btn-link">
                        {{ __('messages.order_processing') }} 
                    </button>
                </h5>
            </div>

            <div class="collapse show">
                <div class="card-body">
                    <h4>{{ __('messages.mollie_processing') }}</h4>
                    <a class="btn btn-primary" href="{{ route('order.processing', ['orderId' => $orderId]) }}">
                        {{ __('messages.refresh_page') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
