<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Customer;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
     public function registration()
     {
        return view('frontend.pages.registration');
     }

     public function doRegistration(Request $request)
     {
        
        Customer::create([
            
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password)

        ]); 
       
        return redirect()->route('home.page');
     }

     public function login()
     {
        return view('frontend.pages.login');
     }
     public function doLogin(Request $request)
     { 
      $customerInput=['email'=>$request->email,'password'=>$request->password];
      $checklogin=auth()->guard('customerGuard')->attempt($customerInput);
      if($checklogin)
      {
         notify()->success('Login successful.');
         return redirect()->route('home.page');
      }

         notify()->success('Invalid Credentials.');
         return redirect()->back();
    
    }

    public function logout()
    {
      auth('customerGuard')->logout();
      // Auth::logout();
      notify()->success('Logout Successful');
      return redirect()->route('home.page');
    }
     
}
