<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PDFReportController extends Controller
{
    /**
     * Get Customer Sales Report Pdf
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return pdf
     */
    public function customer_sales(Request $request)
    {
        $user = $request->user();
        $company = $user->currentCompany();

        // Fetch Customers with Invoices
        $from = Carbon::createFromFormat('Y-m-d', isset($request->from) ? $request->from : Carbon::now()->format('Y-m-d'));
        $to = Carbon::createFromFormat('Y-m-d', isset($request->to) ? $request->to : Carbon::now()->addMonth()->format('Y-m-d'));

        $customers = Customer::with(['invoices' => function ($query) use ($from, $to) {
            $query->whereBetween(
                'invoice_date',
                [$from->format('Y-m-d'), $to->format('Y-m-d')]
            );
        }])->get();

        // Total Amount
        $totalAmount = 0;
        foreach ($customers as $customer) {
            $customerTotalAmount = 0;
            foreach ($customer->invoices as $invoice) {
                $customerTotalAmount += $invoice->total;
            }
            $customer->totalAmount = $customerTotalAmount;
            $totalAmount += $customerTotalAmount;
        }
//        dd(money($customer->totalAmount, $customer->currency_code));

//        dd($totalAmount);
        foreach ($customers as $customer){
            foreach ($customer->invoices as $invoice){
                dump($invoice->total, $invoice->currency_code);
            }
        }

        dd(2);
        $pdf = PDF::loadView('pdf.reports.customer_sales', [
            'company' => $company,
            'from' => $from,
            'to' => $to,
            'customers' => $customers,
            'totalAmount' => $totalAmount,
        ]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download('CUSTOMER_SALES_REPORT.pdf');
        } else {
            return $pdf->stream('CUSTOMER_SALES_REPORT.pdf');
        }
    }

    /**
     * Get Product Sales Report Pdf
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return pdf
     */
    public function product_sales(Request $request)
    {
        $user = $request->user();
        $company = $user->currentCompany();

        // Fetch Customers with Invoices
        $from = Carbon::createFromFormat('Y-m-d', isset($request->from) ? $request->from : Carbon::now()->format('Y-m-d'));
        $to = Carbon::createFromFormat('Y-m-d', isset($request->to) ? $request->to : Carbon::now()->addMonth()->format('Y-m-d'));

        // Products
        $products = Product::with(['invoice_items' => function ($query) use ($from, $to) {
            $query->whereHas('invoice', function ($query) use ($from, $to) {
                $query->whereBetween(
                    'invoice_date',
                    [$from->format('Y-m-d'), $to->format('Y-m-d')]
                );
            });
        }])->get();

        // Total Amount
        $totalAmount = 0;
        foreach ($products as $product) {
            $product->totalAmount = collect($product->invoice_items)->sum('total');
            $totalAmount += $product->totalAmount;
        }

        $pdf = PDF::loadView('pdf.reports.product_sales', [
            'company' => $company,
            'from' => $from,
            'to' => $to,
            'products' => $products,
            'totalAmount' => $totalAmount,
        ]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download('PRODUCT_SALES_REPORT.pdf');
        } else {
            return $pdf->stream('PRODUCT_SALES_REPORT.pdf');
        }
    }

    /**
     * Get Profit & Loss Report Pdf
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return pdf
     */
    public function profit_loss(Request $request)
    {
        $user = $request->user();
        $company = $user->currentCompany();

        // Fetch Customers with Invoices
        $from = Carbon::createFromFormat('Y-m-d', isset($request->from) ? $request->from : Carbon::now()->format('Y-m-d'));
        $to = Carbon::createFromFormat('Y-m-d', isset($request->to) ? $request->to : Carbon::now()->addMonth()->format('Y-m-d'));

        // Invoices
        $invoices_total = Invoice::from($from)->to($to)->paid()->sum('total');

        // Expense Categories
        $expense_categories = ExpenseCategory::with(['expenses' => function ($query) use ($from, $to) {
            $query->whereBetween(
                'expense_date',
                [$from->format('Y-m-d'), $to->format('Y-m-d')]
            );
        }])->get();

        // Total Expenses
        $total_loss = 0;
        foreach ($expense_categories as $expense_category) {
            // Add Report Items
            $expense_category->total_expense = collect($expense_category->expenses)->sum('amount');
            $total_loss += $expense_category->total_expense;
        }

        $pdf = PDF::loadView('pdf.reports.profit_loss', [
            'company' => $company,
            'from' => $from,
            'to' => $to,
            'invoices_total' => $invoices_total,
            'expense_categories' => $expense_categories,
            'total_loss' => $total_loss,
        ]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download('PROFIT_LOSS_REPORT.pdf');
        } else {
            return $pdf->stream('PROFIT_LOSS_REPORT.pdf');
        }
    }

    /**
     * Get Profit & Expenses Pdf
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return pdf
     */
    public function expenses(Request $request)
    {
        $user = $request->user();
        $company = $user->currentCompany();

        // Fetch Customers with Invoices
        $from = Carbon::createFromFormat('Y-m-d', isset($request->from) ? $request->from : Carbon::now()->format('Y-m-d'));
        $to = Carbon::createFromFormat('Y-m-d', isset($request->to) ? $request->to : Carbon::now()->addMonth()->format('Y-m-d'));

        // Expense Categories
        $expense_categories = ExpenseCategory::with(['expenses' => function ($query) use ($from, $to) {
            $query->whereBetween(
                'expense_date',
                [$from->format('Y-m-d'), $to->format('Y-m-d')]
            );
        }])->get();

        // Total Expenses
        $total_loss = 0;
        foreach ($expense_categories as $expense_category) {
            // Add Report Items
            $expense_category->total_expense = collect($expense_category->expenses)->sum('amount');
            $total_loss += $expense_category->total_expense;
        }

        $pdf = PDF::loadView('pdf.reports.expenses', [
            'company' => $company,
            'from' => $from,
            'to' => $to,
            'expense_categories' => $expense_categories,
            'total_loss' => $total_loss,
        ]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download('EXPENSES_REPORT.pdf');
        } else {
            return $pdf->stream('EXPENSES_REPORT.pdf');
        }
    }
}
