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
        <!-- Card headings examples section start -->
        <section id="card-headings">
            <div class="row">

                    <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Company List</h4>
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
{{--                                @dump($company->settings)--}}
                                <table class="table table-bordered table-striped table-hover dark">
                                    <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td  width="60%">
                                                <span>{{$company->name}}</span>
                                            </td>
                                            <td>
                                                <a class="float-right primary" href="{{route('in-to-company',['user_uid' => auth()->user()->uid , 'company_uid' =>$company->uid ])}}" >Go Inside <i class="ft-arrow-right"></i></a>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

{{--                                    @if ($setting->option == 'avatar')--}}
{{--                                        <img src="{{$setting->value}}" class="rounded" width="5%">--}}
{{--                                    @endif--}}


{{--                                    @if ($setting->option == 'currency_id')--}}
{{--                                        <p>Currency {{$setting->value}}</p>--}}
{{--                                        @dump($setting->option)--}}
{{--                                        @dump($setting->company_id)--}}
{{--                                        <p>Currency {{$setting->getSetting($setting->option , $setting->company_id )}}</p>--}}
{{--                                    @endif--}}


                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </section>
        <!-- Card headings examples section end -->
    </div>
@endsection
