<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        /* -- Base -- */
        body {
            font-family: "DejaVu Sans";
        }

        html {
            margin: 0px;
            padding: 0px;
            margin-top: 50px;
        }

        table {
            border-collapse: collapse;
        }

        hr {
            margin: 0 30px 0 30px;
            color: rgba(0, 0, 0, 0.2);
            border: 0.5px solid #EAF1FB;
        }

        h4 {
            margin: 0px;
        }

        /* -- Header -- */

        .header-container {
            position: absolute;
            width: 100%;
            height: 141px;
            left: 0px;
            top: -60px;
            background: {{$invoice->company->getSetting('invoice_color')}};
        }

        .header-section-left {
            padding-top: 45px;
            padding-bottom: 45px;
            padding-left: 30px;
            display: inline-block;
            width: 30%;
        }

        .header-logo {
            position: absolute;
            height: 50px;
            text-transform: capitalize;
            color: #fff;
        }

        .header-section-right {
            display: inline-block;
            width: 35%;
            float: right;
            padding: 20px 30px 20px 0px;
            text-align: right;
            color: white;
        }

        .header {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.7);
        }

        /*  -- invoice Details -- */

        .invoice-details-container {
            text-align: center;
            width: 40%;
        }

        .invoice-details-container h1 {
            margin: 0;
            font-size: 24px;
            line-height: 36px;
            text-align: right;
        }

        .invoice-details-container h4 {
            margin: 0;
            font-size: 10px;
            line-height: 15px;
            text-align: right;
        }

        .invoice-details-container h3 {
            margin-bottom: 1px;
            margin-top: 0;
        }

        /* -- Content Wrapper -- */

        .content-wrapper {
            display: block;
            margin-top: 60px;
            padding-bottom: 20px;
        }

        .address-container {
            display: block;
            padding-top: 20px;
            margin-top: 18px;
        }

        /* -- Company -- */

        .company-address-container {
            padding: 0 0 0 30px;
            display: inline;
            float: left;
            width: 30%;
        }

        .company-address-container h1 {
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 0.05em;
            margin-bottom: 0;
            /* margin-top: 18px; */
        }

        .company-address{
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin-top: 0px;
            word-wrap: break-word;
        }

        /* -- Billing -- */

        .billing-address-container {
            display: block;
            /* position: absolute; */
            float: right;
            padding: 0 40px 0 0;
        }

        .billing-address-label {
            font-size: 12px;
            line-height: 18px;
            padding: 0px;
            margin-bottom: 0px;
        }

        .billing-address-name {
            max-width: 250px;
            font-size: 15px;
            line-height: 22px;
            padding: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .billing-address{
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            padding: 0px;
            margin: 0px;
            width: 170px;
            word-wrap: break-word;
        }

        /* -- Shipping -- */

        .shipping-address-container {
            display: block;
            float: right;
            padding: 0 30px 0 0;
        }

        .shipping-address-label {
            font-size: 12px;
            line-height: 18px;
            padding: 0px;
            margin-bottom: 0px;
        }

        .shipping-address-name {
            max-width: 250px;
            font-size: 15px;
            line-height: 22px;
            padding: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .shipping-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            padding: 0px 30px 0px 30px;
            width: 170px;
            word-wrap: break-word;
        }

        /* -- Items Table -- */

        .items-table {
            margin-top: 35px;
            padding: 0px 30px 10px 30px;
            page-break-before: avoid;
            page-break-after: auto;
        }

        .items-table hr {
            height: 0.1px;
        }

        .item-table-heading {
            font-size: 13.5;
            text-align: center;
            color: rgba(0, 0, 0, 0.85);
            padding: 5px;
            color: {{$invoice->company->getSetting('invoice_color')}};
        }

        tr.item-table-heading-row th {
            border-bottom: 0.620315px solid #E8E8E8;
            font-size: 12px;
            line-height: 18px;
        }

        tr.item-row td {
            font-size: 12px;
            line-height: 18px;
        }

        .item-cell {
            font-size: 13;
            text-align: center;
            padding: 5px;
            padding-top: 10px;
            color: #040405;
        }

        .item-description {
            color: #595959;
            font-size: 9px;
            line-height: 12px;
        }

        /* -- Total Display Table -- */

        .total-display-container {
            padding: 0 25px;
        }

        .item-cell-table-hr {
            margin: 0 25px 0 30px;
        }

        .total-display-table {
            box-sizing: border-box;
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
            margin-left: 500px;
            border: 1px solid #EAF1FB;
            border-top: none;
        }

        .total-table-attribute-label {
            font-size: 12px;
            color: #55547A;
            text-align: left;
            padding-left: 10px;
        }

        .total-table-attribute-value {
            font-weight: bold;
            text-align: right;
            font-size: 12px;
            color: #040405;
            padding-right: 10px;
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .total-border-left {
            border: 1px solid #E8E8E8 !important;
            border-right: 0px !important;
            padding-top: 0px;
            padding: 8px !important;
        }

        .total-border-right {
            border: 1px solid #E8E8E8 !important;
            border-left: 0px !important;
            padding-top: 0px;
            padding: 8px !important;
        }

        /* -- Notes -- */

        .notes {
            font-size: 12px;
            color: #595959;
            margin-top: 15px;
            margin-left: 30px;
            width: 442px;
            word-wrap: break-word;
            text-align: left;
            page-break-inside: avoid;
        }

        .notes-label {
            font-size: 15px;
            line-height: 22px;
            letter-spacing: 0.05em;
            color: #040405;
            width: 108px;
            height: 19.87px;
            padding-bottom: 10px;
        }

        /* -- Helpers -- */

        .text-primary {
            color: {{$invoice->company->getSetting('invoice_color')}};
        }

        .text-center {
            text-align: center
        }

        table .text-left {
            text-align: left;
        }

        table .text-right {
            text-align: right;
        }

        .border-0 {
            border: none;
        }

        .py-2 {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .py-8 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .py-3 {
            padding: 3px 0;
        }

        .pr-20 {
            padding-right: 20px;
        }

        .pr-10 {
            padding-right: 10px;
        }

        .pl-20 {
            padding-left: 20px;
        }

        .pl-10 {
            padding-left: 10px;
        }

        .pl-0 {
            padding-left: 0;
        }

        .mb-0 {
            margin-top: 0px;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <table width="100%">
            <tr>
                @if(get_company_setting('avatar', $invoice->company->id))
                <td width="60%" class="header-section-left">
                    <img class="header-logo" src="{{ public_path($invoice->company->avatar) }}" alt="{{ $invoice->company->name }}">
                    @else
                <td width="60%" class="header-section-left" style="padding-top: 0px;">
                    <h1 class="header-logo"> {{$invoice->company->name}} </h1>
                    @endif
                </td>
                <td width="40%" class="header-section-right invoice-details-container">
                    <h1>{{ __('messages.invoice') }}</h1>
                    <h4>{{$invoice->invoice_number}}</h4>
                    <h4>{{ __('messages.invoice_date') }}: {{$invoice->formatted_invoice_date}}</h4>
                    <h4>{{ __('messages.due_date') }}: {{$invoice->formatted_due_date}}</h4>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="content-wrapper">
        <div class="address-container">
            <div class="company-address-container company-address">
                <h2>{{ __('messages.from') }}</h2>
                @if($invoice->company->name)
                    <p class="mb-0"><strong>{{ $invoice->company->name }}</strong></p>
                @endif
                @if($invoice->company->billing->address_1)
                    <p class="mb-0">{{ $invoice->company->billing->address_1 }}</p>
                @endif
                @if($invoice->company->billing->address_2)
                    <p class="mb-0">{{ $invoice->company->billing->address_2 }}</p>
                @endif
                @if($invoice->company->billing->city or $invoice->company->billing->state)
                    <p class="mb-0">{{ $invoice->company->billing->city }}, {{ $invoice->company->billing->state }}</p>
                @endif
                @if($invoice->company->billing->country->name)
                    <p class="mb-0">{{ $invoice->company->billing->country->name }}</p>
                @endif
                @if($invoice->company->billing->phone)
                    <p class="mb-0">{{ $invoice->company->billing->phone }}</p>
                @endif
                @if($invoice->company->vat_number)
                    <p class="mb-0">{{ __('messages.vat_number') . ': ' . $invoice->company->vat_number }}</p>
                @endif
            </div>

            <div class="shipping-address-container shipping-address">
                <h2>{{ __('messages.to') }}</h2>
                @if($invoice->customer->display_name)
                    <p class="mb-0"><strong>{{ $invoice->customer->display_name }}</strong></p>
                @endif
                @if($invoice->customer->billing->address_1)
                    <p class="mb-0">{{ $invoice->customer->billing->address_1 }}</p>
                @endif
                @if($invoice->customer->billing->address_2)
                    <p class="mb-0">{{ $invoice->customer->billing->address_2 }}</p>
                @endif
                @if($invoice->customer->billing->city or $invoice->customer->billing->state)
                    <p class="mb-0">{{ $invoice->customer->billing->city }}, {{ $invoice->customer->billing->state }}</p>
                @endif
                @if($invoice->customer->billing->country->name)
                    <p class="mb-0">{{ $invoice->customer->billing->country->name }}</p>
                @endif
                @if($invoice->customer->billing->phone)
                    <p class="mb-0">{{ $invoice->customer->billing->phone }}</p>
                @endif
                @if($invoice->customer->vat_number)
                    <p class="mb-0">{{ __('messages.vat_number') . ': ' . $invoice->customer->vat_number }}</p>
                @endif
            </div>

            @if($invoice->customer->shipping->address_1)
            <div class="billing-address-container billing-address">
                @else
                <div class="billing-address-container billing-address" style="float:right; margin-right:30px;">
                    @endif
                    @if($invoice->customer->shipping->address_1)
                        <h2>{{ __('messages.ship_to') }}</h2>
                        @if($invoice->customer->shipping->address_1)
                            <p class="mb-0">{{ $invoice->customer->billing->address_1 }}</p>
                        @endif
                        @if($invoice->customer->shipping->address_2)
                            <p class="mb-0">{{ $invoice->customer->billing->address_2 }}</p>
                        @endif
                        @if($invoice->customer->shipping->city or $invoice->customer->shipping->state)
                            <p class="mb-0">{{ $invoice->customer->shipping->city }}, {{ $invoice->customer->shipping->state }}</p>
                        @endif
                        @if($invoice->customer->shipping->country)
                            <p class="mb-0">{{ $invoice->customer->shipping->country->name }}</p>
                        @endif
                        @if($invoice->customer->shipping->phone)
                            <p class="mb-0">{{ $invoice->customer->shipping->phone }}</p>
                        @endif
                    @endif
                </div>
                <div style="clear: both;"></div>
            </div>

            @include('pdf.invoice._table')

            <div class="notes">
                @if($invoice->notes)
                    <div class="notes-label">
                        {{ __('messages.notes') }}
                    </div>
                    {{ $invoice->notes }}
                @endif

                <div class="py-8">
                    {{ $invoice->company->getSetting('invoice_footer') }}
                </div>
            </div>
        </div>
</body>

</html>
