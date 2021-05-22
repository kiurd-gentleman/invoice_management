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
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group required">
                                            <label for="name">{{ __('messages.company_name') }}</label>
                                            <input name="name" type="text" class="form-control" placeholder="{{ __('messages.company_name') }}" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
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
