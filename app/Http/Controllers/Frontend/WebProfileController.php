<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Customer;
use Illuminate\Http\Request;

class WebProfileController extends Controller
{
    public function viewProfile($id)
    { 
        $profileData=Customer::find($id); 
        return view('frontend.pages.view.profileView',compact('profileData'));
    }
}
 