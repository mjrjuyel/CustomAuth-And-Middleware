<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class CusLoginController extends Controller
{
    public function login(){
        return view('website.login');
    }

    public function loginInsert(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        $credential = $request->only('email','password');
        if(Auth::guard('customer')->attempt($credential)){
            return redirect('web');
        }
        return redirect('customer/login');
    }
}
