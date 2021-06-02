@extends('layouts.app', ['page' => 'Letter Head'])

@section('title', __('Letter Head Create'))
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
@endsection
@section('page_header')
{{--    <div class="page__heading d-flex align-items-center">--}}
{{--        <div class="flex">--}}
{{--            <nav aria-label="breadcrumb">--}}
{{--                <ol class="breadcrumb mb-0">--}}
{{--                    <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>--}}
{{--                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}">{{ __('messages.invoices') }}</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create_invoice') }}</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <h1 class="m-0">{{ __('messages.create_invoice') }}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ __('Letter Head') }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">{{get_system_setting('application_name')}}</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}" >{{ __('Letter Head') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Create') }}
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
                        <h4 class="card-title" id="basic-layout-round-controls">{{ __('Letter Head create') }}</h4>
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
                                <form action="{{ route('letter-head.store', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                                    @include('layouts._form_errors')
                                    @csrf
                                    @include('application.letter_head._form')
                                </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('page_body_scripts')
    <script src="{{asset('app-assets/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

    <script src="{{asset('app-assets/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>
    @include('application.invoices._js')
    <script>
        // $('#input-image').click (e) -> $('input:file')[0].click();
        $('#input_image').on('click', function() {
            $('#header_image').trigger('click');
        });
        $('#footer_input_image').on('click', function() {
            $('#footer_image').trigger('click');
        });
        header_image.onchange = evt => {
            $('#icon').hide();
            const [file] = header_image.files
            if (file) {
                show_header_image.src = URL.createObjectURL(file)
                $('#show_header_image').show();

            }
        }
        footer_image.onchange = evt => {
            $('#footer_icon').hide();
            const [file] = footer_image.files
            if (file) {
                show_footer_image.src = URL.createObjectURL(file)
                $('#show_footer_image').show();

            }
        }
        // function save(){
        //     CKEDITOR.instances.ckeditor.updateElement();
        //     CKEDITOR.instances.ckeditor.destroy();
        // }
        // $(document).ready(function() {
        //
        // });


    </script>
@endsection
