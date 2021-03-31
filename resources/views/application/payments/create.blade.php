@extends('layouts.app', ['page' => 'payments'])

@section('title', __('messages.create_payment'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.payments') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_payment') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.create_payment') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.create_payment') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.payments') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.create_payment') }}
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
                        <h4 class="card-title" id="basic-layout-round-controls">{{ __('messages.create_payment') }}</h4>
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
                                <form action="{{ route('payments.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                    @include('layouts._form_errors')
                                    @csrf

                                    @include('application.payments._form')
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function(){
            $('#invoice_select').select2({
                placeholder: "{{ __('messages.select_invoice') }}",
            })

            $("#customer").select2({
                placeholder: "{{ __('messages.customer') }}",
                ajax: {
                    url: "{{ route('ajax.customers', ['company_uid' => $currentCompany->uid]) }}",
                    type: "get",
                    dataType: "json",
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
                templateSelection: function (data, container) {
                    $(data.element).attr('data-currency', JSON.stringify(data.currency));
                    return data.text;
                }
            });

            $("#customer").change(function() {
                var customer_id = $("#customer").val();
                var currency = $('#customer').find(':selected').data('currency');
                console.log(currency);
                setupPriceInput(currency);

                $.get("{{ route('ajax.invoices', ['company_uid' => $currentCompany->uid]) }}", {customer_id: customer_id}, function(response) {
                    if(!jQuery.isEmptyObject(response)) {
                        $('#invoice_select').empty();
                        $('#invoice_select').select2({
                            placeholder: 'Select Invoice',
                            data: response,
                            templateSelection: function (data, container) {
                                $(data.element).attr('data-due_amount', data.due_amount);
                                return data.text;
                            }
                        });

                        $('#amount').val($('#invoice_select').find(':selected').data('due_amount'));
                        $("#amount").focusout();
                    }
                });
            });
        });
    </script>
@endsection
