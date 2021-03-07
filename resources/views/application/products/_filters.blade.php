<form action="" method="GET">
    <div class="card-form_body w-100">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="filter[name]">{{ __('messages.name') }}</label>
                    <input name="filter[name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['name']) ? Request::get("filter")['name'] : '' }}" placeholder="{{ __('messages.name') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="filter[unit_id]">{{ __('messages.product_unit') }}</label>
                    <select id="filter[unit_id]" name="filter[unit_id]" data-toggle="select" class="form-control select2" data-select2-id="filter[unit_id]">
                        <option  value="" disabled>{{ __('messages.select_unit') }}</option>
                        @foreach(get_product_units_select2_array($currentCompany->id) as $option)
                            <option value="{{ $option['id'] }}" {{ isset(Request::get("filter")['unit_id']) && Request::get("filter")['unit_id'] == $option['id'] ? 'selected=""' : '' }}>{{ $option['text'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 button-group mt-1">
                    <a href="{{ route('products', ['company_uid' => $currentCompany->uid]) }}" class="btn  btn-sm btn-outline-danger mt-1 "><i class="ft-trash"></i> {{ __('messages.clear_filters') }}</a>
                    <button type="submit" class="btn btn-outline-info btn-sm mt-1 "> <i class="ft-search"></i>
{{--                        <i class="material-icons text-primary">refresh</i>--}}
                        {{ __('messages.filter') }}
                    </button>
                    <a href="{{ route('products.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-outline-success btn-sm mt-1"><i class="ft-plus"></i> {{ __('messages.create_product') }}</a>
                </div>
            </div>
        </div>

    </div>
</form>
