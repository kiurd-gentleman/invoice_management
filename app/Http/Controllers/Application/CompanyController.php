<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

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
}
