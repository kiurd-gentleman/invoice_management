<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Http\Request;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '*/razorpay/callback',
        '*/razorpay',
    ];
}
