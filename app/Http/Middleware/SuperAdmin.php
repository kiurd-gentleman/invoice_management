<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

//        dd($user->hasRole('super_admin'));

        // Check if the user is super_admin
        if ($user->hasRole('super_admin')) {
//            dd($user);
            $currentCompany = $user->currentCompany();
//            dd($currentCompany);
            // Company based preferences
            share([
                'company_currency' => $currentCompany->currency,
            ]);

            // Share Current Company with All Blade Views
            view()->share('currentCompany', $currentCompany);
            view()->share('authUser', $user);
            return $next($request);
//            return redirect()->route('super_admin.dashboard');
        }else{
            return redirect()->to(route('login'));
        }



    }
}
