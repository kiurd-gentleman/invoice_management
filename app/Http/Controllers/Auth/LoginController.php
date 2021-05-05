<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            if (auth()->user()->hasRole('super_admin')) {
                return redirect()->to(route('customer_portal.dashboard'));
            }elseif(auth()->user()->hasRole('admin')){
                return redirect()->to(route('company-list', auth()->user()->uid));
            }
        }else{
            return redirect()->to(route('login'));
        }

//        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
//        $fieldType = $input;
//        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
//        {
//            return redirect()->route('dashboard');
//        }else{
//            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
//        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
