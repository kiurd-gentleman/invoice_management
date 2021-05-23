<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use App\Models\Order;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display Membership Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $currentCompany = $user->currentCompany();

        $subscription = $user->subscription('main');
        $orders = Order::where('company_id', $user->id)->latest()->get();
        $dateFormat = CompanySetting::getSetting('date_format', $user->id);

        return view('application.company.membership.index', [
            'subscription' => $subscription,
            'orders' => $orders,
            'dateFormat' => $dateFormat,
        ]);
    }
}
