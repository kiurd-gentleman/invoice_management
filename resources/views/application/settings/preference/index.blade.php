@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.preferences'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.preferences') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.preferences') }}</h1>--}}
{{--    </div>--}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.preferences') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.preferences') }}
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
                            <form action="{{ route('settings.preferences.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                @include('layouts._form_errors')
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <p class="h5 mb-0">
                                            <strong class="headings-color">{{ __('messages.preferences') }}</strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="currency_id">{{ __('messages.currency') }}</label>
                                            <select name="currency_id"  class="form-control select2"  required>
                                                <option disabled selected>{{ __('messages.select_currency') }}</option>
                                                @foreach(get_currencies_select2_array() as $option)
                                                    <option value="{{ $option['id'] }}" {{ $currentCompany->getSetting('currency_id') == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="langugage">{{ __('messages.language') }}</label>
                                            <select id="langugage" name="langugage"  class="form-control select2" >
                                                <option disabled selected>{{ __('messages.select_language') }}</option>
                                                @foreach(get_languages_select2_array() as $language)
                                                    <option value="{{ $language['id'] }}" selected>{{ $language['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="timezone">{{ __('messages.timezone') }}</label>
                                            <select id="timezone" name="timezone"  class="form-control select2">
                                                <option disabled selected>{{ __('messages.select_timezone') }}</option>
                                                @foreach(get_timezones_select2_array() as $timezone)
                                                    <option value="{{ $timezone['id'] }}" {{ $currentCompany->getSetting('timezone') == $timezone['id'] ? 'selected=""' : '' }}>{{ $timezone['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="date_format">{{ __('messages.date_format') }}</label>
                                            <select id="date_format" name="date_format" class="form-control select2" >
                                                <option disabled selected>{{ __('messages.select_date_format') }}</option>
                                                @foreach(get_date_formats_select2_array() as $date_format)
                                                    <option value="{{ $date_format['id'] }}" {{ $currentCompany->getSetting('date_format') == $date_format['id'] ? 'selected=""' : '' }}>{{ $date_format['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <p class="h6 mb-3">
                                            <strong class="headings-color">{{ __('messages.financial_year') }}</strong>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="financial_month_starts">{{ __('messages.month_starts') }}</label>
                                            <select id="financial_month_starts" name="financial_month_starts"   class="form-control select2" >
                                                <option disabled selected>{{ __('messages.select_month_starts') }}</option>
                                                @foreach(get_months_select2_array() as $month)
                                                    <option value="{{ $month['id'] }}" {{ $currentCompany->getSetting('financial_month_starts') == $month['id'] ? 'selected=""' : '' }} >{{ $month['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="financial_month_ends">{{ __('messages.month_ends') }}</label>
                                            <select id="financial_month_ends" name="financial_month_ends"  class="form-control select2">
                                                <option disabled selected>{{ __('messages.select_month_ends') }}</option>
                                                @foreach(get_months_select2_array() as $month)
                                                    <option value="{{ $month['id'] }}" {{ $currentCompany->getSetting('financial_month_ends') == $month['id'] ? 'selected=""' : '' }}>{{ $month['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right mt-5">
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
                        @include('application.settings._aside', ['tab' => 'preferences'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--    <div class="row">--}}
{{--        <div class="col-lg-3">--}}
{{--            @include('application.settings._aside', ['tab' => 'preferences'])--}}
{{--        </div>--}}
{{--        <div class="col-lg-9">--}}
{{--            <div class="card card-form">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col card-form__body card-body bg-white">--}}
{{--                        <form action="{{ route('settings.preferences.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">--}}
{{--                            @include('layouts._form_errors')--}}
{{--                            @csrf--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <p class="h5 mb-0">--}}
{{--                                        <strong class="headings-color">{{ __('messages.preferences') }}</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mt-3">--}}
{{--                                <div class="col">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="currency_id">{{ __('messages.currency') }}</label>--}}
{{--                                        <select name="currency_id" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="currency_id" required>--}}
{{--                                            <option disabled selected>{{ __('messages.select_currency') }}</option>--}}
{{--                                            @foreach(get_currencies_select2_array() as $option)--}}
{{--                                                <option value="{{ $option['id'] }}" {{ $currentCompany->getSetting('currency_id') == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="langugage">{{ __('messages.language') }}</label>--}}
{{--                                        <select id="langugage" name="langugage" data-toggle="select" data-minimum-results-for-search="-1" class="form-control select2-hidden-accessible" data-select2-id="langugage">--}}
{{--                                            <option disabled selected>{{ __('messages.select_language') }}</option>--}}
{{--                                            @foreach(get_languages_select2_array() as $language)--}}
{{--                                                <option value="{{ $language['id'] }}" selected>{{ $language['text'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mt-4">--}}
{{--                                <div class="col">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="timezone">{{ __('messages.timezone') }}</label>--}}
{{--                                        <select id="timezone" name="timezone" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="timezone">--}}
{{--                                            <option disabled selected>{{ __('messages.select_timezone') }}</option>--}}
{{--                                            @foreach(get_timezones_select2_array() as $timezone)--}}
{{--                                                <option value="{{ $timezone['id'] }}" {{ $currentCompany->getSetting('timezone') == $timezone['id'] ? 'selected=""' : '' }}>{{ $timezone['text'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="date_format">{{ __('messages.date_format') }}</label>--}}
{{--                                        <select id="date_format" name="date_format" data-toggle="select" data-minimum-results-for-search="-1" class="form-control select2-hidden-accessible" data-select2-id="date_format">--}}
{{--                                            <option disabled selected>{{ __('messages.select_date_format') }}</option>--}}
{{--                                            @foreach(get_date_formats_select2_array() as $date_format)--}}
{{--                                                <option value="{{ $date_format['id'] }}" {{ $currentCompany->getSetting('date_format') == $date_format['id'] ? 'selected=""' : '' }}>{{ $date_format['text'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mt-4">--}}
{{--                                <div class="col-12">--}}
{{--                                    <p class="h6 mb-3">--}}
{{--                                        <strong class="headings-color">{{ __('messages.financial_year') }}</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="financial_month_starts">{{ __('messages.month_starts') }}</label>--}}
{{--                                        <select id="financial_month_starts" name="financial_month_starts" data-minimum-results-for-search="-1" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="financial_month_starts">--}}
{{--                                            <option disabled selected>{{ __('messages.select_month_starts') }}</option>--}}
{{--                                            @foreach(get_months_select2_array() as $month)--}}
{{--                                                <option value="{{ $month['id'] }}" {{ $currentCompany->getSetting('financial_month_starts') == $month['id'] ? 'selected=""' : '' }} >{{ $month['text'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="financial_month_ends">{{ __('messages.month_ends') }}</label>--}}
{{--                                        <select id="financial_month_ends" name="financial_month_ends" data-minimum-results-for-search="-1" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="financial_month_ends">--}}
{{--                                            <option disabled selected>{{ __('messages.select_month_ends') }}</option>--}}
{{--                                            @foreach(get_months_select2_array() as $month)--}}
{{--                                                <option value="{{ $month['id'] }}" {{ $currentCompany->getSetting('financial_month_ends') == $month['id'] ? 'selected=""' : '' }}>{{ $month['text'] }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group text-right mt-5">--}}
{{--                                <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

