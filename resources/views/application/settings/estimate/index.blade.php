@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.estimate_settings'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.estimate_settings') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.estimate_settings') }}</h1>--}}
{{--    </div>--}}
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
                        <li class="breadcrumb-item active">{{ __('messages.estimate_settings') }}
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
                            <h4 class="card-title">Quotation Settings</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
{{--                            <div class="heading-elements">--}}
{{--                                <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Submit Bug</button>--}}
{{--                                <span class="dropdown">--}}
{{--                          <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                  aria-expanded="false" class="btn btn-warning btn-sm dropdown-toggle dropdown-menu-right"><i class="ft-download white"></i></button>--}}
{{--                          <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-calendar"></i> Due Date</a>--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-random"></i> Priority </a>--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-bar-chart"></i> Progress</a>--}}
{{--                            <a href="#" class="dropdown-item"><i class="la la-user"></i> Assign to</a>--}}
{{--                          </span>--}}
{{--                        </span>--}}
{{--                                <button class="btn btn-success btn-sm"><i class="ft-settings white"></i></button>--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->
                                <form action="{{ route('settings.estimate.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                    @include('layouts._form_errors')
                                    @csrf

                                    <div class="form-group mb-4">
                                        <p class="h5 mb-0">
                                            <strong class="headings-color">{{ __('messages.estimate_settings') }}</strong>
                                        </p>
                                        <p class="text-muted">{{ __('messages.customize_estimate_settings') }}</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-5">
                                            <div class="form-group required">
                                                <label for="estimate_prefix">{{ __('messages.estimate_prefix') }}</label>
                                                <input name="estimate_prefix" type="text" class="form-control" value="{{ $currentCompany->getSetting('estimate_prefix') }}" placeholder="{{ __('messages.estimate_prefix') }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="estimate_auto_archive">{{ __('messages.auto_archive') }}</label><br>
                                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                    <input type="checkbox" name="estimate_auto_archive" id="estimate_auto_archive" {{ $currentCompany->getSetting('estimate_auto_archive') ? 'checked' : '' }} class="custom-control-input">
                                                    <label class="custom-control-label" for="estimate_auto_archive">{{ __('messages.yes') }}</label>
                                                </div>
                                                <label for="estimate_auto_archive" class="mb-0">{{ __('messages.yes') }}</label>
                                                <small class="form-text text-muted">
                                                    {{ __('messages.auto_archive_description') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-5">
                                            <div class="form-group required">
                                                <label for="estimate_color">{{ __('messages.estimate_color') }}</label>
                                                <input name="estimate_color" type="color" class="form-control" value="{{ $currentCompany->getSetting('estimate_color') }}" placeholder="{{ __('messages.estimate_color') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="estimate_footer">{{ __('messages.footer') }}</label>
                                        <textarea name="estimate_footer" class="form-control" rows="4" placeholder="{{ __('messages.footer') }}">{{ $currentCompany->getSetting('estimate_footer') }}</textarea>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="estimate_template">{{ __('messages.estimate_template') }}</label>
                                        @php $default_template = get_company_setting('estimate_template', $currentCompany->id) @endphp
                                        <div class="row mt-3">
                                            @foreach(\App\Models\EstimateTemplate::all() as $template)
                                                <div class="  col-md-3">
                                                    <div class="custom-control custom-radio image-checkbox">
                                                        <input type="radio" class="custom-control-input" id="{{$template->view}}" name="estimate_template" value="{{$template->view}}" @if($default_template === $template->view) checked='' @endif>
                                                        <label class="custom-control-label" for="{{$template->view}}">
                                                            <img src="{{ $template->path }}" class="img-fluid modal-image">
                                                            <span>{{ $template->name }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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
                            @include('application.settings._aside', ['tab' => 'estimate'])                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

