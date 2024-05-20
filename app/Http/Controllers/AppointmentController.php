<?php

namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function appointmentDetails()
    {
        $appointments=Appointment::paginate(4);
        return view('backend.pages.appointment.appointmentDetails',compact('appointments'));
    }

    public function createAppointment()
    {
        return view('frontend.pages.appointment.appointmentForm');
    }

    public function appointmentDetailsStore(Request $request)
    {
        $checkValidation = Validator::make($request->all(),
        [
            'user_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'date'=>'required'

        ]);

        if($checkValidation->fails())
        {
            notify()->error("something went wrong");
            return redirect()->back();
        }
        Appointment::create
        ([
            'user_name'=>$request->user_name,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'date'=>$request->date
        ]);
        notify()->success("Appointment Created Successfully");

        return redirect()->route('home.page');
    }
}
 