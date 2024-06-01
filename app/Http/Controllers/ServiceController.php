<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use App\Models\Package;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function servicelist()
    {
        $services = Service::with('event')->get();
        $services = Service::paginate(4);
        return view('backend.pages.services.serviceList', compact('services'));
    }
    public function createService()
    {
        
        $events = Event::all();
        return view('backend.pages.services.createService', compact('events'));
    }

    public function serviceStore(Request $request)
    {

        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'service_name' => 'required',
                'event_id' => 'required',
            ]
        );

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        // dd($request->all());

        $service_image = '';
        if ($request->hasFile('service_image')) {
            $service_image = date('YmdHis') . '.' . $request->file('service_image')->getClientOriginalExtension();
            $request->file('service_image')->storeAs('/services', $service_image);
        }
        //dd($request);
        Service::create([
                'name' => $request->service_name,
                'event_id' => $request->event_id,
            ]);

        notify()->success('Service Created Successfully.');

        return redirect()->route('admin.service.list');
    }

    public function serviceEdit($service_id)
    {
        $events= Event::all();
        $services = Service::find($service_id);
        return view('backend.pages.services.serviceEditForm', compact('services','events'));
    }

    public function serviceUpdate(Request $request, $id)
    {
        // $events=Event::find($id);
        $services = Service::find($id);

        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'service_name' => 'required',
                'event_id' => 'required',
            ]
        );
        // dd($request->all()); 

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $service_image = '';
        if ($request->hasFile('service_image')) {
            $service_image = date('YmdHis') . '.' . $request->file('service_image')->getClientOriginalExtension();
            $request->file('service_image')->storeAs('/services', $service_image);
            File::delete('images/services/' . $services->image);
        }

        $services->update([
                'name' => $request->service_name,
                'event_id' => $request->event_id,
            ]);

        notify()->success('Service Updated Successfully.');

        return redirect()->route('admin.service.list');
    }

    public function serviceDelete($service_id)
    {
        $services = Service::find($service_id);
        $services->delete();
        notify()->success('Service Deleted Successfully.');
        return redirect()->back();
    }
}
