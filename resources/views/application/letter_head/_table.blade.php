@if($invoices->count() > 0)
    <div class="table-responsive">
        <table class="table table-xl mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.invoice_number') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.customer') }}</th>
                    <th>{{ __('messages.status') }}</th>
                    <th>{{ __('messages.paid_status') }}</th>
                    <th>{{ __('messages.amount_due') }}</th>
                    <th class="w-50px">{{ __('messages.view') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="invoices">
                @foreach ($letter_heads as $letter_head)
                    <tr>
                        <td class="h6">
                            <a href="{{ route('invoices.details', ['invoice' => $letter_head->id, 'company_uid' => $currentCompany->uid]) }}">
                                {{ $letter_head->invoice_number }}
                            </a>
                        </td>
                        <td class="h6">
                            {{ $letter_head->formatted_invoice_date }}
                        </td>
                        <td class="h6">
                            <a href="{{ route('customers.details', ['customer' => $letter_head->customer->id,'company_uid' => $currentCompany->uid]) }}">{{ $letter_head->customer->display_name }}</a>
                        </td>
                        <td class="h6">
                            @if($letter_head->status == 'DRAFT')
                                <div class="badge badge-dark fs-0-9rem">
                                    {{ $letter_head->status }}
                                </div>
                            @elseif($letter_head->status == 'SENT')
                                <div class="badge badge-info fs-0-9rem">
                                    {{ $letter_head->status }}
                                </div>
                            @elseif($letter_head->status == 'VIEWED')
                                <div class="badge badge-primary fs-0-9rem">
                                    {{ $letter_head->status }}
                                </div>
                            @elseif($letter_head->status == 'OVERDUE')
                                <div class="badge badge-danger fs-0-9rem">
                                    {{ $letter_head->status }}
                                </div>
                            @elseif($letter_head->status == 'COMPLETED')
                                <div class="badge badge-success fs-0-9rem">
                                    {{ $letter_head->status }}
                                </div>
                            @endif
                        </td>
                        <td class="h6">
                            @if($letter_head->paid_status == 'UNPAID')
                                <div class="badge badge-warning fs-0-9rem">
                                    {{ $letter_head->paid_status }}
                                </div>
                            @elseif($letter_head->paid_status == 'PARTIALLY_PAID')
                                <div class="badge badge-info fs-0-9rem">
                                    {{ $letter_head->paid_status }}
                                </div>
                            @elseif($letter_head->paid_status == 'PAID')
                                <div class="badge badge-success fs-0-9rem">
                                    {{ $letter_head->paid_status }}
                                </div>
                            @endif
                        </td>
                        <td class="h6">
                            {{ money($letter_head->due_amount, $letter_head->currency_code) }}
                        </td>
                        <td class="h6">
                            <a href="{{ route('invoices.details', ['invoice' => $letter_head->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-link">
                                <i class="ft-arrow-right text-warning" style="font-size: 15px"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $letter_heads->links() }}
    </div>
@else
{{--    <div class="row justify-content-center card-body pb-0 pt-5">--}}
{{--        <i class="fa-thermometer-empty"></i>--}}
{{--    </div>--}}
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('No Letter Head Yet') }}</p>
    </div>
@endif
