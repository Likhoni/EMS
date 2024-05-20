<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebProfileController extends Controller
{
    public function viewProfile()
    { 
        $bookingDetails=Booking::with('package.event')->where('customer_id', auth('customerGuard')->user()->id)->get();
        // dd($bookingDetails);
        $profileData=Customer::find(auth('customerGuard')->user()->id); 
        return view('frontend.pages.userProfile.profileView',compact('profileData','bookingDetails'));
    }

    public function editProfile()
    { 
        $profileData=Customer::find(auth('customerGuard')->user()->id); 
        return view('frontend.pages.userProfile.profileEdit',compact('profileData'));
    }

    public function updateProfile(Request $request)
    { 
        $profileData=Customer::find(auth('customerGuard')->user()->id); 

        $customer_image=''; 
        
        if($request->hasFile('image'))
        {
            
            $customer_image=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
           
             $request->file('image')->storeAs('/customers',$customer_image);
             File::delete('images/customers/'. $profileData->image);
     
        }
  
        $profileData->update([
            'name'=>$request->name,  
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$customer_image,

        ]);
        
        return redirect()->route('view.profile');
    }

    public function deleteProfile()
    {
        $profileData=Customer::find(auth('customerGuard')->user()->id);
        $profileData->delete();
        return redirect()->back();
    }
}
 