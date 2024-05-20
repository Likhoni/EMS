<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Package;
use App\Models\Package_service;
use Illuminate\Http\Request;

class WebBookingController extends Controller
{


    public function bookingForm($id)
    {
        $package = Package::findOrFail($id);
        return view('frontend.pages.booking.bookingForm', compact('package'));
    }

    public function bookingStore(Request $request)
    {
        $package = Package::with('event')->findOrFail($request->package_id);
        
        // dd($package);

        Booking::create([
            'name'=> $request->name,
            'customer_id'=> auth('customerGuard')->user()->id,
            'package_id' => request()->package_id,
            'phone_number' => $request->phone,
            'email' => $request->email,
            'amount' => $package->price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);


        return redirect()->route('view.profile');
    }
}
