@if($customers->count() > 0)
    <div class="table-responsive">
        <table class="table mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th width=0%"" class="text-center">{{ __('messages.#id') }}</th>
                    <th width=25%">{{ __('messages.display_name') }}</th>
                    <th width=30%">{{ __('messages.contact_name') }}</th>
                    <th width="10%">{{ __('messages.invoices') }}</th>
                    <th class="text-center" width=10%">{{ __('messages.amount_due') }}</th>
                    <th class="text-center" width="20%">{{ __('messages.created_at') }}</th>
                    <th width="5%">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="customers">
                @foreach ($customers as $customer)
                    <tr>
                        <td>
                            <div class="badge badge-info">#{{ $customer->id }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="ft-briefcase icon-16pt mr-1 text-primary"></i>
                                    <a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}">{{ $customer->display_name }}</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="ft-map-pin mr-1 text-danger"></i>
                                    {{ $customer->displayShortAddress('billing') }}
                                </small>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="ft-user mr-1 text-primary"></i>
                                    <p class="text-muted mb-0">{{ $customer->contact_name }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="text-muted">
                                    <i class="ft-mail mr-1 text-danger"></i>
                                    {{ $customer->email }}
                                </small>
                            </div>

                        </td>
                        <td class="w-80px" class="text-center">
                            <i class="ft-file-text mr-1 text-info"></i>
                            <a class="text-muted">{{ $customer->invoices()->count() }}</a>
                        </td>
                        <td class="text-center">
                            <strong>{{ money($customer->invoice_due_amount, $customer->currency_code) }}</strong>
                        </td>
                        <td class="text-center"><i class="ft-calendar mr-1 text-primary"></i>{{ $customer->created_at->format('Y-m-d') }}</td>
                        <td><a href="{{ route('customers.details', ['customer' => $customer->id,'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link"><i class="ft-arrow-right"></i></a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $customers->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">account_box</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_customers_yet') }}</p>
    </div>
@endif
