<form action="" method="GET">
    <div class="">
        <div class="card-form_body w-100">
            <div class="row d-flex justify-content-center">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[display_name]">{{ __('messages.display_name') }}</label>
                        <input name="filter[display_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['display_name']) ? Request::get("filter")['display_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[contact_name]">{{ __('messages.contact_name') }}</label>
                        <input name="filter[contact_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['contact_name']) ? Request::get("filter")['contact_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <div class="col-12">
                        <a href="{{ route('vendors', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-danger btn-sm mt-1">{{ __('messages.clear_filters') }}</a>

                        <button type="submit" class="btn btn-info btn-sm mt-1">
                            <i class="ft-search"></i>
                            {{ __('messages.filter') }}
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</form>
