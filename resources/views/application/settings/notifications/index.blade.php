@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.notification_settings'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.notification_settings') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.notification_settings') }}</h1>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.notification_settings') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.notification_settings') }}
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
                            <form action="{{ route('settings.notifications.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                @include('layouts._form_errors')
                                @csrf

                                <div class="form-group mb-4">
                                    <p class="h5 mb-0">
                                        <strong class="headings-color">{{ __('messages.notifications') }}</strong>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <input type="checkbox" name="notification_invoice_sent" id="notification_invoice_sent" {{ $authUser->getSetting('notification_invoice_sent') ? 'checked' : '' }} class="custom-control-input">
                                        <label class="custom-control-label" for="notification_invoice_sent">{{ __('messages.yes') }}</label>
                                    </div>
                                    <label for="notification_invoice_sent" class="mb-0">{{ __('messages.email_when_invoice_sent') }}</label>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <input type="checkbox" name="notification_invoice_viewed" id="notification_invoice_viewed" {{ $authUser->getSetting('notification_invoice_viewed') ? 'checked' : '' }} class="custom-control-input">
                                        <label class="custom-control-label" for="notification_invoice_viewed">{{ __('messages.yes') }}</label>
                                    </div>
                                    <label for="notification_invoice_viewed" class="mb-0">{{ __('messages.email_when_invoice_viewed') }}</label>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <input type="checkbox" name="notification_invoice_paid" id="notification_invoice_paid" {{ $authUser->getSetting('notification_invoice_paid') ? 'checked' : '' }} class="custom-control-input">
                                        <label class="custom-control-label" for="notification_invoice_paid">{{ __('messages.yes') }}</label>
                                    </div>
                                    <label for="notification_invoice_paid" class="mb-0">{{ __('messages.email_when_invoice_paid') }}</label>
                                </div>


                                <div class="form-group">
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <input type="checkbox" name="notification_estimate_sent" id="notification_estimate_sent" {{ $authUser->getSetting('notification_estimate_sent') ? 'checked' : '' }} class="custom-control-input">
                                        <label class="custom-control-label" for="notification_estimate_sent">{{ __('messages.yes') }}</label>
                                    </div>
                                    <label for="notification_estimate_sent" class="mb-0">{{ __('messages.email_when_estimate_sent') }}</label>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <input type="checkbox" name="notification_estimate_viewed" id="notification_estimate_viewed" {{ $authUser->getSetting('notification_estimate_viewed') ? 'checked' : '' }} class="custom-control-input">
                                        <label class="custom-control-label" for="notification_estimate_viewed">{{ __('messages.yes') }}</label>
                                    </div>
                                    <label for="notification_estimate_viewed" class="mb-0">{{ __('messages.email_when_estimate_viewed') }}</label>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                        <input type="checkbox" name="notification_estimate_approved_or_rejected" id="notification_estimate_approved_or_rejected" {{ $authUser->getSetting('notification_estimate_approved_or_rejected') ? 'checked' : '' }} class="custom-control-input">
                                        <label class="custom-control-label" for="notification_estimate_approved_or_rejected">{{ __('messages.yes') }}</label>
                                    </div>
                                    <label for="notification_estimate_approved_or_rejected" class="mb-0">{{ __('messages.email_when_estimate_accepted_or_rejected') }}</label>
                                </div>

                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>
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
                        @include('application.settings._aside', ['tab' => 'notification'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<div class="row">
        <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'notification'])
        </div>
        <div class="col-lg-9">

            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">
                        <form action="{{ route('settings.notifications.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf

                            <div class="form-group mb-4">
                                <p class="h5 mb-0">
                                    <strong class="headings-color">{{ __('messages.notifications') }}</strong>
                                </p>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" name="notification_invoice_sent" id="notification_invoice_sent" {{ $authUser->getSetting('notification_invoice_sent') ? 'checked' : '' }} class="custom-control-input">
                                    <label class="custom-control-label" for="notification_invoice_sent">{{ __('messages.yes') }}</label>
                                </div>
                                <label for="notification_invoice_sent" class="mb-0">{{ __('messages.email_when_invoice_sent') }}</label>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" name="notification_invoice_viewed" id="notification_invoice_viewed" {{ $authUser->getSetting('notification_invoice_viewed') ? 'checked' : '' }} class="custom-control-input">
                                    <label class="custom-control-label" for="notification_invoice_viewed">{{ __('messages.yes') }}</label>
                                </div>
                                <label for="notification_invoice_viewed" class="mb-0">{{ __('messages.email_when_invoice_viewed') }}</label>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" name="notification_invoice_paid" id="notification_invoice_paid" {{ $authUser->getSetting('notification_invoice_paid') ? 'checked' : '' }} class="custom-control-input">
                                    <label class="custom-control-label" for="notification_invoice_paid">{{ __('messages.yes') }}</label>
                                </div>
                                <label for="notification_invoice_paid" class="mb-0">{{ __('messages.email_when_invoice_paid') }}</label>
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" name="notification_estimate_sent" id="notification_estimate_sent" {{ $authUser->getSetting('notification_estimate_sent') ? 'checked' : '' }} class="custom-control-input">
                                    <label class="custom-control-label" for="notification_estimate_sent">{{ __('messages.yes') }}</label>
                                </div>
                                <label for="notification_estimate_sent" class="mb-0">{{ __('messages.email_when_estimate_sent') }}</label>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" name="notification_estimate_viewed" id="notification_estimate_viewed" {{ $authUser->getSetting('notification_estimate_viewed') ? 'checked' : '' }} class="custom-control-input">
                                    <label class="custom-control-label" for="notification_estimate_viewed">{{ __('messages.yes') }}</label>
                                </div>
                                <label for="notification_estimate_viewed" class="mb-0">{{ __('messages.email_when_estimate_viewed') }}</label>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input type="checkbox" name="notification_estimate_approved_or_rejected" id="notification_estimate_approved_or_rejected" {{ $authUser->getSetting('notification_estimate_approved_or_rejected') ? 'checked' : '' }} class="custom-control-input">
                                    <label class="custom-control-label" for="notification_estimate_approved_or_rejected">{{ __('messages.yes') }}</label>
                                </div>
                                <label for="notification_estimate_approved_or_rejected" class="mb-0">{{ __('messages.email_when_estimate_accepted_or_rejected') }}</label>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>--}}
@endsection

