<form action="" method="GET">
    <div class="card-form_body w-100 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="filter[display_name]">{{ __('messages.display_name') }}</label>
                    <input name="filter[display_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['display_name']) ? Request::get("filter")['display_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="filter[contact_name]">{{ __('messages.contact_name') }}</label>
                    <input name="filter[contact_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['contact_name']) ? Request::get("filter")['contact_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group ">
                    <label for="filter[has_unpaid]">{{ __('messages.has_unpaid_invoice') }}</label>
                    <div class="custom-control custom-checkbox mt-1 ">
                        <input id="filter[has_unpaid]" name="filter[has_unpaid]" type="checkbox" {{ isset(Request::get("filter")['has_unpaid']) ? 'checked=""' : '' }} value="true" class="custom-control-input" >
                        <label class="custom-control-label" for="filter[has_unpaid]">{{ __('messages.yes') }}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class=" button-group mt-2">
                    <button type="submit" class="btn btn-sm  btn-info bg-white ">
                        <i class="ft-search"></i>&nbsp;
                        {{ __('Find') }}
                    </button>
                    <a href="{{ route('customers', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-danger"><i class="ft-refresh-ccw"></i>&nbsp; {{ __('messages.clear_filters') }}</a>
                </div>
            </div>

        </div>

    </div>
</form>
