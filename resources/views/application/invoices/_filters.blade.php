<form action="" method="GET">
    <div class="card-form_body w-100">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-auto">
                <div class="form-group">
                    <label for="filter[invoice_number]">{{ __('messages.invoice_number') }}</label>
                    <input name="filter[invoice_number]" type="text" class="form-control" value="{{ isset(Request::get("filter")['invoice_number']) ? Request::get("filter")['invoice_number'] : '' }}" placeholder="{{ __('messages.search') }}">
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
                <div class="col-12 button-group mt-1">
                    <a href="{{ route('invoices', ['company_uid' => $currentCompany->uid]) }}" class="btn  btn-sm btn-outline-danger mt-2 ">{{ __('messages.clear_filters') }}</a>
                    <button type="submit" class="btn btn-outline-info btn-sm mt-2">
                        <i class="material-icons text-primary icon-20pt">refresh</i>
                        {{ __('messages.filter') }}
                    </button>
                    <a href="{{ route('invoices.create', ['company_uid' => $currentCompany->uid]) }}" class="btn btn-outline-success btn-sm mt-2"><i class="ft-plus"></i> {{ __('messages.create_invoice') }}</a>
                </div>
            </div>
        </div>

    </div>
</form>
