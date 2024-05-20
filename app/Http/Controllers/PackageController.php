<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Package;
use App\Models\Package_service;
use App\Models\Service;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function packageList()
    {
       
        $packages=Package::all();
        return view('backend.pages.package.packageList',compact('packages'));
        
    }

    public function createPackage()
    {
        $events=Event::all();
        return view('backend.pages.package.createPackage',compact('events'));
    }

    public function packageStore(Request $request)
    {
        Package::create
        ([
            'name'=>$request->name,
            'price'=>$request->price,
            'guest'=>$request->guest,
            
            'event_id'=>$request->event_id,
            
            
        ]);

        return redirect()->route('admin.package.list');
    }

}
