<!DOCTYPE html>
<html lang="en">
<head>
    <title>Expenses Report</title>
    <style type="text/css">
        body {
            font-family: "DejaVu Sans";
        }

        table {
            border-collapse: collapse;
        }

        .sub-container{
            padding: 0px 20px;
        }

        .report-header {
            width: 100%;
        }

        .heading-text {
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            word-wrap: break-word;
            text-align: left;
            padding: 0px;
            margin: 0px;
            color: {{$company->getSetting('invoice_color')}};
        }

        .heading-date-range {
            font-weight: normal;
            font-size: 14px;
            color: #A5ACC1;
            width: 180px;
            text-align: right;
            float: right;
            padding: 0px;
            margin: 0px;
        }

        .sub-heading-text {
            font-weight: bold;
            font-size: 16px;
            line-height: 21px;
            color: #595959;
            padding: 0px;
            margin: 0px;
            margin-top: 30px;
        }

        .expenses-title {
            margin-top: 60px;
            padding-left: 3px;
            font-size: 16px;
            line-height: 21px;
            color: #040405;
        }

        .expenses-table-container {
            padding-left: 10px;
        }

        .expenses-table {
            width: 100%;
            padding-bottom: 10px;
        }

        .expense-title {
            padding: 0px;
            margin: 0px;
            font-size: 14px;
            line-height: 21px;
            color: #595959;
        }

        .expense-amount {
            padding: 0px;
            margin: 0px;
            font-size: 14px;
            line-height: 21px;
            text-align: right;
            color: #595959;
        }

        .expense-total-table {
            border-top: 1px solid #EAF1FB;
            width: 100%;
        }

        .expense-total-cell {
            padding-right: 20px;
            padding-top: 10px;
        }

        .expense-total {
            padding-top: 10px;
            padding-right: 30px;
            padding: 0px;
            margin: 0px;
            text-align: right;
            font-weight: bold;
            font-size: 16px;
            line-height: 21px;
            text-align: right;
            color: #040405;
        }

        .report-footer {
            width: 100%;
            margin-top: 40px;
            padding: 15px 20px;
            background: #F9FBFF;
            box-sizing: border-box;
        }

        .report-footer-label {
            padding: 0px;
            margin: 0px;
            text-align: left;
            font-weight: bold;
            font-size: 16px;
            line-height: 21px;
            color: #595959;
        }

        .report-footer-value {
            padding: 0px;
            margin: 0px;
            text-align: right;
            font-weight: bold;
            font-size: 20px;
            line-height: 21px;
            color: {{$company->getSetting('invoice_color')}};
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="sub-container">
        <table class="report-header">
            <tr>
                <td>
                    <p class="heading-text">{{ $company->name }}</p>
                </td>
                <td>
                    <p class="heading-date-range">{{ $from->format('Y-m-d') }} - {{ $to->format('Y-m-d') }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p class="sub-heading-text text-center">{{ __('messages.expense_report') }}</p>
                </td>
            </tr>
        </table>
        <p class="expenses-title">{{ __('messages.expenses') }}</p>
        <div class="expenses-table-container">
            <table class="expenses-table">
                @foreach ($expense_categories as $expense_category)
                    <tr>
                        <td>
                            <p class="expense-title">
                                {{ $expense_category->name }}
                            </p>
                        </td>
                        <td>
                            <p class="expense-amount">
                                {{ money($expense_category->total_expense) }}
                            </p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <table class="report-footer">
        <tr>
            <td>
                <p class="report-footer-label">{{ __('messages.total_expense') }}</p>
            </td>
            <td>
                <p class="report-footer-value">{{ money($total_loss, $company->currency->code)->format() }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
