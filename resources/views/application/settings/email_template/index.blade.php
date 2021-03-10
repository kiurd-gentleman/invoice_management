@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.email_templates'))

@section('page_head_scripts')
    <!-- Quill Theme -->
    <link type="text/css" href="{{ asset('assets/css/vendor-quill.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-quill.rtl.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.account_settings') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.email_templates') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <div class="content-detached content-right">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Bugs</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Submit Bug</button>
                                <span class="dropdown">
                          <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                                  aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>
                          <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="la la-calendar"></i> Due Date</a>
                            <a href="#" class="dropdown-item"><i class="la la-random"></i> Priority </a>
                            <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i> Progress</a>
                            <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign to</a>
                          </span>
                        </span>
                                <button class="btn btn-success btn-sm"><i class="ft-settings white"></i></button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->
                                <form action="{{ route('settings.email_template.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                    @include('layouts._form_errors')
                                    @csrf

                                    <div class="form-group mb-4">
                                        <p class="h5 mb-0">
                                            <strong class="headings-color">{{ __('messages.invoice_mail') }}</strong>
                                        </p>
                                        <p class="text-muted">{{ __('messages.invoice_mail_description') }} <a href="#" data-toggle="modal" data-target="#modal-invoice-tags">{{ __('messages.show_templates') }}</a></p>
                                    </div>

                                    <div class="form-group required">
                                        <label for="invoice_mail_subject">{{ __('messages.subject') }}</label>
                                        <input name="invoice_mail_subject" type="text" class="form-control" placeholder="{{ __('messages.invoice_mail_subject') }}" value="{{ $currentCompany->getSetting('invoice_mail_subject') }}" required>
                                    </div>

                                    <div class="form-group required">
                                        <label>{{ __('messages.content') }}</label>
                                        <div class="quill h-250px" data-toggle="quill" data-quill-placeholder="{{ __('messages.invoice_mail_content') }}" data-quill-modules-toolbar='[["bold", "italic", "underline"], ["link", "blockquote"], [{"list": "ordered"}, {"list": "bullet"}]]'>
                                            {!! $currentCompany->getSetting('invoice_mail_content') !!}
                                        </div>
                                        <textarea name="invoice_mail_content" class="d-none" required>{!! $currentCompany->getSetting('invoice_mail_content') !!}</textarea>
                                    </div>

                                    <hr class="mt-5 mb-5">

                                    <div class="form-group mb-4">
                                        <p class="h5 mb-0">
                                            <strong class="headings-color">{{ __('messages.estimate_mail') }}</strong>
                                        </p>
                                        <p class="text-muted">{{ __('messages.estimate_mail_description') }} <a href="#" data-toggle="modal" data-target="#modal-estimate-tags">{{ __('messages.show_templates') }}</a></p>
                                    </div>

                                    <div class="form-group required">
                                        <label for="estimate_mail_subject">{{ __('messages.subject') }}</label>
                                        <input name="estimate_mail_subject" type="text" class="form-control" placeholder="{{ __('messages.estimate_mail_subject') }}" value="{{ $currentCompany->getSetting('estimate_mail_subject') }}" required>
                                    </div>

                                    <div class="form-group required">
                                        <label>{{ __('messages.content') }}</label>
                                        <div class="quill h-250px" data-toggle="quill" data-quill-placeholder="{{ __('messages.estimate_mail_content') }}" data-quill-modules-toolbar='[["bold", "italic", "underline"], ["link", "blockquote"], [{"list": "ordered"}, {"list": "bullet"}]]'>
                                            {!! $currentCompany->getSetting('estimate_mail_content') !!}
                                        </div>
                                        <textarea name="estimate_mail_content" class="d-none" required>{!! $currentCompany->getSetting('estimate_mail_content') !!}</textarea>
                                    </div>

                                    <hr class="mt-5 mb-5">

                                    <div class="form-group mb-4">
                                        <p class="h5 mb-0">
                                            <strong class="headings-color">{{ __('messages.payment_receipt_mail') }}</strong>
                                        </p>
                                        <p class="text-muted">{{ __('messages.payment_receipt_mail_description') }} <a href="#" data-toggle="modal" data-target="#modal-payment-tags">{{ __('messages.show_templates') }}</a></p>
                                    </div>

                                    <div class="form-group required">
                                        <label for="payment_mail_subject">{{ __('messages.subject') }}</label>
                                        <input name="payment_mail_subject" type="text" class="form-control" placeholder="{{ __('messages.payment_receipt_mail_subject') }}" value="{{ $currentCompany->getSetting('payment_mail_subject') }}" required>
                                    </div>

                                    <div class="form-group required">
                                        <label>{{ __('messages.content') }}</label>
                                        <div class="quill h-250px" data-toggle="quill" data-quill-placeholder="{{ __('messages.payment_receipt_mail_content') }}" data-quill-modules-toolbar='[["bold", "italic", "underline"], ["link", "blockquote"], [{"list": "ordered"}, {"list": "bullet"}]]'>
                                            {!! $currentCompany->getSetting('payment_mail_content') !!}
                                        </div>
                                        <textarea name="payment_mail_content" class="d-none" required>{!! $currentCompany->getSetting('payment_mail_content') !!}</textarea>
                                    </div>

                                    <div class="form-group text-right mt-4">
                                        <button type="button" class="btn btn-primary submit">{{ __('messages.update_settings') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="sidebar-detached sidebar-left">
        <div class="sidebar">
            <div class="bug-list-sidebar-content">
                <!-- Predefined Views -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Predefined Views</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- bug-list search -->
                    <div class="card-content">
                        <!-- /bug-list search -->
                        <!-- bug-list view -->
                        <div class="card-body ">
                            @include('application.settings._aside', ['tab' => 'email_template'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_body_scripts')
    <div id="modal-invoice-tags" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-large-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-large-title">{{ __('messages.template_tags') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('messages.close') }}">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('messages.company_name') }} : <kbd>{company.name}</kbd></p>
                    <br>

                    <p>{{ __('messages.customer_display_name') }} : <kbd>{customer.display_name}</kbd></p>
                    <p>{{ __('messages.customer_contact_name') }} : <kbd>{customer.contact_name}</kbd></p>
                    <p>{{ __('messages.customer_email') }} : <kbd>{customer.email}</kbd></p>
                    <p>{{ __('messages.customer_phone') }} : <kbd>{customer.phone}</kbd></p>
                    <br>

                    <p>{{ __('messages.invoice_number') }} : <kbd>{invoice.number}</kbd></p>
                    <p>{{ __('messages.invoice_pdf_view_link') }} : <kbd>{invoice.link}</kbd></p>
                    <p>{{ __('messages.invoice_date') }} : <kbd>{invoice.date}</kbd></p>
                    <p>{{ __('messages.invoice_due_date') }} : <kbd>{invoice.due_date}</kbd></p>
                    <p>{{ __('messages.invoice_reference_no') }} : <kbd>{invoice.reference}</kbd></p>
                    <p>{{ __('messages.invoice_notes') }} : <kbd>{invoice.notes}</kbd></p>
                    <p>{{ __('messages.invoice_sub_total') }} : <kbd>{invoice.sub_total}</kbd></p>
                    <p>{{ __('messages.invoice_total') }} : <kbd>{invoice.total}</kbd></p>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('messages.close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-estimate-tags" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-large-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-large-title">{{ __('messages.template_tags') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('messages.close') }}">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('messages.company_name') }} : <kbd>{company.name}</kbd></p>
                    <br>

                    <p>{{ __('messages.customer_display_name') }} : <kbd>{customer.display_name}</kbd></p>
                    <p>{{ __('messages.customer_contact_name') }} : <kbd>{customer.contact_name}</kbd></p>
                    <p>{{ __('messages.customer_email') }} : <kbd>{customer.email}</kbd></p>
                    <p>{{ __('messages.customer_phone') }} : <kbd>{customer.phone}</kbd></p>
                    <br>

                    <p>{{ __('messages.estimate_number') }} : <kbd>{estimate.number}</kbd></p>
                    <p>{{ __('messages.estimate_pdf_view_link') }} : <kbd>{estimate.link}</kbd></p>
                    <p>{{ __('messages.estimate_date') }} : <kbd>{estimate.date}</kbd></p>
                    <p>{{ __('messages.estimate_expiry_date') }} : <kbd>{estimate.expiry_date}</kbd></p>
                    <p>{{ __('messages.estimate_reference_no') }} : <kbd>{estimate.reference}</kbd></p>
                    <p>{{ __('messages.estimate_notes') }} : <kbd>{estimate.notes}</kbd></p>
                    <p>{{ __('messages.estimate_sub_total') }} : <kbd>{estimate.sub_total}</kbd></p>
                    <p>{{ __('messages.estimate_total') }} : <kbd>{estimate.total}</kbd></p>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('messages.close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-payment-tags" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-large-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-large-title">{{ __('messages.template_tags') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('messages.close') }}">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('messages.company_name') }} : <kbd>{company.name}</kbd></p>
                    <br>

                    <p>{{ __('messages.customer_display_name') }} : <kbd>{customer.display_name}</kbd></p>
                    <p>{{ __('messages.customer_contact_name') }} : <kbd>{customer.contact_name}</kbd></p>
                    <p>{{ __('messages.customer_email') }} : <kbd>{customer.email}</kbd></p>
                    <p>{{ __('messages.customer_phone') }} : <kbd>{customer.phone}</kbd></p>
                    <br>

                    <p>{{ __('messages.payment_number') }} : <kbd>{payment.number}</kbd></p>
                    <p>{{ __('messages.payment_date') }} : <kbd>{payment.date}</kbd></p>
                    <p>{{ __('messages.payment_notes') }} : <kbd>{payment.notes}</kbd></p>
                    <p>{{ __('messages.payment_receipt_link') }} : <kbd>{payment.link}</kbd></p>
                    <p>{{ __('messages.payment_type') }} : <kbd>{payment.type}</kbd></p>
                    <p>{{ __('messages.payment_total') }} : <kbd>{payment.amount}</kbd></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('messages.close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quill -->
    <script src="{{ asset('assets/vendor/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill.js') }}"></script>

    <script>
        $('.submit').on('click', function() {
            var form = $(this).closest('form');

            var quill = $('.ql-editor').each(function (index, element) {
                var text_area = $(element).closest('.form-group').find('textarea');
                text_area.val($(element).html());
            });

            form.submit();
        });
    </script>
@endsection

