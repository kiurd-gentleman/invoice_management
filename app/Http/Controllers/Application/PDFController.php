<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Estimate;
use App\Models\Payment;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Get Invoice Pdf
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return pdf
     */
    public function invoice(Request $request)
    {
        $invoice = Invoice::findByUid($request->invoice);

        $template = $invoice->company->getSetting('invoice_template');
        $pdf = PDF::loadView('pdf.invoice.'.$template, ['invoice' => $invoice]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download($invoice->invoice_number . '-invoice.pdf');
        } else {
            return $pdf->stream('invoice.pdf');
        }
    }

    /**
     * Get Estimate Pdf
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return pdf
     */
    public function estimate(Request $request)
    {
        $estimate = Estimate::findByUid($request->estimate);

        $template = $estimate->company->getSetting('estimate_template');
        $pdf = PDF::loadView('pdf.estimate.'.$template, ['estimate' => $estimate]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download($estimate->estimate_number . '-estimate.pdf');
        } else {
            return $pdf->stream('estimate.pdf');
        }
    }

    /**
     * Get Payment Pdf
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return pdf
     */
    public function payment(Request $request)
    {
        $payment = Payment::findByUid($request->payment);

        $template = $payment->company->getSetting('payment_template');
        $pdf = PDF::loadView('pdf.payment.'.$template, ['payment' => $payment]);

        //Render or Download
        if($request->has('download')) {
            return $pdf->download($payment->payment_number . '-payment.pdf');
        } else {
            return $pdf->stream('payment.pdf');
        }
    }
}
