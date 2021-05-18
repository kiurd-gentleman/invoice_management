<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        $companies = Company::where('owner_id',$user->id)->get();
//        dd($companies);
        return view('application.company.index',compact('companies'));
    }
    public  function create(Request $request){
        $user = $request->user();
        $companies = Company::where('owner_id',$user->id)->get();
//        dd($companies);
        return view('application.company.create',compact('companies'));
    }
    public function store($user_uid , Request $request){
        $user = $request->user();
        $company = Company::create([
            'name' => $request->name,
            'owner_id' => auth()->user()->id,
        ]);
        $user->attachCompany($company);
        return redirect()->route('company-list', ['user_uid' => auth()->user()->uid]);
    }
    public function inToCompany($user_uid , $company_uid){
        $companies = Company::where('uid',$company_uid)->first();
        Session::put('user_current_company', $companies->toArray());
//        dump( session('user_current_company'));
        $company_info = Session::get('user_current_company');
//        dd($company_info);
//        exit();
        return redirect()->to(route('dashboard', ['company_uid' => Session::get('user_current_company')['uid']]));
    }
}
