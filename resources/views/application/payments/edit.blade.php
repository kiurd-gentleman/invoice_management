@extends('layouts.app', ['page' => 'payments'])

@section('title', __('messages.create_payment'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.payments') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.update_payment') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0 h3">{{ __('messages.update_payment') }}</h1>--}}
{{--        </div>--}}
{{--        <a href="{{ route('pdf.payment', ['payment' => $payment->uid, 'download' => true]) }}" target="_blank" class="btn btn-info">--}}
{{--            <i class="material-icons">cloud_download</i>--}}
{{--            {{ __('messages.download') }}--}}
{{--        </a>--}}
{{--        <a href="{{ route('payments.delete', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger ml-3 delete-confirm">--}}
{{--            <i class="material-icons">delete</i>--}}
{{--            {{ __('messages.delete_payment') }}--}}
{{--        </a>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.update_payment') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.payments') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.update_payment') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
{{--        <div class="content-header-right col-md-6 col-12">--}}
{{--            <div class="media width-250 float-right">--}}
{{--                <div class="media-body media-right text-right">--}}
{{--                    <div class="btn-group">--}}
{{--                        <a href="{{ route('pdf.payment', ['payment' => $payment->uid, 'download' => true]) }}" target="_blank" class="btn btn-info btn-sm">--}}
{{--                            <i class="ft-download-cloud"></i>--}}
{{--                            {{ __('messages.download') }}--}}
{{--                        </a>--}}
{{--                        <a href="{{ route('payments.delete', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger btn-sm delete-confirm">--}}
{{--                            <i class="ft-trash"></i>--}}
{{--                            {{ __('messages.delete_payment') }}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection

@section('content')


    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-round-controls">Payment Create</h4>
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
                            <div  class="container">
                                <form action="{{ route('payments.update', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}" method="POST">
                                    @include('layouts._form_errors')
                                    @csrf

                                    @include('application.payments._form')


                                    <div class="form-group text-center mt-3">
                                        <button type="button" class="btn btn-primary btn-sm form_with_price_input_submit">{{ __('messages.save_payment') }}</button>
                                        <a href="{{ route('pdf.payment', ['payment' => $payment->uid, 'download' => true]) }}" target="_blank" class="btn btn-info btn-sm">
                                            <i class="ft-download-cloud"></i>
                                            {{ __('messages.download') }}
                                        </a>
                                        <a href="{{ route('payments.delete', ['payment' => $payment->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-danger btn-sm delete-confirm">
                                            <i class="ft-trash"></i>
                                            {{ __('messages.delete_payment') }}
                                        </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection

@section('page_body_scripts')
    <script>
        $(document).ready(function(){
            $('#invoice_select').prop('disabled', true);
            $('#customer').prop('disabled', true);
        });
    </script>
@endsection
