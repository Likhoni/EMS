<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Event;

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
        
        $fileName='';
        if($request->hasFile('service_image'))
        {
            $fileName=date('YmdHis').'.'.$request->file('service_image')->getClientOriginalExtension();
            $request->file('service_image')->storeAs('/services',$fileName);
        }
        //dd($request);
        Service::create
        ([
            'name'=>$request->service_name,
            'event_id'=>$request->event_id,
            'description'=>$request->description,
            'image'=>$fileName 
        ]);

        notify()->success('Service created successfully.');

        return redirect()->route('admin.service.list');
    }
}
