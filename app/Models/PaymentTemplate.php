<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'view',
        'name'
    ];

    /**
     * Get path attribute
     * 
     * @return string
     */
    public function getPathAttribute($value)
    {
        return url($value);
    }
}
