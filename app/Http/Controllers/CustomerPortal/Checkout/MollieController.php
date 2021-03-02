<?php

namespace App\Http\Controllers\CustomerPortal\Checkout;

use App\Mails\PaymentFailedToCustomer;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Services\Gateways\Mollie;
use Illuminate\Support\Facades\Mail;

class MollieController extends BaseGatewayController

{
    /**
     * Create the Payment Request
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function payment(Request $request)
    {
        $invoice = Invoice::findByUid($request->invoice);
 
        // Get Mollie Service
        $mollie = new Mollie($invoice->company);
 
        // Make the Payment Request
        $response = $mollie->purchase([
            'amount' => $mollie->formatAmount($invoice->due_amount),
            'transactionId' => $invoice->uid,
            'currency' => $invoice->currency_code,
            'description' => $invoice->invoice_number,
            'notifyUrl' => $mollie->getNotifyUrl($invoice),
            'returnUrl' => $mollie->getReturnUrl($invoice),
        ]);

        // Process response
        if ($response->isSuccessful()) {
            // Create and Save Payment to Database
            $payment = $this->savePayment($invoice, 'Mollie', $response->getTransactionReference());
            
            session()->flash('alert-success', __('messages.payment_successful', ['payment_number' => $payment->payment_number]));
            return redirect()->route('customer_portal.invoices.details', [
                'customer' => $request->customer, 
                'invoice' => $request->invoice
            ]);
        } elseif ($response->isRedirect()) {
            // Redirect to offsite payment gateway
            $response->redirect();
        }
 
        // Something else happend, go back to invoice details
        session()->flash('alert-danger', $response->getMessage());
        return redirect()->route('customer_portal.invoices.details', [
            'customer' => $request->customer, 
            'invoice' => $request->invoice
        ]);
    }

    /**
     * Webhook for the Mollie Payment Request
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function webhook(Request $request)
    {
        $invoice = Invoice::findByUid($request->invoice);
        $paymentId = $request->id;

        // Get Mollie Service
        $mollie = new Mollie($invoice->company);

        // Fetch mollie transaction
        $params = [
            'transactionReference' => $paymentId,
        ];
        $response = $mollie->fetchTransaction($params);
        
        if ($response->isPaid()) {
            // Create and Save Payment to Database
            $this->savePayment($invoice, 'Mollie', $paymentId);
        } elseif ($response->isCancelled() || $response->isExpired()) {
            // Send Mail to Customer
            $subject = 'Payment failed for the invoice {invoice.number}';
            $content = 'Payment failed for the invoice {invoice.number}. Please try again at {invoice.link}';
            try {
                Mail::to($invoice->customer->email)->send(new PaymentFailedToCustomer($invoice, $subject, $content));
            } catch (\Throwable $th) {
                // 
            }
        }

        return 'ok';
    }

    /**
     * Complete the Payment Request
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function completed(Request $request)
    {
        $invoice = Invoice::findByUid($request->invoice);

        // Return
        session()->flash('alert-info', __('messages.mollie_processing'));
        return redirect()->route('customer_portal.invoices.details', [
            'customer' => $request->customer, 
            'invoice' => $request->invoice
        ]);
    }
}