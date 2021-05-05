@extends('layouts.app', ['page' => 'company'])

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
                <a class="btn btn-info round " href="{{route('company-create' ,auth()->user()->uid)}}"> Create Company</a>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Card headings examples section start -->
        <section id="card-headings">
            <div class="row">
                @foreach($companies as $company)
                    <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$company->name}}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <p>
                                   @dump($company->settings)
                                </p>
                            </div>
                        </div>
                        <div class="card-footer border-0 text-muted">
                            <span class="danger"><i class="la la-heart"></i> 173 Likes</span>
                            <span class="float-right primary">View More <i class="ft-arrow-right"></i></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- Card headings examples section end -->
    </div>
@endsection
