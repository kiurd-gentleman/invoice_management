<form action="" method="GET">
    <div class="">
        <div class="card-form__body w-100 card-body-form-group">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter[estimate_number]">{{ __('Quotation no') }}</label>
                        <input name="filter[estimate_number]" type="text" class="form-control" value="{{ isset(Request::get("filter")['estimate_number']) ? Request::get("filter")['estimate_number'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter[from]">{{ __('messages.from') }}</label>
                        <input name="filter[from]" type="text" class="form-control datepicker" value="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : '' }}" readonly="readonly" placeholder="{{ __('messages.from') }}">
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="form-group">
                        <label for="filter[to]">{{ __('messages.to') }}</label>
                        <input name="filter[to]" type="text" class="form-control datepicker" value="{{ isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : '' }}" readonly="readonly" placeholder="{{ __('messages.to') }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 mt-1">
                        <a href="{{ route('estimates', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-danger mt-1 text-uppercase"><i class="ft-refresh-cw"></i>{{ __('messages.clear_filters') }}</a>
                        <button type="submit" class="btn btn-sm btn-success mt-1 text-uppercase">
                            <i class="ft-search"></i>
                            {{ __('messages.filter') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</form>
