    <form action="" method="GET">
            <div class="card-form_body w-100 ">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filter[first_name]">{{ __('messages.first_name') }}</label>
                            <input name="filter[first_name]" type="text" class="form-control" value="{{ isset(Request::get("filter")['first_name']) ? Request::get("filter")['first_name'] : '' }}" placeholder="{{ __('messages.search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="filter[email]">{{ __('messages.email') }}</label>
                            <input name="filter[email]" type="text" class="form-control" value="{{ isset(Request::get("filter")['email']) ? Request::get("filter")['email'] : '' }}" placeholder="{{ __('messages.search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mt-1 button-group">
                            <a href="{{ route('super_admin.users') }}" class="btn btn-danger btn-sm mt-2"><i class="ft-trash"></i> Clear</a>
                            <button type="submit" class="btn btn-info btn-sm mt-2">
                                <i class="ft-search"></i>
                                {{ __('Search') }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>


    </form>


