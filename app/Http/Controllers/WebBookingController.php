<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use App\Models\Package;
use App\Models\Package_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class WebBookingController extends Controller
{


    public function bookingForm($id)
    {
        $package = Package::findOrFail($id);
        return view('frontend.pages.booking.bookingForm', compact('package'));
    }

    public function bookingStore(Request $request)
    {
        // dd($request->all());
        $package = Package::with('event')->findOrFail($request->package_id);
        // dd($package);
        $checkValidation = Validator::make(
                $request->all(),
                [
                    'name' => ' required',
                    'phone' => 'required',
                    'email' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',       // |size:10000'
                ]
            );

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        // dd($package);

        Booking::create([
            'name' => $request->name,
            'customer_id' => auth('customerGuard')->user()->id,
            'package_id' => request()->package_id,
            'phone_number' => $request->phone,
            'email' => $request->email,
            'transaction_id'=>date('YmdHis'),
            'amount' => $package->price,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'payment_status'=>'pending'
        ]);

        notify()->success('Booked Package Successfully.');
        return redirect()->route('view.profile');
    }

    public function cancelBooking($id)
    {
        $booking = Booking::find($id);
        // dd($id);
        $booking->update([
            'status' => 'Cancelled'
        ]);

        notify()->success('Booking cancel successfully.');
        return redirect()->back();
    }
}
