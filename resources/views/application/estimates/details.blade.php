@extends('layouts.app', ['page' => 'estimates'])

@section('title', __('messages.estimate_details'))

@section('page_header')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title text-uppercase">{{ __('messages.estimate_details') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.estimates') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.estimate_details') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-round-controls">Invoice Details</h4>
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
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div  class="">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <p class="h2 pb-4">
                                            #{{ $estimate->estimate_number }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-8 text-right">
                                        <div class="btn-group mb-2">
                                            <a href="{{ route('pdf.estimate', ['estimate' => $estimate->uid, 'download' => true]) }}" target="_blank" class="btn btn-pinterest btn-sm">
                                                <i class="ft-download-cloud"></i>
                                                {{ __('messages.download') }}
                                            </a>
                                            <a href="{{ route('estimates.send', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-pinterest btn-sm alert-confirm" data-alert-title="{{ __('messages.are_you_sure') }}" data-alert-text="{{ __('messages.send_email_warning') }}">
                                                <i class="ft-share"></i>
                                                {{ __('messages.send_email') }}
                                            </a>
                                            <a href="{{ route('estimates.edit', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest">
                                                <i class="ft-edit"></i>
                                                {{ __('messages.edit') }}
                                            </a>
                                            <a href="{{ route('estimates.mark', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid, 'status' => 'accepted']) }}" class=" btn btn-sm btn-pinterest"><i class="ft-check"></i> {{ __('messages.mark_accepted') }}</a>
                                            <a href="{{ route('estimates.mark', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid, 'status' => 'rejected']) }}" class=" btn btn-sm btn-pinterest"><i class="ft-check-circle"></i>{{ __('messages.mark_rejected') }}</a>
                                            <a href="{{ route('estimates.mark', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid, 'status' => 'sent']) }}" class=" btn btn-sm btn-pinterest"> <i class="ft-check-circle"></i>{{ __('messages.mark_sent') }}</a>
                                            <a href="{{ route('estimates.delete', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-pinterest delete-confirm"><i class="ft-trash"></i>{{ __('messages.delete') }}</a>


{{--                                            <div class="btn-group">--}}
{{--                                                --}}
{{--                                                <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                    </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="col-12">



                                        @if($estimate->status == 'DRAFT')
                                            {{--                                            <div class="alert alert-soft-dark d-flex align-items-center" role="alert">--}}
                                            {{--                                                <i class="material-icons mr-3">access_time</i>--}}
                                            {{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}</div>--}}
                                            {{--                                            </div>--}}
                                            <div class="alert alert-dark alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-watch text-dark"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}
                                            </div>
                                        @elseif($estimate->status == 'SENT')
                                            {{--                                            <div class="alert alert-soft-info d-flex align-items-center" role="alert">--}}
                                            {{--                                                <i class="material-icons mr-3">send</i>--}}
                                            {{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}</div>--}}
                                            {{--                                            </div>--}}
                                            <div class="alert alert-light-info alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="la-send"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}
                                            </div>
                                        @elseif($estimate->status == 'VIEWED')
                                            {{--                                            <div class="alert alert-soft-primary d-flex align-items-center" role="alert">--}}
                                            {{--                                                <i class="material-icons mr-3">visibility</i>--}}
                                            {{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}</div>--}}
                                            {{--                                            </div>--}}
                                            <div class="alert alert-light-primary alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-eye"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}
                                            </div>
                                        @elseif($estimate->status == 'OVERDUE')
                                            {{--                                            <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
                                            {{--                                                <i class="material-icons mr-3">schedule</i>--}}
                                            {{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.overdue') }}</div>--}}
                                            {{--                                            </div>--}}

                                            <div class="alert alert-light-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-alert-circle"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.overdue') }}
                                            </div>
                                        @elseif($estimate->status == 'COMPLETED')
                                            {{--                                            <div class="alert alert-soft-success d-flex align-items-center" role="alert">--}}
                                            {{--                                                <i class="material-icons mr-3">done</i>--}}
                                            {{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.payment_received') }}</div>--}}
                                            {{--                                            </div>--}}
                                            <div class="alert alert-light-success alert-icon-left alert-dismissible mb-2" role="alert">
                                                <span class="alert-icon"><i class="ft-check"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ __('messages.status') }} : </strong> {{ __('messages.payment_received') }}
                                            </div>
                                        @endif




{{--                                        @if($estimate->status == 'DRAFT')--}}
{{--                                            <div class="alert alert-soft-dark d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">access_time</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @elseif($estimate->status == 'SENT')--}}
{{--                                            <div class="alert alert-soft-info d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">send</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @elseif($estimate->status == 'VIEWED')--}}
{{--                                            <div class="alert alert-soft-primary d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">visibility</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @elseif($estimate->status == 'EXPIRED')--}}
{{--                                            <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">schedule</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.expired') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @elseif($estimate->status == 'ACCEPTED')--}}
{{--                                            <div class="alert alert-soft-success d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">done</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.accepted') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @elseif($estimate->status == 'REJECTED')--}}
{{--                                            <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
{{--                                                <i class="material-icons mr-3">cancel</i>--}}
{{--                                                <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.rejected') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
                                    </div>
                                </div>
                                <div class="pdf-iframe">
                                    <iframe src="{{ route('pdf.estimate', $estimate->uid) }}" frameborder="0" style="width: 100%;height: 500px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>






{{--    <div class="row">--}}
{{--        <div class="col-12 col-md-4">--}}
{{--            <p class="h2 pb-4">--}}
{{--                #{{ $estimate->estimate_number }}--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="col-12 col-md-8 text-right">--}}
{{--            <div class="btn-group mb-2">--}}
{{--                <a href="{{ route('pdf.estimate', ['estimate' => $estimate->uid, 'download' => true]) }}" target="_blank" class="btn btn-light">--}}
{{--                    <i class="material-icons">cloud_download</i>--}}
{{--                    {{ __('messages.download') }}--}}
{{--                </a>--}}
{{--                <a href="{{ route('estimates.send', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light alert-confirm" data-alert-title="{{ __('messages.are_you_sure') }}" data-alert-text="{{ __('messages.send_email_warning') }}">--}}
{{--                    <i class="material-icons">send</i>--}}
{{--                    {{ __('messages.send_email') }}--}}
{{--                </a>--}}
{{--                <a href="{{ route('estimates.edit', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-light">--}}
{{--                    <i class="material-icons">edit</i>--}}
{{--                    {{ __('messages.edit') }}--}}
{{--                </a>--}}
{{--                <div class="btn-group">--}}
{{--                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
{{--                        {{ __('messages.more') }} <span class="caret"></span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                        <a href="{{ route('estimates.mark', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid, 'status' => 'accepted']) }}" class="dropdown-item">{{ __('messages.mark_accepted') }}</a>--}}
{{--                        <a href="{{ route('estimates.mark', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid, 'status' => 'rejected']) }}" class="dropdown-item">{{ __('messages.mark_rejected') }}</a>--}}
{{--                        <a href="{{ route('estimates.mark', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid, 'status' => 'sent']) }}" class="dropdown-item">{{ __('messages.mark_sent') }}</a>--}}
{{--                        <hr>--}}
{{--                        <a href="{{ route('estimates.delete', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" class="dropdown-item text-danger delete-confirm">{{ __('messages.delete') }}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-12">--}}
{{--            @if($estimate->status == 'DRAFT')--}}
{{--                <div class="alert alert-soft-dark d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">access_time</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.draft') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($estimate->status == 'SENT')--}}
{{--                <div class="alert alert-soft-info d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">send</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.mailed_to_customer') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($estimate->status == 'VIEWED')--}}
{{--                <div class="alert alert-soft-primary d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">visibility</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.viewed_by_customer') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($estimate->status == 'EXPIRED')--}}
{{--                <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">schedule</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.expired') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($estimate->status == 'ACCEPTED')--}}
{{--                <div class="alert alert-soft-success d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">done</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.accepted') }}</div>--}}
{{--                </div>--}}
{{--            @elseif($estimate->status == 'REJECTED')--}}
{{--                <div class="alert alert-soft-danger d-flex align-items-center" role="alert">--}}
{{--                    <i class="material-icons mr-3">cancel</i>--}}
{{--                    <div class="text-body"><strong>{{ __('messages.status') }} : </strong> {{ __('messages.rejected') }}</div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="pdf-iframe">--}}
{{--        <iframe src="{{ route('pdf.estimate', $estimate->uid) }}" frameborder="0"></iframe>--}}
{{--    </div>--}}
@endsection
