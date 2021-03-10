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
                    <!-- /bug-list search -->
                    <!-- bug-list view -->
                    <div class="card-body ">
                        @include('application.settings._aside', ['tab' => 'account'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

