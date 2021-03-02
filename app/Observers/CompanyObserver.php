<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\ExpenseCategory;
use App\Models\PaymentMethod;
use App\Models\ProductUnit;
use App\Models\TaxType;

class CompanyObserver
{
    /**
     * Handle the company "created" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function created(Company $company)
    {
        // Create Product Unit and Store in Database
        ProductUnit::create([
            'name' => 'Inch',
            'company_id' => $company->id,
        ]);

        // Create Payment Method and Store in Database
        PaymentMethod::create([
            'name' => 'Stripe',
            'company_id' => $company->id,
        ]);
        PaymentMethod::create([
            'name' => 'Razorpay',
            'company_id' => $company->id,
        ]);
        PaymentMethod::create([
            'name' => 'Paypal',
            'company_id' => $company->id,
        ]);
 
        // Create Expense Category and Store in Database
        ExpenseCategory::create([
            'name' => 'Other',
            'company_id' => $company->id,
            'description' => '',
        ]);

        // Create Tax Type and Store in Database
        TaxType::create([
            'name' => 'Example Tax',
            'company_id' => $company->id,
            'percent' => 8,
            'description' => '',
        ]);
    }

    /**
     * Handle the company "deleted" event.
     *
     * @param  \App\Models\Company  $company
     * @return void
     */
    public function deleting(Company $company)
    {
        // Delete Settings
        if ($company->settings()) {
            $company->settings()->delete();
        }

        // Delete Subscriptions
        if ($company->subscriptions()) {
            $company->subscriptions()->delete();
        }

        // Delete Tax Types
        if ($company->tax_types()) {
            // Delete All Taxes  
            foreach ($company->tax_types()->get() as $tax_type) {
                $tax_type->taxes()->delete();
            }
            $company->tax_types()->delete();
        }

        // Delete Expenses
        if ($company->expenses()) {
            $company->expenses()->delete();
        }

        // Delete Expense Categories
        if ($company->expense_categories()) {
            $company->expense_categories()->delete();
        }

        // Delete Vendors
        if ($company->vendors()) {
            $company->vendors()->delete();
        }

        // Delete Estimates
        if ($company->estimates()) {
            if ($company->estimate_items()) {
                $company->estimate_items()->delete();
            }
            $company->estimates()->delete();
        }

        // Delete Payments
        if ($company->payments()) {
            $company->payments()->delete();
        }

        // Delete Payment Methods
        if ($company->payment_methods()) {
            $company->payment_methods()->delete();
        }

        // Delete Invoices
        if ($company->invoices()) {
            if ($company->invoice_items()) {
                $company->invoice_items()->delete();
            }
            $company->invoices()->delete();
        }

        // Delete Customers
        if ($company->customers()) {
            $company->customers()->delete();
        }

        // Delete Products
        if ($company->products()) {
            $company->products()->delete();
        }

        // Delete Product Units
        if ($company->product_units()) {
            $company->product_units()->delete();
        }

        // Delete Custom Field Values
        if ($company->custom_field_values()) {
            $company->custom_field_values()->delete();
        }
        
        // Delete Custom Fields
        if ($company->custom_fields()) {
            $company->custom_fields()->delete();
        }
        
        // Delete team members
        if ($company->users()) {
            foreach ($company->users()->get() as $user) {
                $user->settings()->delete();
            }
            $company->users()->delete();
        }
    }
}
