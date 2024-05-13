<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Event;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function servicelist()
    {
        $services=Service::with('event')->get(); 
        $services=Service::paginate(4);
        return view('backend.pages.services.serviceList',compact('services'));
    }
    public function createService() 
    {
        $events=Event::all();
        return view('backend.pages.services.createService',compact('events'));
    }
    
    public function serviceStore(Request $request)
    {
        
        $checkValidation = Validator::make($request->all(),
        [
             'service_name'=>'required',
             'description'=>'required',
             'service_image'=>'required',
        ]);

        if($checkValidation->fails())
        {
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        // dd($request->all());
        
        $service_image='';
        if($request->hasFile('service_image'))
        {
            $service_image=date('YmdHis').'.'.$request->file('service_image')->getClientOriginalExtension();
            $request->file('service_image')->storeAs('/services',$service_image);
        }
        //dd($request);
        Service::create
        ([
            'name'=>$request->service_name,
            'event_id'=>$request->event_id,
            'description'=>$request->description,
            'image'=>$service_image
        ]);

        notify()->success('Service created successfully.');

        return redirect()->route('admin.service.list');
    }

    public function serviceView($service_id)
    {
        $services=Service::find($service_id);
        return view('backend.pages.services.serviceView',compact('services'));
    }

    public function serviceEdit($service_id)
    {
        $services=Service::find($service_id);
        return view('backend.pages.services.serviceEditForm',compact('services'));
    }

    public function serviceUpdate(Request $request,$service_id)
    {
         $services=Service::find($service_id);

        $service_image='';
        if($request->hasFile('service_image'))
        {
            $service_image=date('YmdHis').'.'.$request->file('service_image')->getClientOriginalExtension();
            $request->file('service_image')->storeAs('/services',$service_image);
            File::delete('images/services/'. $services->image);
        }
        
        $services->update
        ([
            'name'=>$request->service_name,
            'event_id'=>$request->event_id,
            'description'=>$request->description,
            'image'=>$service_image
        ]);

        notify()->success('Service created successfully.');

        return redirect()->route('admin.service.list');
    }

    public function serviceDelete($service_id)
   {
       $services=Service::find($service_id);
       $services->delete();
       return redirect()->back();
   }


}
