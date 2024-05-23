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
            'date'=>'required',
            'time'=>'required'


        ]);

        if($checkValidation->fails())
        {
            notify()->error("Something Went Wrong");
            return redirect()->back();
        }
        Appointment::create
        ([
            'user_name'=>$request->user_name,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'date'=>$request->date,
            'time'=>$request->time
        ]);
        notify()->success("Appointment Created Successfully");

        return redirect()->route('view.profile');
    }

    public function accept($id)
    {
        $appointments = Appointment::find($id);
        $appointments->update(['status'=>'Accept']);

        notify()->success("Appointment Accepted.");
        return redirect()->back();
    }

    public function reject($id)
    {
        $appointments = Appointment::find($id);
        $appointments->update(['status'=>'Reject']);

        notify()->error("Appointment rejected.");
        return redirect()->back();
    }

    public function cancelBooking($id) {
        $appointments =  Appointment::find($id);
        // dd($id);
        $appointments->update([
        'status'=>'Cancelled'
      ]);

      notify()->success('Appointment cancel successfully.');
      return redirect()->back();  
    }
}
 