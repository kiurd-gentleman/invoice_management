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
            position: absolute;
            width: 100%;
            height: 141px;
            left: 0px;
            top: -60px;
            background: {{$estimate->company->getSetting('estimate_color')}};
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

        /* -- Estimate Details -- */

        .estimate-details-container {
            text-align: center;
            width: 40%;
        }

        .estimate-details-container h1 {
            margin: 0;
            font-size: 24px;
            line-height: 36px;
            text-align: right;
            font-family: "DejaVu Sans";
        }

        .estimate-details-container h4 {
            margin: 0;
            font-size: 10px;
            line-height: 15px;
            text-align: right;
        }

        .estimate-details-container h3 {
            margin-bottom: 1px;
            margin-top: 0;
        }

        /* -- Address -- */

        .wrapper {
            display: block;
            margin-top: 60px;
            padding-bottom: 20px;
        }

        .address-container {
            display: block;
            padding-top: 20px;
            margin-top: 10px;
        }

        /* -- Company Address -- */

        .company-address-container {
            padding: 0 0 0 30px;
            display: inline;
            float: left;
            width: 30%;
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
        }

        .company-address {
            margin-top: 2px;
            text-align: left;
            word-wrap: break-word;
            font-size: 12px;
            line-height: 15px;
            color: #595959;
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
            max-width: 160px;
            font-size: 15px;
            line-height: 22px;
            padding: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .billing-address {
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
            max-width: 160px;
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
            padding: 0px 30px 0px 20px;
            margin: 0px;
            width: 170px;
            word-wrap: break-word;
        }

        .attribute-label {
            font-size: 12;
            font-weight: bold;
            line-height: 22px;
            color: rgba(0, 0, 0, 0.8);
        }

        .attribute-value {
            font-size: 12;
            line-height: 22px;
            color: rgba(0, 0, 0, 0.7);
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
        }

        .item-table-heading-row td {
            padding: 5px;
            padding-bottom: 10px;
        }

        .item-table-heading-row {
            border-bottom: 1px solid red;
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
            color: #040405;
            text-align: center;
            padding: 5px;
            padding-top: 10px;
        }

        .item-description {
            color: #595959;
            font-size: 9px;
            line-height: 12px;
            page-break-inside: avoid;
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
                @if(get_company_setting('avatar', $estimate->company->id))
                <td width="60%" class="header-section-left">
                    <img class="header-logo" src="{{ $estimate->company->avatar }}" alt="{{ $estimate->company->name }}">
                    @else
                <td width="60%" class="header-section-left" style="padding-top: 0px;">
                    <h1 class="header-logo"> {{$estimate->company->name}} </h1>
                    @endif
                </td>
                <td width="40%" class="header-section-right estimate-details-container">
                    <h1>{{ __('messages.estimate') }}</h1>
                    <h4>{{$estimate->estimate_number}}</h4>
                    <h4>{{ __('messages.estimate_date') }}: {{$estimate->formatted_estimate_date}}</h4>
                    <h4>{{ __('messages.expiry_date') }}: {{$estimate->formatted_expiry_date}}</h4>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div class="wrapper">
        <div class="address-container">
            <div class="company-address-container company-address">
                <h2>{{ __('messages.from') }}</h2>
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

            <div class="shipping-address-container shipping-address">
                <h2>{{ __('messages.to') }}</h2>
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
                <div class="billing-address-container billing-address" style="float:right; margin-right:30px;">
                    <h2>{{ __('messages.ship_to') }}</h2>
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
                </div>
            @endif

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
</body>

</html>
