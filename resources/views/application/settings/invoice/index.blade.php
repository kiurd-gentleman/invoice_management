@extends('layouts.app', ['page' => 'settings'])

@section('title', __('messages.invoice_settings'))

@section('page_head_scripts')
<style>
    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }
    
    #myImg:hover {opacity: 0.7;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }
    
    /* Modal Content (image) */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }
    
    /* Caption of Modal Image */
    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }
    
    /* Add Animation */
    .modal-content, #caption {  
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }
    
    @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)} 
      to {-webkit-transform:scale(1)}
    }
    
    @keyframes zoom {
      from {transform:scale(0)} 
      to {transform:scale(1)}
    }
    
    /* The Close Button */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }
    
    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
    
    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
      .modal-content {
        width: 100%;
      }
    }
</style>
@endsection
    
@section('content')
    <div class="page__heading">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">business</i></a></li>
                <li class="breadcrumb-item">{{ __('messages.settings') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.invoice_settings') }}</li>
            </ol>
        </nav>
        <h1 class="m-0">{{ __('messages.invoice_settings') }}</h1>
    </div>

    <div class="row">
        <div class="col-lg-3">
            @include('application.settings._aside', ['tab' => 'invoice'])
        </div>
        <div class="col-lg-9">
            
            <div class="card card-form">
                <div class="row no-gutters">
                    <div class="col card-form__body card-body bg-white">
                        <form action="{{ route('settings.invoice.update', ['company_uid' => $currentCompany->uid]) }}" method="POST">
                            @include('layouts._form_errors')
                            @csrf

                            <div class="form-group mb-4">
                                <p class="h5 mb-0">
                                    <strong class="headings-color">{{ __('messages.invoice_settings') }}</strong>
                                </p>
                                <p class="text-muted">{{ __('messages.customize_invoice_settings') }}</p>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="form-group required">
                                        <label for="invoice_prefix">{{ __('messages.invoice_prefix') }}</label>
                                        <input name="invoice_prefix" type="text" class="form-control" value="{{ $currentCompany->getSetting('invoice_prefix') }}" placeholder="{{ __('messages.invoice_prefix') }}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="invoice_auto_archive">{{ __('messages.auto_archive') }}</label><br>
                                        <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                            <input type="checkbox" name="invoice_auto_archive" id="invoice_auto_archive" {{ $currentCompany->getSetting('invoice_auto_archive') ? 'checked' : '' }} class="custom-control-input">
                                            <label class="custom-control-label" for="invoice_auto_archive">{{ __('messages.yes') }}</label>
                                        </div>
                                        <label for="invoice_auto_archive" class="mb-0">{{ __('messages.yes') }}</label>
                                        <small class="form-text text-muted">
                                            {{ __('messages.auto_archive_description') }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="form-group required">
                                        <label for="invoice_color">{{ __('messages.invoice_color') }}</label>
                                        <input name="invoice_color" type="color" class="form-control" value="{{ $currentCompany->getSetting('invoice_color') }}" placeholder="{{ __('messages.invoice_color') }}">
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="invoice_footer">{{ __('messages.footer') }}</label>
                                <textarea name="invoice_footer" class="form-control" rows="4" placeholder="{{ __('messages.footer') }}">{{ $currentCompany->getSetting('invoice_footer') }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="invoice_template">{{ __('messages.invoice_template') }}</label>
                                @php $default_template = get_company_setting('invoice_template', $currentCompany->id) @endphp
                                <div class="row mt-3">
                                    @foreach(\App\Models\InvoiceTemplate::all() as $template)
                                        <div class="col-md-3">
                                            <div class="custom-control custom-radio image-checkbox">
                                                <input type="radio" class="custom-control-input" id="{{$template->view}}" name="invoice_template" value="{{$template->view}}" @if($default_template === $template->view) checked='' @endif>
                                                <label class="custom-control-label" for="{{$template->view}}">
                                                    <img src="{{ $template->path }}" class="img-fluid modal-image">
                                                    <span>{{ $template->name }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
            
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update_settings') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('page_body_scripts')
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" id="modalImage" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.modal-image').on('click', function () {
            $('#modalImage').attr('src', $(this).attr('src'))
            $('#imagemodal').modal('show');
        });
    </script>
@endsection

