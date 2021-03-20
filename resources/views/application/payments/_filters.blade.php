<form action="" method="GET">
    <div class="">
        <div class="card-form_body w-100">
            <div class="row d-flex justify-content-center">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[payment_number]">{{ __('messages.payment_number') }}</label>
                        <input name="filter[payment_number]" type="text" class="form-control" value="{{ isset(Request::get("filter")['payment_number']) ? Request::get("filter")['payment_number'] : '' }}" placeholder="{{ __('messages.search') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[payment_method_id]">{{ __('messages.payment_method') }}</label>
                        <select id="filter[payment_method_id]" name="filter[payment_method_id]" data-toggle="select" class="form-control select2" data-select2-id="filter[payment_method_id]">
                            <option selected value="">{{ __('messages.payment_type') }}</option>
                            @foreach(get_payment_methods_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['payment_method_id']) && Request::get("filter")['payment_method_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[from]">{{ __('messages.from') }}</label>
                        <input name="filter[from]" type="text" class="form-control datepicker" value="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : '' }}" readonly="readonly" placeholder="{{ __('messages.from') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[to]">{{ __('messages.to') }}</label>
                        <input name="filter[to]" type="text" class="form-control datepicker" value="{{ isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : '' }}" readonly="readonly" placeholder="{{ __('messages.to') }}">
                    </div>
                </div>
                <div class="row mt-2 col-md-3">
                    <div class="col-12">
                        <a href="{{ route('payments', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-danger "><i class="ft-refresh-cw"></i> {{ __('messages.clear_filters') }}</a>
                        <button type="submit" class="btn btn-success">
                            <i class="ft-search"></i>
                            {{ __('messages.filter') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
