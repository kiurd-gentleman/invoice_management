<form action="" method="GET">
    <div class="">
        <div class="card-form_body w-100">
            <div class="row d-flex justify-content-center">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[expense_category_id]">{{ __('messages.expense_category') }}</label>
                        <select id="filter[expense_category_id]" name="filter[expense_category_id]" data-toggle="select" class="form-control select2" data-select2-id="filter[expense_category_id]">
                            <option selected value="">{{ __('messages.select_category') }}</option>
                            @foreach(get_expense_categories_select2_array($currentCompany->id) as $option)
                                <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['expense_category_id']) && Request::get("filter")['expense_category_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[from]">{{ __('messages.from') }}</label>
                        <input name="filter[from]" type="text" class="form-control datepicker"  data-flatpickr-default-date="{{ isset(Request::get("filter")['from']) ? Request::get("filter")['from'] : '' }}" readonly="readonly" placeholder="{{ __('messages.from') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="filter[to]">{{ __('messages.to') }}</label>
                        <input name="filter[to]" type="text" class="form-control datepicker"  data-flatpickr-default-date="{{ isset(Request::get("filter")['to']) ? Request::get("filter")['to'] : '' }}" readonly="readonly" placeholder="{{ __('messages.to') }}">
                    </div>
                </div>
                <div class=" col-md-3  mt-2 ">
                    <div class="col-12  ">
                        <a href="{{ route('expenses', ['company_uid' => $currentCompany->uid]) }}" class=" btn btn-danger"><i class="ft-refresh-cw"></i>{{ __('messages.clear_filters') }}</a>
                        <button type="submit" class="btn btn-info">
                            <i class="ft-search"></i>
                            {{ __('messages.filter') }}
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</form>
