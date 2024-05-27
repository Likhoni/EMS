<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function bookinglist()
    {
        $bookings = Booking::with('package.event')->get();
        $bookings=Booking::paginate(4);

        return view('backend.pages.booking.bookingDetails', compact('bookings'));
    }

    public function accept($id)
    {
        $bookings = Booking::find($id);
        $bookings->update(['status'=>'Accept']);

        notify()->success("Booking Accepted.");
        return redirect()->back();
    }

    public function reject($id)
    {
        $bookings = Booking::find($id);
        $bookings->update(['status'=>'Reject']);

        notify()->error("Booking rejected.");
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchResult = collect(); // Initialize an empty collection
    
        if ($request->search) {
            // Search in the Booking table by name
            $bookings = Booking::where('date', 'LIKE', '%' . $request->search . '%')->get();
            $searchResult = $searchResult->merge($bookings);
    
            // Search in the Event table by event_name
            // $events = Event::where('name', 'LIKE', '%' . $request->search . '%')->with('packages.bookings')->get();
    
            // foreach ($events as $event) {
            //     foreach ($event->packages as $package) {
            //         $searchResult = $searchResult->merge($package->bookings);
            //     }
            // }
        }
    
        return view('backend.pages.booking.search', compact('searchResult'));
    }
    
}
