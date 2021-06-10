<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Estimate;
use App\Models\LetterHead;
use App\Models\Payment;
use Illuminate\Support\Facades\Crypt;
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

    public function letter_head(Request $request)
    {
//        dump($request->letter_head);
        $letter_head = LetterHead::findByUid($request->letter_head);
//        dump($letter_head);

        $template = $letter_head->company->getSetting('letter_head_template');
//        dd($template);
//        return view('pdf.invoice.template_1' ,compact('invoice'));
        $pdf = PDF::loadView('pdf.letter_head.'.$template, ['letter_head' => $letter_head]);


        //Render or Download
//        $pdf =0;
        if($request->has('download')) {
            return $pdf->download($letter_head->letter_head_number . '-letter_head.pdf');
        } else {
            return $pdf->stream('letter_head.pdf');
        }
    }


    public function invoice(Request $request)
    {
//        dd($request->invoice);
        $invoice = Invoice::findByUid($request->invoice);
//        dd($invoice);

        $template = $invoice->company->getSetting('invoice_template');
//        return view('pdf.invoice.template_1' ,compact('invoice'));
        $pdf = PDF::loadView('pdf.invoice.'.$template, ['invoice' => $invoice]);

        //Render or Download
//        $pdf =0;
        if($request->has('download')) {
            return $pdf->download($invoice->invoice_number . '-invoice.pdf');
        } else {
            return $pdf->stream('invoice.pdf');
        }
    }
    public function invoice_view(Request $request)
    {
//        dd($request->invoice);
        $decrypt= Crypt::decryptString($request->invoice);
//        dd($decrypt);
        $invoice = Invoice::find($decrypt);
//        dd($invoice);

        $template = $invoice->company->getSetting('invoice_template');
//        return view('pdf.invoice.template_1' ,compact('invoice'));
        $pdf = PDF::loadView('pdf.invoice.'.$template, ['invoice' => $invoice]);

        //Render or Download
//        $pdf =0;
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
