@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.team'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.add_membeer') }}</li>--}}
{{--                <li class="breadcrumb-item"><a href="{{ route('settings.team', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.team') }}</a></li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.add_membeer') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.add_member') }}</h1>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.add_member') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('settings.team', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.team') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.add_member') }}
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
                        <h4 class="card-title">Team Create</h4>
{{--                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
{{--                        <div class="heading-elements">--}}
{{--                            <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Submit Bug</button>--}}
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
                            <form action="{{ route('settings.team.storeMember', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">
                                @include('layouts._form_errors')
                                @csrf

                                @include('application.settings.team._member_form')

                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ __('messages.add_member') }}</button>
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
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Predefined Views</h4>--}}
{{--                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
{{--                    <div class="heading-elements">--}}
{{--                        <ul class="list-inline mb-0">--}}
{{--                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
{{--                            <li><a data-action="close"><i class="ft-x"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- bug-list search -->
                <div class="card-content">
                    <!-- /bug-list search -->
                    <!-- bug-list view -->
                    <div class="card-body ">
                        @include('application.settings._aside', ['tab' => 'team'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--<div class="row">--}}
{{--        <div class="col-lg-3">--}}
{{--            @include('application.settings._aside', ['tab' => 'team'])--}}
{{--        </div>--}}
{{--        <div class="col-lg-9">--}}
{{--            <div class="card card-form">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col card-form__body card-body bg-white">--}}
{{--                        <div class="form-row align-items-center mb-4">--}}
{{--                            <div class="col">--}}
{{--                                <p class="h4 mb-0">--}}
{{--                                    <strong class="headings-color">{{ __('messages.add_member') }}</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <form action="{{ route('settings.team.storeMember', ['company_uid' => $currentCompany->uid]) }}" method="POST" enctype="multipart/form-data">--}}
{{--                            @include('layouts._form_errors')--}}
{{--                            @csrf--}}

{{--                            @include('application.settings.team._member_form')--}}

{{--                            <div class="form-group text-right mt-4">--}}
{{--                                <button type="submit" class="btn btn-primary">{{ __('messages.add_member') }}</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

