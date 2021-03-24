@extends('layouts.app', ['page' => 'estimates'])

@section('title', __('messages.update_estimate'))

@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.estimates') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.update_estimate') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0 h3">{{ __('messages.update_estimate') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title text-uppercase">{{ __('Update Quotation') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.estimates') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Update Quotation') }}
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
                        <h4 class="card-title" id="basic-layout-round-controls">Quotation List</h4>
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
                            <div  class="container">
                                <form action="{{ route('estimates.update', ['estimate' => $estimate->id, 'company_uid' => $currentCompany->uid]) }}" method="POST">
                                    @include('layouts._form_errors')
                                    @csrf

                                    @include('application.estimates._form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



@endsection

@section('page_body_scripts')
    @include('application.estimates._js')
    <script>
        $(document).ready(function() {
            setupCustomer();

            $('tbody tr').each(function(index, element) {
                var row = $(element);

                // If the row is template just continue
                if(row.attr('id') === 'product_row_template') return;

                var productInput = row.find('[name="product[]"]');
                initializeProductSelect2(productInput);

                var taxInput = row.find('[name="taxes[]"]');
                initializeTaxSelect2(taxInput);
            });

            initializePriceListener();
            calculateRowPrice();
        });
    </script>
@endsection
