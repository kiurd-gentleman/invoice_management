@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.edit_tax'))

@section('content')
{{--    <div class="page__heading">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb mb-0">--}}
{{--                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>--}}
{{--                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>--}}
{{--                <li class="breadcrumb-item"><a href="{{ route('settings.tax_types', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.tax_types') }}</a></li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.edit_tax') }}</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--        <h1 class="m-0">{{ __('messages.edit_tax') }}</h1>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('messages.edit_tax') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">business</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('messages.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.edit_tax') }}
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
                        <h4 class="card-title">{{ __('messages.edit_tax') }}</h4>
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
                    <div class="card-content">
                        <div class="card-body">

                            <form action="{{ route('settings.tax_types.update', ['tax_type' => $tax_type->id, 'company_uid' => $currentCompany->uid]) }}" method="POST">
                                @include('layouts._form_errors')
                                @csrf

                                @include('application.settings.tax_type._form')

                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.update_tax') }}</button>
                                    <a href="{{ route('settings.tax_types.delete', ['tax_type' => $tax_type->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light text-danger delete-confirm">
                                        <i class="material-icons icon-16pt">delete</i>
                                        {{ __('messages.delete') }}
                                    </a>
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
                        @include('application.settings._aside', ['tab' => 'tax_types'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--    <div class="row">--}}
{{--        <div class="col-lg-3">--}}
{{--            @include('application.settings._aside', ['tab' => 'tax_types'])--}}
{{--        </div>--}}
{{--        <div class="col-lg-9">--}}
{{--            <div class="card card-form">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col card-form__body card-body bg-white">--}}
{{--                        <div class="form-row align-items-center mb-4">--}}
{{--                            <div class="col">--}}
{{--                                <p class="h4 mb-0">--}}
{{--                                    <strong class="headings-color">{{ __('messages.edit_tax') }}</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <form action="{{ route('settings.tax_types.update', ['tax_type' => $tax_type->id, 'company_uid' => $currentCompany->uid]) }}" method="POST">--}}
{{--                            @include('layouts._form_errors')--}}
{{--                            @csrf--}}

{{--                            @include('application.settings.tax_type._form')--}}

{{--                            <div class="form-group text-right mt-4">--}}
{{--                                <button type="submit" class="btn btn-primary">{{ __('messages.update_tax') }}</button>--}}
{{--                                <a href="{{ route('settings.tax_types.delete', ['tax_type' => $tax_type->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light text-danger delete-confirm">--}}
{{--                                    <i class="material-icons icon-16pt">delete</i>--}}
{{--                                    {{ __('messages.delete') }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

