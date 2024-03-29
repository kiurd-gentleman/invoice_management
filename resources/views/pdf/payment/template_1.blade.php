<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

        /* -- Heeader -- */

        .header-container {
            /* position: absolute; */
            width: 100%;
            padding: 0 30px;
            margin-bottom: 50px;
            /* height: 150px;
            left: 0px;
            top: -60px; */
        }

        /* .header-section-left {
            padding-top: 45px;
            padding-bottom: 45px;
            padding-left: 30px;
            display:inline-block;
            width:30%;
        } */

        .header-logo {
            /* position: absolute; */
            height: 50px;
            text-transform: capitalize;
            padding-top: 0px;
            color: {{$payment->company->getSetting('payment_color')}};
        }
        .company-address-container {
            width: 50%;
            text-transform: capitalize;
            padding-left: 80px;
            margin-bottom: 2px;
        }
        /* .header-section-right {
            display:inline-block;
            position: absolute;
            right:0;
            padding: 15px 30px 15px 0px;
            float: right;
        } */

        .header-section-right {
            text-align: right;
        }

        .header {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.7);
        }

        /* -- Company Address -- */

        .company-details h1 {
            margin:0;

            font-weight: bold;
            font-size: 15px;
            line-height: 22px;
            letter-spacing: 0.05em;
            text-align: left;
            max-width: 220px;
        }

        .company-address{
             /* margin-top: 12px; */
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            word-wrap: break-word;
        }

        .content-wrapper {
           display: block;
           height: 200px;
        }

        .main-content {
            display: inline-block;
            padding-top: 20px
        }

        /* -- Customer Address -- */
        .customer-address-container {
            display: block;
            float:left;
            width:40%;
            padding: 0 0 0 30px;
        }

        /* -- Shipping -- */

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
        }

        .shipping-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin: 0px;
            width: 160px;
        }

        /* -- Billing -- */

        .billing-address-container {
            display: block;
            float: left;
        }

        .billing-address-container--right {
            float: right;
        }

        .billing-address-label {
            padding-top: 5px;
            font-size: 12px;
            line-height: 18px;
            margin-bottom: 0px;
            color: #55547A;
        }

        .billing-address-name {
            padding: 0px;
            font-size: 15px;
            line-height: 22px;
            margin: 0px;
        }

        .billing-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin:0px;
            width: 180px;
            word-wrap: break-word;
        }

        /* -- Payment Details -- */

        .payment-details-container {
            display: inline;
            position: absolute;
            float: right;
            width: 40%;
            height: 120px;
            padding: 5px 30px 0 0;
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

        /* -- Notes -- */

        .notes {
            font-size: 12px;
            color: #595959;
            margin-top: 15px;
            margin-left: 30px;
            width: 442px;
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

        .content-heading {
            margin-top: 10px;
            width: 100%;
            text-align: center;
        }

        p {
            padding: 0 0 0 0;
            margin:  0 0 0 0;
        }

        .content-heading span {
            font-weight: normal;
            font-size: 14px;
            line-height: 25px;
            padding-bottom: 5px;
            border-bottom: 1px solid #B9C1D1;
        }

        /* -- Total Display Box -- */

        .total-display-box {
            width: 315px;
            display: block;
            margin-right: 30px;
            background: #F9FBFF;
            border: 1px solid #EAF1FB;
            box-sizing: border-box;
            float: right;
            padding: 12px 15px 15px 15px;
        }

        .total-display-label {
            display: inline;
            font-weight: bold;
            font-size: 14px;
            line-height: 21px;
            color: #595959;
        }

        .total-display-box span {
            float: right;
            font-weight: bold;
            font-size: 14px;
            line-height: 21px;
            text-align: right;
            color: {{$payment->company->getSetting('payment_color')}};
        }
    </style>
</head>
<body>
    <div class="header-container">
        <table width="100%">
            <tr>
                @if(get_company_setting('avatar', $payment->company->id))
                    <td width="50%" class="header-section-left">
                        <img class="header-logo" src="{{ public_path($payment->company->avatar) }}" alt="{{ $payment->company->name }}">
                @else
                    <td class="header-section-left" style="padding-top:0px;">
                        <h1 class="header-logo"> {{ $payment->company->name }}</h1>
                @endif
                </td>
                <td  width="50%" class="header-section-right company-details company-address">
                    <h3>{{ $payment->company->name }}</h3>
                    {{ $payment->company->billing->address_1 }}<br>
                    {{ $payment->company->billing->address_2 }}<br>
                    {{ $payment->company->billing->city ?? '' . $payment->company->billing->state ?? '' }}<br>
                    {{ $payment->company->billing->country->name ?? '' }}<br>
                    {{ $payment->company->billing->phone ?? '' }}<br>
                    {{ $payment->company->vat_number ? __('messages.vat_number') . ' ' . $payment->company->vat_number : '' }}
                </td>
            </tr>
        </table>
    </div>

    <hr style="border: 0.620315px solid #E8E8E8;">

    <p class="content-heading">
        <span>{{ __('messages.payment_receipt_upper_case') }}</span>
    </p>

    <div class="content-wrapper">
        <div class="main-content">
            <div class="customer-address-container">
                <div class="billing-address-container billing-address">
                    <h3>{{ __('messages.from') }}</h3>
                    {{ $payment->customer->display_name }}<br>
                    {{ $payment->customer->billing->address_1 }}<br>
                    {{ $payment->customer->billing->address_2 }}<br>
                    {{ $payment->customer->billing->city ?? '' . $payment->customer->billing->state ?? '' }}<br>
                    {{ $payment->customer->billing->country->name ?? '' }}<br>
                    {{ $payment->customer->billing->phone ?? '' }}<br>
                    {{ $payment->customer->vat_number ? __('messages.vat_number') . ' ' . $payment->customer->vat_number : '' }}
                </div>
                <div class="billing-address-container--right">
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="payment-details-container">
                <table width="100%">
                    <tr>
                        <td class="attribute-label">{{ __('messages.payment_date') }}</td>
                        <td class="attribute-value"> &nbsp;{{$payment->formatted_payment_date}}</td>
                    </tr>
                    <tr>
                        <td class="attribute-label">{{ __('messages.payment_#') }}</td>
                        <td class="attribute-value"> &nbsp;{{$payment->payment_number}}</td>
                    </tr>
                    <tr>
                        <td class="attribute-label">{{ __('messages.payment_mode') }}</td>
                        <td class="attribute-value"> &nbsp;{{$payment->payment_method ? $payment->payment_method->name : '-'}}</td>
                    </tr>
                    @if ($payment->invoice && $payment->invoice->invoice_number)
                        <tr>
                            <td class="attribute-label">{{ __('messages.invoice_#') }}</td>
                            <td class="attribute-value"> &nbsp;{{$payment->invoice->invoice_number}}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="total-display-box">
        <p class="total-display-label">{{ __('messages.amount') }}</p>
{{--        @dump($payment->amount)--}}
{{--        @dd(money($payment->amount, $payment->invoice->currency_code ,true)->format())--}}
        <span>{{ money($payment->amount, $payment->invoice->currency_code)->format() }}</span>
    </div>
</body>
</html>
