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
            color: black;
        }
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

        /* -- Content Wrapper  */

        .content-wrapper {
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
            float:right;
            display: block;
        }

        .shipping-address-container--left {
            float:left;
            display: block;
            padding-left: 0;
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

        .billing-address {
            font-size: 10px;
            line-height: 15px;
            color: #595959;
            margin-top: 5px;
            width: 160px;
            word-wrap: break-word;
        }

        /*  -- invoice Details -- */

        .invoice-details-container {
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
            color: #55547A;
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
            color: red;
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
    <div class="col-md-12">
        <div class="form-group required">
            <div class="w-100 h-100 p-1 bg-white">
                <small>Header Image</small>
                <div class="p-1 w-100 h-50  border rounded d-flex justify-content-center"  id="input_image"  {{--style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884 "--}}>
                    <i class="ft-upload display-1" id="icon"></i>
                    <img src="{{ isset($letter_head->header_image) ? $letter_head->header_image :  ''}}" id="show_header_image" class="p-1" style="display: none; height: 85px; width: 100%">
                </div>
{{--                <input id="header_image" type="file" name="header_image" style="display: none!important;" />--}}
            </div>
        </div>
    </div>
</div>

<hr class="header-bottom-divider">

<div class="content-wrapper">
    <div class="main-content">
        <div class="customer-address-container">
            <div class="billing-address-container billing-address">
                <h3>{{ __('messages.to') }}</h3>
            </div>
            <div style="clear: both;"></div>
        </div>

        <h1>This is me</h1>
        {!!  isset($letter_head->text)? $letter_head->text:'' !!}

        <div class="notes">
            <h2>Imtiaz Ur Rahmna Khan</h2>
        </div>
    </div>
</div>
<footer>
    <div class="col-md-12">
        <div class="form-group required">
            <div class="w-100 h-100 p-1 bg-white">
                <small>Footer Image</small>
                <div class="p-1 h-50  border rounded d-flex justify-content-center"  id="footer_input_image" {{--style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884"--}}>
                    <i class="ft-upload display-4" id="footer_icon"></i>
                    <img src="{{ isset($letter_head->footer_image) ? $letter_head->footer_image :''}}" id="show_footer_image" class="p-1" style="display: none; height: 60px; width: 100%">
                </div>
{{--                <input id="footer_image" type="file" name="footer_image" style="display: none!important;" />--}}
            </div>
        </div>
    </div>
</footer>
</body>

</html>
