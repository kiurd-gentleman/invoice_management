@extends('application.company.layouts.master', ['page' => 'company'])

@section('title', __('messages.company'))

@section('page_header')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Components</a>
                        </li>
                        <li class="breadcrumb-item active">Bootstrap Cards
                        </li>
                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Card Headings</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info round " href="{{route('company-create' ,auth()->user()->uid)}}"> Settings</a>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Card headings examples section start -->
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Bugs</h4>
                        {{--                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>--}}
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
                            <form action="{{route('company-store', ['user_uid' => auth()->user()->uid])}}" method="POST" enctype="multipart/form-data">
                                @include('layouts._form_errors')
                                @csrf

                                <div class="form-group">
                                    <label>{{ __('messages.company_logo') }}</label><br>
                                    <input id="avatar" name="avatar" class="d-none" type="file" onchange="changePreview(this);">
                                    <label for="avatar">
                                        <div class="media align-items-center">
                                            <div class="mr-3">
                                                <div class="avatar avatar-xl">
                                                    <img id="file-prev" src="{{ $currentCompany->avatar }}" class="avatar-img rounded">
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
                                            <label for="name">{{ __('messages.company_name') }}</label>
                                            <input name="name" type="text" class="form-control" placeholder="{{ __('messages.company_name') }}" value="" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="billing[phone]">{{ __('messages.phone') }}</label>
                                            <input name="billing[phone]" type="text" class="form-control" value="" placeholder="{{ __('messages.phone') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group required">
                                            <label for="billing[country_id]">{{ __('messages.country') }}</label>
                                            <select id="billing[country_id]" name="billing[country_id]" data-toggle="select" class="form-control select2" data-select2-id="billing[country_id]" required>
                                                <option disabled selected>{{ __('messages.select_country') }}</option>
                                                @foreach(get_countries_select2_array() as $option)
                                                    <option value="{{ $option['id'] }}" {{ $currentCompany->billing->country_id == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="billing[state]">{{ __('messages.state') }}</label>
                                            <input name="billing[state]" type="text" class="form-control" value="{{ $currentCompany->billing->state }}" placeholder="{{ __('messages.state') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="billing[city]">{{ __('messages.city') }}</label>
                                            <input name="billing[city]" type="text" class="form-control" value="{{ $currentCompany->billing->city }}" placeholder="{{ __('messages.city') }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="billing[zip]">{{ __('messages.postal_code') }}</label>
                                            <input name="billing[zip]" type="text" class="form-control" value="{{ $currentCompany->billing->zip }}" placeholder="{{ __('messages.postal_code') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group required">
                                            <label for="billing[address_1]">{{ __('messages.address') }}</label>
                                            <textarea name="billing[address_1]" class="form-control" rows="2" placeholder="{{ __('messages.address') }}" required>{{ $currentCompany->billing->address_1 }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="vat_number">{{ __('messages.vat_number') }}</label>
                                            <input name="vat_number" type="text" class="form-control" placeholder="{{ __('messages.vat_number') }}" value="{{ $currentCompany->vat_number }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.update_company') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Card headings examples section end -->
    </div>
@endsection
