<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
     public function registration()
     {
        return view('frontend.pages.registration');
     }

     public function doRegistration(Request $request)
     {

   
      $customer_image='';
        
      if($request->hasFile('image'))
     
      {
         
          $customer_image=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();         
           $request->file('image')->storeAs('/customers',$customer_image);
           

      }
        
        Customer::create([
            
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'image'=>$customer_image,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password)

        ]);
        return redirect()->route('login');
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

    public function customerList()
    
    {
      $customerDetails=Customer::paginate(4);
      return view('backend.pages.customer.customerList',compact('customerDetails'));

    }

    public function deleteCustomer()
    
    {
      $customer=Customer::find(auth('customerGuard')->user()->id);
      $customer->delete();
      return redirect()->back();
    }
    
}
