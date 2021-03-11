@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.product_settings'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.product_settings') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.product_settings') }}</h1>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.product_settings') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.product_settings') }}
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
                            <form action="{{ route('settings.product.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                @include('layouts._form_errors')
                                @csrf

                                <div class="form-group mb-4">
                                    <p class="h5 mb-0">
                                        <strong class="headings-color">{{ __('messages.product_settings') }}</strong>
                                    </p>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="discount_per_item">{{ __('messages.discount_per_item') }}</label><br>
                                            <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                <input type="checkbox" name="discount_per_item" id="discount_per_item" {{ $currentCompany->getSetting('discount_per_item') ? 'checked' : '' }} class="custom-control-input">
                                                <label class="custom-control-label" for="discount_per_item">{{ __('messages.yes') }}</label>
                                            </div>
                                            <label for="discount_per_item" class="mb-0">{{ __('messages.yes') }}</label>
                                            <small class="form-text text-muted">
                                                {{ __('messages.discount_per_item_description') }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tax_per_item">{{ __('messages.tax_per_item') }}</label><br>
                                            <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                <input type="checkbox" name="tax_per_item" id="tax_per_item" {{ $currentCompany->getSetting('tax_per_item') ? 'checked' : '' }} class="custom-control-input">
                                                <label class="custom-control-label" for="tax_per_item">{{ __('messages.yes') }}</label>
                                            </div>
                                            <label for="tax_per_item" class="mb-0">{{ __('messages.yes') }}</label>
                                            <small class="form-text text-muted">
                                                {{ __('messages.tax_per_item_description') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('messages.product_units') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>

{{--                            <span class="dropdown">--}}
{{--                          <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                  aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>--}}
{{--                          <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-calendar"></i> Due Date</a>--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-random"></i> Priority </a>--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i> Progress</a>--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign to</a>--}}
{{--                          </span>--}}
{{--                        </span>--}}
{{--                            <button class="btn btn-success btn-sm"><i class="ft-settings white"></i></button>--}}
{{--                        </div>--}}
                    </div>

                        <div class="card-content">
                        <div class="card-body">
                            <a class="btn btn-primary btn-sm" href="{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}"><i class="ft-plus white"></i> Submit Bug</a>

                            {{--                            <div class="form-row align-items-center mb-4">--}}
{{--                                <div class="col">--}}
{{--                                    <p class="h5 mb-0">--}}
{{--                                        <strong class="headings-color">{{ __('messages.product_units') }}</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <a href="{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-light">--}}
{{--                                        <i class="material-icons icon-16pt">add</i>--}}
{{--                                        {{ __('messages.add_product_unit') }}--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            @include('application.settings.product.unit._table')
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
                        @include('application.settings._aside', ['tab' => 'product'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<div class="row">--}}
{{--        <div class="col-lg-3">--}}
{{--            @include('application.settings._aside', ['tab' => 'product'])--}}
{{--        </div>--}}
{{--        <div class="col-lg-9">--}}

{{--            <div class="card card-form">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col card-form__body card-body bg-white">--}}
{{--                        <form action="{{ route('settings.product.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">--}}
{{--                            @include('layouts._form_errors')--}}
{{--                            @csrf--}}

{{--                            <div class="form-group mb-4">--}}
{{--                                <p class="h5 mb-0">--}}
{{--                                    <strong class="headings-color">{{ __('messages.product_settings') }}</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="discount_per_item">{{ __('messages.discount_per_item') }}</label><br>--}}
{{--                                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">--}}
{{--                                            <input type="checkbox" name="discount_per_item" id="discount_per_item" {{ $currentCompany->getSetting('discount_per_item') ? 'checked' : '' }} class="custom-control-input">--}}
{{--                                            <label class="custom-control-label" for="discount_per_item">{{ __('messages.yes') }}</label>--}}
{{--                                        </div>--}}
{{--                                        <label for="discount_per_item" class="mb-0">{{ __('messages.yes') }}</label>--}}
{{--                                        <small class="form-text text-muted">--}}
{{--                                            {{ __('messages.discount_per_item_description') }}--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="tax_per_item">{{ __('messages.tax_per_item') }}</label><br>--}}
{{--                                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">--}}
{{--                                            <input type="checkbox" name="tax_per_item" id="tax_per_item" {{ $currentCompany->getSetting('tax_per_item') ? 'checked' : '' }} class="custom-control-input">--}}
{{--                                            <label class="custom-control-label" for="tax_per_item">{{ __('messages.yes') }}</label>--}}
{{--                                        </div>--}}
{{--                                        <label for="tax_per_item" class="mb-0">{{ __('messages.yes') }}</label>--}}
{{--                                        <small class="form-text text-muted">--}}
{{--                                            {{ __('messages.tax_per_item_description') }}--}}
{{--                                        </small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group text-right mt-4">--}}
{{--                                <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card card-form">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col card-form__body card-body bg-white">--}}

{{--                        <div class="form-row align-items-center mb-4">--}}
{{--                            <div class="col">--}}
{{--                                <p class="h5 mb-0">--}}
{{--                                    <strong class="headings-color">{{ __('messages.product_units') }}</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <a href="{{ route('settings.product.unit.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-light">--}}
{{--                                    <i class="material-icons icon-16pt">add</i>--}}
{{--                                    {{ __('messages.add_product_unit') }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        @include('application.settings.product.unit._table')--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
@endsection

