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

        .text-center {
            text-align: center
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

        .header-bottom-divider {
            color: rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 90px;
            left: 0px;
            width: 100%;
        }

        .header-container {
            position: absolute;
            width: 100%;
            height: 90px;
            left: 0px;
            top: -50px;
        }

        .header-logo {
            height: 50px;
            margin-top: 20px;
            text-transform: capitalize;
            color: {{$letter_head->company->getSetting('invoice_color')}};
        }

        .header {
            font-size: 20px;
            color: rgba(0, 0, 0, 0.7);
        }

        .content-wrapper {
            display: block;
            margin-top: 0px;
            padding-top: 16px;
            padding-bottom: 20px;
        }

        .company-address-container {
            padding-top: 15px;
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

        .invoice-details-container {
            float: right;
            padding: 10px 30px 0 0;
        }

        .attribute-label {
            font-size: 12px;
            line-height: 18px;
            padding-right: 40px;
            text-align: left;
            color: #55547A;
        }

        .attribute-value {
            font-size: 12px;
            line-height: 18px;
            text-align: right;
        }

        /* -- Shipping -- */

        .shipping-address-container {
            float: right;
            padding-left: 40px;
            width: 160px;
        }
        .shipping-address {
            font-size: 12px;
            line-height: 15px;
            color: #595959;
            padding: 45px 0px 0px 40px;
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
            color: {{$letter_head->company->getSetting('invoice_color')}};
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
            font-size: 13px;
            color: #55547A;
            text-align: left;
            padding-left: 10px;
        }

        .total-table-attribute-value {
            font-weight: bold;
            text-align: right;
            font-size: 13px;
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
            color: {{$letter_head->company->getSetting('invoice_color')}};
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
        /*#header {*/
        /*    position: fixed;*/
        /*    width: 100%;*/
        /*    top: 0;*/
        /*    left: 0;*/
        /*    right: 0;*/
        /*}*/
        /*#footer {*/
        /*    position: fixed;*/
        /*    width: 100%;*/
        /*    bottom: 0;*/
        /*    left: 0;*/
        /*    right: 0;*/
        /*}*/
        body {
            font: 12pt Georgia, "Times New Roman", Times, serif;
            line-height: 1.3;}
        @page {
            /* switch to landscape */
            size: landscape;
            /* set page margins */
            margin: 0.5cm;
            /* Default footers */
            @bottom-left {
                content: "Department of Strategy";
            }
            @bottom-right {
                content: counter(page) " of " counter(pages);
            }
        }
    </style>
</head>

<body>
<header id="header">
    <div class="form-group required">
        <div class="w-100 h-100 p-1 bg-white">
            <small>Header Image</small>
            <div class="p-1 w-100 h-50  border rounded d-flex justify-content-center"  id="input_image"  style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884 ">
                <i class="ft-upload display-1" id="icon"></i>
                <img src="{{ isset($letter_head->header_image) ? public_path($letter_head->header_image) :  ''}}" id="show_header_image" class="p-1" style="display: none; height: 85px; width: 100%">
            </div>
            <input id="header_image" type="file" name="header_image" style="display: none!important;" />
        </div>
    </div>
</header>

<div class="header-container">
    <table width="100%">
{{--        <tr>--}}
{{--            <td class="text-center">--}}
{{--                @if(get_company_setting('avatar', $letter_head->company->id))--}}
{{--                    <img class="header-logo" src="{{ public_path($letter_head->company->avatar) }}" alt="{{ $letter_head->company->name }}">--}}
{{--                @else--}}
{{--                    <h2 class="header-logo">{{$letter_head->company->name}}</h2>--}}
{{--                @endif--}}
{{--            </td>--}}
{{--        </tr>--}}
    </table>

</div>
<div class="content-wrapper">
    <div style="position: relative; clear: both;padding: 30px">
        <hr class="header-bottom-divider" style="border: 0.620315px solid #E8E8E8;" />
        <div class="form-group required">
            {{--                <small ><a href="#">Preview</a></small>--}}
            {{--                <small><a href="JavaScript:void(0)" onclick="save()">save</a></small>--}}
            <div class="w-100 h-100 p-1 bg-white">
                {!! $letter_head->text !!}
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <div class="form-group required">
        <div class="w-100 h-100 p-1 bg-white">
            <small>Footer Image</small>
            <div class="p-1 h-50  border rounded d-flex justify-content-center"  id="footer_input_image" style="border: 2px solid !important; border-style: dashed !important ; color:#4e2884">
                <i class="ft-upload display-4" id="footer_icon"></i>
                <img src="{{ isset($letter_head->footer_image) ? public_path($letter_head->footer_image) :''}}" id="show_footer_image" class="p-1" style="display: none; height: 60px; width: 100%">
            </div>
        </div>
    </div>
</footer>
</body>

</html>
