<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Package;
use App\Models\Package_service;
use App\Models\Service;
use Illuminate\Http\Request;

class PackageServiceController extends Controller
{
    public function packageServiceCreate($id)
    {
        $events=Event::find($id);
        $packages=Package::where('event_id', $id)->get();
        $services=Service::where('event_id', $id)->get();
        return view('backend.pages.package_service.create',compact('packages','services','events'));
    }

    public function packageServiceEvent()
    {
        $events=Event::all();
        
        return view('backend.pages.package_service.events',compact('events'));

    }
    
    
    public function packageServiceList()
    {
        // $packages_event=Package::with('event')->get();
        $packages=Package_service::with('package')->get();
    //    dd($packages);
        return view('backend.pages.package_service.list',compact('packages'));
    }

    public function packageServiceStore(Request $request)
    {
       
        // dd($request->all());
        foreach ($request->service_id as $serviceId) {
            Package_service::create([
                'package_id' => $request->package_id,
                'event_name'=>$request->name,
                'service_id' => $serviceId,
            ]);
        }
        

        return redirect()->route('admin.package.service.list');
    }
}
