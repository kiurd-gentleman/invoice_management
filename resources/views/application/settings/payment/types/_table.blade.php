@if($payment_types->count() > 0)
    <div class="table-responsive" data-toggle="lists">
        <table class="table table-xl mb-0 thead-border-top-0 table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.name') }}</th>
                    <th class="w-30">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody class="list" id="payment_types">
                @foreach($payment_types as $payment_type)
                    <tr>
                        <td class="h6">
                            <a href="{{ route('settings.payment.type.edit', ['type' => $payment_type->id, 'company_uid' => $currentCompany->uid]) }}">
                                <strong class="h6">
                                    {{ $payment_type->name }}
                                </strong>
                            </a>
                        </td>
                        <td class="h6">
                            <a href="{{ route('settings.payment.type.edit', ['type' => $payment_type->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-warning">
                                <i class="ft-edit"></i>

                            </a>
                            <a href="{{ route('settings.payment.type.delete', ['type' => $payment_type->id, 'company_uid' => $currentCompany->uid]) }}" class="btn btn-sm btn-danger delete-confirm">
                                <i class="ft-trash"></i>

                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row card-body pagination-light justify-content-center text-center">
        {{ $payment_types->links() }}
    </div>
@else
    <div class="row justify-content-center card-body pb-0 pt-5">
        <i class="material-icons fs-64px">payment</i>
    </div>
    <div class="row justify-content-center card-body pb-5">
        <p class="h4">{{ __('messages.no_payment_types_yet') }}</p>
    </div>
@endif
