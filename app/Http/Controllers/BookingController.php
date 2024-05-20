<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function booking()
    {
        $bookings=Booking::with('package.event')->get();
         
        return view('backend.pages.booking.bookingDetails',compact('bookings'));
    }

    public function createBooking()
    {
        $events=Event::all();
        // $services=Service::all();
        return view('backend.pages.booking.createBooking',compact('events'));
    }

    public function bookingStore(Request $request)
    {

        $checkValidation = Validator::make($request->all(),
        [
            'user_name'=>'required',
            'event_id'=>'required',
            
            'number_of_guest'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'amount'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'location'=>'required',
             
        ]); 

        if($checkValidation->fails())
        {
            // notify()->error($checkValidation->getMessageBag());
            notify()->error("something went wrong");
            return redirect()->back();
        } 
        Booking::create
        ([
            'user_name'=>$request->user_name,
            'event_id'=>$request->event_id,
            'service_id'=>$request->service_id,
            'number_of_guest'=>$request->number_of_guest,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'amount'=>$request->amount,
            'start_date'=>$request->start_date, 
            'end_date'=>$request->end_date,
            'location'=>$request->location
        ]);

        notify()->success('Booking Created Successfully');

        return redirect()->route('admin.booking.details');
    }


}
