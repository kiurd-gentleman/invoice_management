<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterHead extends Model
{
    // Letter Head Statuses
    const STATUS_DRAFT = 'DRAFT';
    const STATUS_SENT = 'SENT';
    const STATUS_VIEWED = 'VIEWED';
    const STATUS_OVERDUE = 'OVERDUE';
    const STATUS_COMPLETED = 'COMPLETED';

    // Letter Head Statuses
    const STATUS_UNPAID = 'UNPAID';
    const STATUS_PARTIALLY_PAID = 'PARTIALLY_PAID';
    const STATUS_PAID = 'PAID';

    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }

    /**
     * Scope a query to only include Invoices of a given customer.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param int $customer_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindByCustomer($query, $customer_id)
    {
        $query->where('customer_id', $customer_id);
    }
    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        $active_stats = [
            self::STATUS_SENT,
            self::STATUS_VIEWED,
            self::STATUS_OVERDUE,
            self::STATUS_COMPLETED,
        ];
        $query->whereIn('status', $active_stats);
    }

    public static function getNextLetterHeadNumber($company_id, $prefix)
    {
        // Get the last created order
        $lastOrder = self::findByCompany($company_id)->where('letter_head_number', 'LIKE', $prefix . '-%')
            ->orderBy('created_at', 'desc')
            ->first();


        if (!$lastOrder) {
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.
            $number = 0;
        } else {
            $number = explode("-",$lastOrder->letter_head_number);
            $number = $number[1];
        }
        // If we have ORD000001 in the database then we only want the number
        // So the substr returns this 000001

        // Add the string in front and higher up the number.
        // the %06d part makes sure that there are always 6 numbers in the string.
        // so it adds the missing zero's when needed.

        return sprintf('%06d', intval($number) + 1);
    }
}
