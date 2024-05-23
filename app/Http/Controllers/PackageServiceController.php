<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Package;
use App\Models\Package_service;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageServiceController extends Controller
{
    public function packageServiceList()
    {
        // $packages_event=Package::with('event')->get();
        $packages=Package_service::with('package')->get();
        $packages=Package_service::paginate(4);
        //    dd($packages);
        return view('backend.pages.package_service.list',compact('packages'));
    }
    
    public function packageServiceEvent()
    {
        $events=Event::all();
        
        return view('backend.pages.package_service.events',compact('events'));
        
    }
    
    public function packageServiceCreate($id)
    {
        $events=Event::find($id);
        $packages=Package::where('event_id', $id)->get();
        $services=Service::where('event_id', $id)->get();
        return view('backend.pages.package_service.create',compact('packages','services','events'));
    }
    public function packageServiceStore(Request $request)
    {
        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'name' => 'required',
                'package_id' => 'required',
                'service_id' => 'required',
                
            ]
        );

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
       
        // dd($request->all());
        foreach ($request->service_id as $serviceId) {
            Package_service::create([
                'package_id' => $request->package_id,
                'event_name'=>$request->name,
                'service_id' => $serviceId,
            ]);
        }
        
        notify()->success('Package Service Created Successfully.');
        return redirect()->route('admin.package.service.list');
    }

    public function packageServiceDelete($id)
    {
        $package = Package_service::find($id);
        $package->delete();
        notify()->success('Package Service Deleted Successfully.');
        return redirect()->back();
    }
}
