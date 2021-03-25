@extends('layouts.app', ['page' => 'invoices'])

@section('title', __('messages.invoice_details'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.invoices') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.invoice_details') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.invoice_details') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.invoice_details') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Form</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.invoice_details') }}
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
                        <h4 class="card-title" id="basic-layout-round-controls">Invoice Details</h4>
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
                            <div  class="">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="h2 pb-4">
                                            #{{ $invoice->invoice_number }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-8 text-right">
                                        <div class="btn-group " role="group">
                                            <a href="{{ route('pdf.invoice', ['invoice' => $invoice->uid, 'download' => true]) }}" target="_blank" class="btn btn-sm btn-pinterest round">
                                                <i class="ft-download-cloud"></i>
                                                <span>Download</span>

                                            </a>
                                            <a href="{{ route('invoices.send', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest alert-confirm" data-alert-title="Are you sure?" data-alert-text="This action will send an email to customer.">
                                                <i class="ft-share"></i>
                                                <span>Send</span>
                                            </a>
                                            <a href="{{ route('payments.create', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" target="_blank" class="btn btn-sm   btn-pinterest">
                                                <i class="ft-credit-card"></i>
                                                <span>Payment</span>

                                            </a>
                                            <a href="{{ route('invoices.edit', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest">
                                                <i class="ft-edit"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a href="{{ route('invoices.mark', ['invoice' => $invoice->id, 'status' => 'paid', 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest">
                                                <i class="ft-check"></i>
                                                <span>{{ __('messages.mark_paid') }}</span>
                                            </a>
                                            <a href="{{ route('invoices.mark', ['invoice' => $invoice->id, 'status' => 'sent', 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest">
                                                <i class="ft-check-circle"></i>
                                                <span>{{ __('messages.mark_sent') }}</span>
                                            </a>
                                            <a href="{{ route('invoices.delete', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest round">
                                                <i class="ft-trash"></i>
                                                <span>{{ __('messages.delete') }}</span>
                                            </a>

{{--                                            <div class="btn-group">--}}
{{--                                                <button type="button" class="btn btn-light dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    {{ __('messages.more') }} <span class="caret"></span>--}}
{{--                                                </button>--}}
{{--                                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                    <a href="{{ route('invoices.mark', ['invoice' => $invoice->id, 'status' => 'paid', 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item">{{ __('messages.mark_paid') }}</a>--}}
{{--                                                    <a href="{{ route('invoices.mark', ['invoice' => $invoice->id, 'status' => 'sent', 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item">{{ __('messages.mark_sent') }}</a>--}}
{{--                                                    <hr>--}}
{{--                                                    <a href="{{ route('invoices.delete', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item text-danger delete-confirm">{{ __('messages.delete') }}</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        @if($invoice->status == 'DRAFT')
{{--                                            <div class="alert alert-soft-dark d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">access_time</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}</div>--}}
{{--                                            </div>--}}
                                            <div class="alert alert-dark alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-watch text-dark"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}
                                            </div>
                                        @elseif($invoice->status == 'SENT')
{{--                                            <div class="alert alert-soft-info d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">send</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}</div>--}}
{{--                                            </div>--}}
                                            <div class="alert alert-light-info alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="la-send"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}
                                            </div>
                                        @elseif($invoice->status == 'VIEWED')
{{--                                            <div class="alert alert-soft-primary d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">visibility</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}</div>--}}
{{--                                            </div>--}}
                                            <div class="alert alert-light-primary alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-eye"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}
                                            </div>
                                        @elseif($invoice->status == 'OVERDUE')
{{--                                            <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">schedule</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.overdue') }}</div>--}}
{{--                                            </div>--}}

                                            <div class="alert alert-light-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-alert-circle"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.overdue') }}
                                            </div>
                                        @elseif($invoice->status == 'COMPLETED')
{{--                                            <div class="alert alert-soft-success d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">done</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.payment_received') }}</div>--}}
{{--                                            </div>--}}
                                            <div class="alert alert-light-success alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-check"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.payment_received') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="pdf-iframe">
                                    <iframe src="{{ route('pdf.invoice', $invoice->uid) }}" frameborder="0" style="width: 100%; height: 100vh"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



{{--    <div class="row">--}}
{{--        <div class="col-12 col-md-4">--}}
{{--            <p class="h2 pb-4">--}}
{{--                #{{ $invoice->invoice_number }}--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="col-12 col-md-8 text-right">--}}
{{--            <div class="btn-group mb-2">--}}
{{--                <a href="{{ route('pdf.invoice', ['invoice' => $invoice->uid, 'download' => true]) }}" target="_blank" class="btn btn-light">--}}
{{--                    <i class="material-icons">cloud_download</i>--}}
{{--                    {{ __('messages.download') }}--}}
{{--                </a>--}}
{{--                <a href="{{ route('invoices.send', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light alert-confirm" data-alert-title="Are you sure?" data-alert-text="This action will send an email to customer.">--}}
{{--                    <i class="material-icons">send</i>--}}
{{--                    {{ __('messages.send_email') }}--}}
{{--                </a>--}}
{{--                <a href="{{ route('payments.create', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" target="_blank" class="btn btn-light">--}}
{{--                    <i class="material-icons">payment</i>--}}
{{--                    {{ __('messages.enter_payment') }}--}}
{{--                </a>--}}
{{--                <a href="{{ route('invoices.edit', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light">--}}
{{--                    <i class="material-icons">edit</i>--}}
{{--                    {{ __('messages.edit') }}--}}
{{--                </a>--}}
{{--                <div class="btn-group">--}}
{{--                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
{{--                        {{ __('messages.more') }} <span class="caret"></span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                        <a href="{{ route('invoices.mark', ['invoice' => $invoice->id, 'status' => 'paid', 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item">{{ __('messages.mark_paid') }}</a>--}}
{{--                        <a href="{{ route('invoices.mark', ['invoice' => $invoice->id, 'status' => 'sent', 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item">{{ __('messages.mark_sent') }}</a>--}}
{{--                        <hr>--}}
{{--                        <a href="{{ route('invoices.delete', ['invoice' => $invoice->id, 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item text-danger delete-confirm">{{ __('messages.delete') }}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-12">--}}
{{--            @if($invoice->status == 'DRAFT')--}}
{{--                <div class="alert alert-soft-dark d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">access_time</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($invoice->status == 'SENT')--}}
{{--                <div class="alert alert-soft-info d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">send</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($invoice->status == 'VIEWED')--}}
{{--                <div class="alert alert-soft-primary d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">visibility</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($invoice->status == 'OVERDUE')--}}
{{--                <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">schedule</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.overdue') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($invoice->status == 'COMPLETED')--}}
{{--                <div class="alert alert-soft-success d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">done</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.payment_received') }}</div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="pdf-iframe">--}}
{{--        <iframe src="{{ route('pdf.invoice', $invoice->uid) }}" frameborder="0"></iframe>--}}
{{--    </div>--}}
@endsection
