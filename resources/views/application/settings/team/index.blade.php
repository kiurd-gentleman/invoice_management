@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.team'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.team') }}</li>--}}
{{--            </ol>--}}
{{--        </nav> --}}
{{--        <h1 class="m-0">{{ __('messages.team') }}</h1>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.team') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.team') }}
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
                            <div class="form-row align-items-center mb-4">
                                <div class="col">
                                    <p class="h4 mb-0">
                                        <strong class="headings-color">{{ __('messages.team_members') }}</strong>
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('settings.team.createMember', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary text-white">
                                        {{ __('messages.add_member') }}
                                    </a>
                                </div>
                            </div>

                            <div class="form-row align-items-center mb-3">
                                <div class="col-auto">
                                    <div class="avatar">
                                        <img src="{{ $authUser->avatar }}" class="avatar-img rounded-circle border-xl">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="font-weight-bold">{{ $authUser->full_name }} ({{ __('messages.you') }})</div>
                                    <p class="small text-muted mb-0 text-uppercase">
                                        <strong>{{ $authUser->getRoleNames()->first() }}</strong>
                                    </p>
                                </div>
                                <div class="col-auto"></div>
                            </div>

                            @foreach ($currentCompany->users as $user)
                                @if($authUser->id == $user->id)
                                    @continue
                                @endif
                                <hr>
                                <div class="form-row align-items-center mb-3">
                                    <div class="col-auto">
                                        <div class="avatar">
                                            <img src="{{ $user->avatar }}" class="avatar-img rounded-circle border-xl">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-bold">{{ $user->full_name }}</div>
                                        <p class="small text-muted mb-0 text-uppercase">
                                            <strong>{{ $user->getRoleNames()->first() }}</strong>
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        @if($authUser->hasRole(['admin', 'super_admin']))
                                            <a href="{{ route('settings.team.editMember', ['member' => $user->uid, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm  btn-warning">
                                                <i class="ft-edit"></i>
                                                {{ __('messages.edit') }}
                                            </a>
                                            <a href="{{ route('settings.team.deleteMember', ['member' => $user->uid, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-danger delete-confirm">
                                                <i class="ft-trash"></i>
                                                {{ __('messages.delete') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
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
{{--                                    <strong class="headings-color">{{ __('messages.team_members') }}</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <a href="{{ route('settings.team.createMember', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-primary text-white">--}}
{{--                                    {{ __('messages.add_member') }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-row align-items-center mb-3">--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="avatar">--}}
{{--                                    <img src="{{ $authUser->avatar }}" class="avatar-img rounded-circle border-xl">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <div class="font-weight-bold">{{ $authUser->full_name }} ({{ __('messages.you') }})</div>--}}
{{--                                <p class="small text-muted mb-0 text-uppercase">--}}
{{--                                    <strong>{{ $authUser->getRoleNames()->first() }}</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto"></div>--}}
{{--                        </div>--}}

{{--                        @foreach ($currentCompany->users as $user)--}}
{{--                            @if($authUser->id == $user->id)--}}
{{--                                @continue--}}
{{--                            @endif--}}
{{--                            <hr>--}}
{{--                            <div class="form-row align-items-center mb-3">--}}
{{--                                <div class="col-auto">--}}
{{--                                    <div class="avatar">--}}
{{--                                        <img src="{{ $user->avatar }}" class="avatar-img rounded-circle border-xl">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <div class="font-weight-bold">{{ $user->full_name }}</div>--}}
{{--                                    <p class="small text-muted mb-0 text-uppercase">--}}
{{--                                        <strong>{{ $user->getRoleNames()->first() }}</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    @if($authUser->hasRole(['admin', 'super_admin']))--}}
{{--                                        <a href="{{ route('settings.team.editMember', ['member' => $user->uid, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light text-primary">--}}
{{--                                            <i class="material-icons">edit</i>--}}
{{--                                            {{ __('messages.edit') }}--}}
{{--                                        </a>--}}
{{--                                        <a href="{{ route('settings.team.deleteMember', ['member' => $user->uid, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light text-danger delete-confirm">--}}
{{--                                            <i class="material-icons">delete</i>--}}
{{--                                            {{ __('messages.delete') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

