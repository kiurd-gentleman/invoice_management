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
            height: 90px;
            left: 0px;
            top: -50px;
        }

        .header-bottom-divider {
            color: rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 90px;
            left: 0px;
            width: 100%;
        }

        .header-logo {
            height: 50px;
            margin-top: 20px;
            text-transform: capitalize;
            color: {{$estimate->company->getSetting('estimate_color')}};
        }

        .header {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.7);
        }

        .wrapper {
            display: block;
            margin-top: 0px;
            padding-top: 16px;
            padding-bottom: 20px;
        }

        /* -- Company Details -- */

        .company-details-container {
            padding-top: 30px;
        }

        .company-address-container {
            padding-top: 15px;
            float: left;
            padding-left: 30px;
            width: 30%;
            text-transform: capitalize;
            margin-bottom: 2px;
        }

        .company-address-container {
            padding-left: 30px;
            float: left;
            width: 30%;
            text-transform: capitalize;
            margin-bottom: 2px;
        }

        .company-address-container h1 {
            font-size: 15px;
            line-height: 22px;
            letter-spacing: 0.05em;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        .company-address {
            margin-top: 2px;
            text-align: left;
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            width: 280px;
            word-wrap: break-word;
        }

        .estimate-details-container {
            float: right;
            padding: 10px 30px 0 0;
        }

        .attribute-label {
            font-size: 12px;
            line-height: 18px;
            padding-right: 40px;
            text-align: left;
        }

        .attribute-value {
            font-size: 12px;
            line-height: 18px;
            text-align: right;
        }

        /* -- Customer Address -- */

        .customer-address-container {
            width: 45%;
            padding: 0px 0 0 0px;
        }

        /* -- Shipping -- */

        .shipping-address-container {
            float: right;
            padding-left: 40px;
            width: 160px;
        }

        .shipping-address-container--left {
            float: left;
            padding-left: 0px;
        }

        .shipping-address-label {
            font-size: 12px;
            line-height: 18px;
            padding: 0px;
            margin-top: 27px;
            margin-bottom: 0px;
        }

        .shipping-address-name {
            max-width: 160px;
            font-size: 15px;
            line-height: 22px;
            padding: 0px;
            margin: 0px;
        }

        .shipping-address {
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            padding-top: 45px;
            padding-left: 40px;
            margin: 0px;
            width: 160px;
            word-wrap: break-word;
        }

        /* -- Billing -- */

        .billing-address-container {
            padding-top: 50px;
            float: left;
            padding-left: 30px;
        }

        .billing-address-label {
            font-size: 12px;
            line-height: 18px;
            padding: 0px;
            margin-top: 27px;
            margin-bottom: 0px;
        }

        .billing-address-name {
            max-width: 160px;
            font-size: 15px;
            line-height: 22px;
            padding: 0px;
            margin: 0px;
        }

        .billing-address {
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            padding: 45px 0px 0px 30px;
            margin: 0px;
            width: 160px;
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

        /* -- Total Display Table -- */

        .total-display-container {
            padding: 0 25px;
        }

        .total-display-table {
            border-top: none;
            box-sizing: border-box;
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
            margin-left: 500px;
            margin-top: 20px;
        }

        .total-table-attribute-label {
            font-size: 12px;
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
                <td class="text-center">
                    @if(get_company_setting('avatar', $estimate->company->id)) 
                        <img class="header-logo" src="{{ $estimate->company->avatar }}" alt="{{ $estimate->company->name }}">
                    @else
                        <h2 class="header-logo">{{$estimate->company->name}}</h2>
                    @endif
                </td>
            </tr>
        </table>
        <hr class="header-bottom-divider" />
    </div>
    <div class="wrapper">
        <div class="company-details-container">
            <div class="company-address-container company-address">
                <h3>{{ __('messages.from') }}</h3>
                @if($estimate->company->name)
                    <p class="mb-0"><strong>{{ $estimate->company->name }}</strong></p>
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
            </div>
            <div class="estimate-details-container">
                <table class="estimate-details-table">
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

            @if($estimate->customer->shipping->address_1 != '')
                <div class="shipping-address-container shipping-address">
            @else
                <div class="shipping-address-container--left shipping-address" style="padding-left:30px;">
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

        <div style="position:relative">
            @include('pdf.estimate._table')
        </div>

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
</body>

</html>
