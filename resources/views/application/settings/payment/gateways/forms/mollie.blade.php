<div class="form-group mb-4">
    <p class="h5 mb-0">
        <strong class="headings-color">{{ __('messages.mollie_settings') }}</strong>
    </p>
    <p class="text-muted">{{ __('messages.mollie_settings_description') }}</p>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group required">
            <label for="mollie_api_key">{{ __('messages.mollie_api_key') }}</label>
            <input name="mollie_api_key" type="text" class="form-control" placeholder="{{ __('messages.mollie_api_key') }}" value="{{ $currentCompany->getSetting('mollie_api_key') }}" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="mollie_test_mode">{{ __('messages.test_mode') }}</label>
            <select name="mollie_test_mode" class="form-control">
                <option value="0" {{ $currentCompany->getSetting('mollie_test_mode') == false ? 'selected' : '' }}>{{ __('messages.false') }}</option>
                <option value="1" {{ $currentCompany->getSetting('mollie_test_mode') == true  ? 'selected' : '' }}>{{ __('messages.true') }}</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="mollie_active">{{ __('messages.active') }}</label>
            <select name="mollie_active" class="form-control">
                <option value="0" {{ $currentCompany->getSetting('mollie_active') == false ? 'selected' : '' }}>{{ __('messages.disabled') }}</option>
                <option value="1" {{ $currentCompany->getSetting('mollie_active') == true  ? 'selected' : '' }}>{{ __('messages.active') }}</option>
            </select>
        </div>
    </div>
</div>
 
