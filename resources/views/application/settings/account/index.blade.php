@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.account_settings'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.account_settings') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.account_settings') }}</h1>--}}
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
                        <li class="breadcrumb-item active">{{ __('messages.account_settings') }}
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
                            <form action="{{route('settings.account.update', ['company_uid' => $currentCompany->uid])}}" method="POST" enctype="multipart/form-data">
                                @include('layouts._form_errors')
                                @csrf

                                <div class="form-group">
                                    <label>{{ __('messages.profile_image') }}</label><br>
                                    <input id="avatar" name="avatar" class="d-none" type="file" onchange="changePreview(this);">
                                    <label for="avatar">
                                        <div class="media align-items-center">
                                            <div class="mr-3">
                                                <div class="avatar avatar-xl">
                                                    <img id="file-prev" src="{{ $authUser->avatar }}" class="avatar-img rounded">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <a class="btn btn-sm btn-light choose-button">{{ __('messages.choose_photo') }}</a>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group required">
                                            <label for="first_name">{{ __('messages.first_name') }}</label>
                                            <input name="first_name" type="text" class="form-control" placeholder="{{ __('messages.first_name') }}" value="{{ $authUser->first_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group required">
                                            <label for="last_name">{{ __('messages.last_name') }}</label>
                                            <input name="last_name" type="text" class="form-control" placeholder="{{ __('messages.last_name') }}" value="{{ $authUser->last_name }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group required">
                                            <label for="email">{{ __('messages.email') }}</label>
                                            <input name="email" type="email" class="form-control" placeholder="{{ __('messages.email') }}" value="{{ $authUser->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="phone">{{ __('messages.phone') }}</label>
                                            <input name="phone" type="text" class="form-control" placeholder="{{ __('messages.phone') }}" value="{{ $authUser->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <p class="mb-1"><strong class="headings-color">{{ __('messages.update_password') }}</strong></p>
                                        <p class="text-muted">{{ __('messages.update_password_description') }}</p>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="old_password">{{ __('messages.old_password') }}</label>
                                            <input name="old_password" type="password" class="form-control" placeholder="{{ __('messages.old_password') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="new_password">{{ __('messages.new_password') }}</label>
                                            <input name="new_password" type="password" class="form-control" placeholder="{{ __('messages.new_password') }}">
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
                    <div class="card-body border-top-blue-grey border-top-lighten-5">
                        <div class="bug-list-search">
                            <div class="bug-list-search-content">
                                <form action="#">
                                    <div class="position-relative">
                                        <input type="search" class="form-control" placeholder="Search project bugs...">
                                        <div class="form-control-position">
                                            <i class="ft-search text-size-base text-muted"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /bug-list search -->
                    <!-- bug-list view -->
                    <div class="app-content content">
                        <div class="sidebar-left">
                            <div class="sidebar">
                                <div class="sidebar-content ">
                                    <div class="email-app-menu  ">
                                        <div class="list-group list-group-messages">
                                            <a href="#" class="list-group-item active border-0">
                                                <i class="ft-inbox mr-1"></i> Inbox
                                                <span class="badge badge-secondary badge-pill float-right">8</span>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action border-0"><i class="la la-paper-plane-o mr-1"></i> Sent</a>
                                            <a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-file mr-1"></i> Draft</a>
                                            <a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-star mr-1"></i> Starred<span class="badge badge-danger badge-pill float-right">3</span> </a>
                                            <a href="#" class="list-group-item list-group-item-action border-0"><i class="ft-trash-2 mr-1"></i> Trash</a>
                                            @include('application.settings._aside', ['tab' => 'account'])
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    {{--<div class="card-body ">
--}}{{--                        <div class="main-menu ">--}}{{--
--}}{{--                            <div class="main-menu-content">--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item active">All Bugs</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action">All Open</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action">All Closed</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action">My Open</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action">My Closed</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action">Overdue Bugs</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action disabled">Created Today</a>--}}{{--
--}}{{--                                --}}{{----}}{{--                            <a href="#" class="list-group-item list-group-item-action">Bugs I Follow</a>--}}{{--
--}}{{--                                @include('application.settings._aside', ['tab' => 'account'])--}}{{--
--}}{{--                            </div>--}}{{--
--}}{{--                        </div>--}}{{--
                        <div class="app-content content">
                            @include('application.settings._aside', ['tab' => 'account'])

                        </div>

                    </div>--}}

                </div>
            </div>

            <!--/ Predefined Views -->
{{--            <!-- Bug Progress -->--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4 class="card-title">Bug Progress</h4>--}}
{{--                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
{{--                    <div class="heading-elements">--}}
{{--                        <ul class="list-inline mb-0">--}}
{{--                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
{{--                            <li><a data-action="close"><i class="ft-x"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <div class="card-body ">--}}
{{--                        <div id="bug-pie-chart" class="height-400 echart-container"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--/ Bug Progress -->--}}
{{--            <!-- QA Team -->--}}
{{--            <div class="card">--}}
{{--                <div class="card-header mb-0">--}}
{{--                    <h4 class="card-title">QA Team</h4>--}}
{{--                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
{{--                    <div class="heading-elements">--}}
{{--                        <ul class="list-inline mb-0">--}}
{{--                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
{{--                            <li><a data-action="close"><i class="ft-x"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <div class="card-body  py-0 px-0">--}}
{{--                        <div class="list-group">--}}
{{--                            <a href="javascript:void(0)" class="list-group-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="media-left pr-1">--}}
{{--                          <span class="avatar avatar-sm avatar-online rounded-circle">--}}
{{--                            <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="media-heading mb-0">Margaret Govan</h6>--}}
{{--                                        <p class="font-small-2 mb-0">QA Analyst</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="javascript:void(0)" class="list-group-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="media-left pr-1">--}}
{{--                          <span class="avatar avatar-sm avatar-busy rounded-circle">--}}
{{--                            <img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="media-heading mb-0">Bret Lezama</h6>--}}
{{--                                        <p class="font-small-2 mb-0">QA Person</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="javascript:void(0)" class="list-group-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="media-left pr-1">--}}
{{--                          <span class="avatar avatar-sm avatar-online rounded-circle">--}}
{{--                            <img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="media-heading mb-0">Carie Berra</h6>--}}
{{--                                        <p class="font-small-2 mb-0">QA Manager</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="javascript:void(0)" class="list-group-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="media-left pr-1">--}}
{{--                          <span class="avatar avatar-sm avatar-away rounded-circle">--}}
{{--                            <img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="media-heading mb-0">Eric Alsobrook</h6>--}}
{{--                                        <p class="font-small-2 mb-0">QA Lead</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="javascript:void(0)" class="list-group-item">--}}
{{--                                <div class="media">--}}
{{--                                    <div class="media-left pr-1">--}}
{{--                          <span class="avatar avatar-sm avatar-away rounded-circle">--}}
{{--                            <img src="../../../app-assets/images/portrait/small/avatar-s-8.png" alt="avatar"><i></i></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="media-body">--}}
{{--                                        <h6 class="media-heading mb-0">John Alsobrook</h6>--}}
{{--                                        <p class="font-small-2 mb-0">QA Person</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--/ QA Team -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3">--}}
{{--                    @include('application.settings._aside', ['tab' => 'account'])--}}
{{--                </div>--}}
{{--                <div class="col-lg-9">--}}

{{--                    <div class="card card-form">--}}
{{--                        <div class="row no-gutters">--}}
{{--                            <div class="col card-form__body card-body bg-white">--}}
{{--                                <form action="{{route('settings.account.update', ['company_uid' => $currentCompany->uid])}}" method="POST" enctype="multipart/form-data">--}}
{{--                                    @include('layouts._form_errors')--}}
{{--                                    @csrf--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label>{{ __('messages.profile_image') }}</label><br>--}}
{{--                                        <input id="avatar" name="avatar" class="d-none" type="file" onchange="changePreview(this);">--}}
{{--                                        <label for="avatar">--}}
{{--                                            <div class="media align-items-center">--}}
{{--                                                <div class="mr-3">--}}
{{--                                                    <div class="avatar avatar-xl">--}}
{{--                                                        <img id="file-prev" src="{{ $authUser->avatar }}" class="avatar-img rounded">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <a class="btn btn-sm btn-light choose-button">{{ __('messages.choose_photo') }}</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group required">--}}
{{--                                                <label for="first_name">{{ __('messages.first_name') }}</label>--}}
{{--                                                <input name="first_name" type="text" class="form-control" placeholder="{{ __('messages.first_name') }}" value="{{ $authUser->first_name }}" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group required">--}}
{{--                                                <label for="last_name">{{ __('messages.last_name') }}</label>--}}
{{--                                                <input name="last_name" type="text" class="form-control" placeholder="{{ __('messages.last_name') }}" value="{{ $authUser->last_name }}" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group required">--}}
{{--                                                <label for="email">{{ __('messages.email') }}</label>--}}
{{--                                                <input name="email" type="email" class="form-control" placeholder="{{ __('messages.email') }}" value="{{ $authUser->email }}" required>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="phone">{{ __('messages.phone') }}</label>--}}
{{--                                                <input name="phone" type="text" class="form-control" placeholder="{{ __('messages.phone') }}" value="{{ $authUser->phone }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="row mt-3">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <p class="mb-1"><strong class="headings-color">{{ __('messages.update_password') }}</strong></p>--}}
{{--                                            <p class="text-muted">{{ __('messages.update_password_description') }}</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="old_password">{{ __('messages.old_password') }}</label>--}}
{{--                                                <input name="old_password" type="password" class="form-control" placeholder="{{ __('messages.old_password') }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="new_password">{{ __('messages.new_password') }}</label>--}}
{{--                                                <input name="new_password" type="password" class="form-control" placeholder="{{ __('messages.new_password') }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group text-right mt-4">--}}
{{--                                        <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
@endsection

