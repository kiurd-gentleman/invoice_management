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
            <h3 class="content-header-title mb-0">Company List</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info round " href="{{route('company-create' ,auth()->user()->uid)}}"> Create Company</a>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="lists">
            <div class="row match-height">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="list-add-item">Company list</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div id="add-item-list">
                                    <input type="text" class="search form-control mb-1" placeholder="Search"/>
                                    <div class="row w-100">
                                        <div class="col-md-6 col-sm-12 float-right ">
                                            <button class="sort btn btn-info  mb-2" data-sort="name">Sort by name</button>
                                        </div>
{{--                                        <div class="col-md-6 col-sm-12">--}}
{{--                                            <button class="sort btn btn-block btn-outline-success btn-round mb-2" data-sort="born">Sort by born</button>--}}
{{--                                        </div>--}}
                                    </div>
                                    <ul class="list-group list">
                                        @foreach($companies as $company)
                                        <li class="list-group-item">
                                            <span class="float-right">
                                                <a class="born" href="{{route('in-to-company',['user_uid' => auth()->user()->uid , 'company_uid' =>$company->uid ])}}" >Go Inside <i class="ft-arrow-right"></i>
                                                </a>
                                            </span>
                                            <span class="name">{{$company->name}}</span> &nbsp;

                                             <span> <sub>&bull;&nbsp;{{$company->created_at}}</sub></span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Card headings examples section end -->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('app-assets/vendors/js/extensions/listjs/list.min.js')}}" type="text/javascript"></script>
{{--    <script src="{{asset('app-assets/vendors/js/extensions/listjs/list.fuzzysearch.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('app-assets/vendors/js/extensions/listjs/list.pagination.min.js')}}" type="text/javascript"></script>--}}
    <script src="{{asset('app-assets/js/scripts/extensions/list.js')}}" type="text/javascript"></script>
@endsection
