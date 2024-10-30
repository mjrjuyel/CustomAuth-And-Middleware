<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Carbon\Carbon;
use Auth;

class CusRegisterController extends Controller
{
    public function register(){
        return view('website.register');
    }

    public function registerInsert(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required | unique:customers,email',
            'pass'=>'required | min:6',
        ]);

        $insert = Customer::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['pass']),
            'created_at'=>Carbon::now(),
        ]);
        Auth::guard('customer')->login($insert);

        return redirect('web');
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect('customer/login');
    }
}

