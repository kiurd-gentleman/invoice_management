<?php

namespace App\Http\Middleware;

use Closure;

class SubscriptionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        // Redirect user if there is no subscription or ended or cancelled
        $subscription = $user->subscription('main');
//        dump($subscription);
        $route = $request->route()->getName();
//        dump($route);
//        dd($subscription->active());
        // If there is no subscription at all
        if (substr($route, 0, 6) !== 'order.' && !$subscription) {
            return redirect()->route('order.plans');
        }


        // If there is a subscription but not an active subscription
        if (substr($route, 0, 6) !== 'order.' && !$subscription->active()) {
            return redirect()->route('order.plans');
        }
        return $next($request);
    }
}
