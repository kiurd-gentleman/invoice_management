<!DOCTYPE html>
<html>

<head>
    <title>Estimate</title>
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
            color: rgba(0, 0, 0, 0.2);
            border: 0.5px solid #EAF1FB;
        }

        h4 {
            margin: 0px;
        }

        /* -- Header -- */

        .header-container {
            margin-top: -30px;
            width: 100%;
            padding: 0px 30px;
        }

        .header-logo {
            height: 50px;
            text-transform: capitalize;
            padding-top: 0px;
            color: {{$estimate->company->getSetting('estimate_color')}};
        }

        /* -- Company Address -- */

        .company-address-container {
            width: 50%;
            text-transform: capitalize;
            padding-left: 80px;
            margin-bottom: 2px;
        }

        .company-address {
            margin-top: 12px;
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            word-wrap: break-word;
        }

        /* -- Content Wrapper -- */

        .wrapper {
            display: block;
            padding-top: 0px;
            padding-bottom: 20px;
        }

        .customer-address-container {
            display: block;
            float: left;
            width: 45%;
            padding: 10px 0 0 30px;
        }

        /* -- Shipping -- */

        .shipping-address-container {
            float: right;
            display: block;
        }

        .shipping-address-container--left {
            float:left;
            display: block;
            padding-left: 0;
        }

        .shipping-address-label {
            padding-top: 5px;
            font-size: 12px;
            line-height: 18px;
            margin-bottom: 0px;
        }

        .shipping-address-name {
            padding: 0px;
            font-size: 15px;
            line-height: 22px;
            margin: 0px;
            max-width: 160px;
        }

        .shipping-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin-top: 5px;
            width: 160px;
            word-wrap: break-word;
        }

        /* -- Billing -- */

        .billing-address-container {
            display: block;
            float: left;
        }

        .billing-address-label {
            padding-top: 5px;
            font-size: 12px;
            line-height: 18px;
            margin-bottom: 0px;
        }

        .billing-address-name {
            padding: 0px;
            font-size: 15px;
            line-height: 22px;
            margin: 0px;
            max-width: 160px;
        }

        .billing-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin-top: 5px;
            width: 160px;
            word-wrap: break-word;
        }

        /* -- Estimate Details -- */

        .estimate-details-container {
            display: block;
            float: right;
            padding: 10px 30px 0 0;
        }

        .attribute-label {
            font-size: 12px;
            line-height: 18px;
            text-align: left;
            color: #55547A
        }

        .attribute-value {
            font-size: 12px;
            line-height: 18px;
            text-align: right;
        }

        /* -- Items Table -- */

        .items-table {
            padding: 30px 30px 10px 30px;
            page-break-before: avoid;
            page-break-after: auto;
        }

        .items-table hr {
            height: 0.1px;
            margin: 0 30px;
        }

        .item-table-heading {
            font-size: 13.5;
            text-align: center;
            color: rgba(0, 0, 0, 0.85);
            padding: 5px;
            padding-bottom: 10px;
        }

        tr.item-table-heading-row th {
            border-bottom: 0.620315px solid #E8E8E8;
            font-size: 12px;
            line-height: 18px;
        }

        .item-table-heading-row {
            margin-bottom: 10px;
        }

        tr.item-row td {
            font-size: 12px;
            line-height: 18px;
        }

        .item-cell {
            font-size: 13;
            color: #040405;
            text-align: center;
            padding: 5px;
            padding-top: 10px;
            border-color: #d9d9d9;
        }

        .item-description {
            color: #595959;
            font-size: 9px;
            line-height: 12px;
        }

        .item-cell-table-hr {
            margin: 0 30px 0 30px;
        }

        /* -- Total Display Table -- */

        .total-display-container {
            padding: 0 25px;
        }

        .total-display-table {
            box-sizing: border-box;
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
            margin-left: 500px;
            margin-top: 20px;
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
            color: {{$estimate->company->getSetting('estimate_color')}};
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
                <td width="50%" class="header-section-left">
                    @if(get_company_setting('avatar', $estimate->company->id))
                        <img class="header-logo" src="{{ $estimate->company->avatar }}" alt="{{ $estimate->company->name }}">
                    @else
                        <h1 class="header-logo"> {{$estimate->company->name}} </h1>
                    @endif
                </td>
                <td width="50%" class="company-address-container company-address text-right">
                    @if($estimate->company->name)
                        <h3>{{ $estimate->company->name }}</h3>
                    @endif
                    @if($estimate->company->billing->address_1)
                        <p class="mb-0">{{ $estimate->company->billing->address_1 }}</p>
                    @endif
                    @if($estimate->company->billing->address_2)
                        <p class="mb-0">{{ $estimate->company->billing->address_2 }}</p>
                    @endif
                    @if($estimate->company->billing->city or $estimate->company->billing->state)
                        <p class="mb-0">{{ $estimate->company->billing->city }}, {{ $estimate->company->billing->state }}</p>
                    @endif
                    @if($estimate->company->billing->country->name)
                        <p class="mb-0">{{ $estimate->company->billing->country->name }}</p>
                    @endif
                    @if($estimate->company->billing->phone)
                        <p class="mb-0">{{ $estimate->company->billing->phone }}</p>
                    @endif
                    @if($estimate->company->vat_number)
                        <p class="mb-0">{{ __('messages.vat_number') . ': ' . $estimate->company->vat_number }}</p>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <hr class="header-bottom-divider">

    <div class="wrapper">
        <div class="main-content">
            <div class="customer-address-container">
                <div class="billing-address-container billing-address">
                    <h3>{{ __('messages.to') }}</h3>
                    @if($estimate->customer->display_name)
                        <p class="mb-0"><strong>{{ $estimate->customer->display_name }}</strong></p>
                    @endif
                    @if($estimate->customer->billing->address_1)
                        <p class="mb-0">{{ $estimate->customer->billing->address_1 }}</p>
                    @endif
                    @if($estimate->customer->billing->address_2)
                        <p class="mb-0">{{ $estimate->customer->billing->address_2 }}</p>
                    @endif
                    @if($estimate->customer->billing->city or $estimate->customer->billing->state)
                        <p class="mb-0">{{ $estimate->customer->billing->city }}, {{ $estimate->customer->billing->state }}</p>
                    @endif
                    @if($estimate->customer->billing->country->name)
                        <p class="mb-0">{{ $estimate->customer->billing->country->name }}</p>
                    @endif
                    @if($estimate->customer->billing->phone)
                        <p class="mb-0">{{ $estimate->customer->billing->phone }}</p>
                    @endif
                    @if($estimate->customer->vat_number)
                        <p class="mb-0">{{ __('messages.vat_number') . ': ' . $estimate->customer->vat_number }}</p>
                    @endif
                </div>

                @if($estimate->customer->shipping->address_1)
                <div class="shipping-address-container shipping-address">
                    @else
                    <div class="shipping-address-container--left shipping-address">
                        @endif
                        @if($estimate->customer->shipping->address_1)
                            <h3>{{ __('messages.ship_to') }}</h3>
                            @if($estimate->customer->shipping->address_1)
                                <p class="mb-0">{{ $estimate->customer->billing->address_1 }}</p>
                            @endif
                            @if($estimate->customer->shipping->address_2)
                                <p class="mb-0">{{ $estimate->customer->billing->address_2 }}</p>
                            @endif
                            @if($estimate->customer->shipping->city or $estimate->customer->shipping->state)
                                <p class="mb-0">{{ $estimate->customer->shipping->city }}, {{ $estimate->customer->shipping->state }}</p>
                            @endif
                            @if($estimate->customer->shipping->country)
                                <p class="mb-0">{{ $estimate->customer->shipping->country->name }}</p>
                            @endif
                            @if($estimate->customer->shipping->phone)
                                <p class="mb-0">{{ $estimate->customer->shipping->phone }}</p>
                            @endif
                        @endif
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div class="estimate-details-container">
                    <table>
                        <tr>
                            <td class="attribute-label">{{ __('messages.estimate_number') }}</td>
                            <td class="attribute-value"> &nbsp;{{$estimate->estimate_number}}</td>
                        </tr>
                        <tr>
                            <td class="attribute-label">{{ __('messages.estimate_date') }}</td>
                            <td class="attribute-value"> &nbsp;{{$estimate->formatted_estimate_date}}</td>
                        </tr>
                        <tr>
                            <td class="attribute-label">{{ __('messages.expiry_date') }}</td>
                            <td class="attribute-value"> &nbsp;{{$estimate->formatted_expiry_date}}</td>
                        </tr>
                    </table>
                </div>
                <div style="clear: both;"></div>
            </div>
            
            @include('pdf.estimate._table')

            <div class="notes">
                @if($estimate->notes)
                    <div class="notes-label">
                        {{ __('messages.notes') }}
                    </div>
                    {{ $estimate->notes }}
                @endif
                
                <div class="py-8">
                    {{ $estimate->company->getSetting('estimate_footer') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
