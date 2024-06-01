<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Package;
use App\Models\Package_service;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function packageList()
    {
       
        $packages=Package::all();
        $packages = Package::paginate(4);
        return view('backend.pages.package.packageList',compact('packages'));
        
    }

    public function createPackage()
    {
        $events=Event::all();
        return view('backend.pages.package.createPackage',compact('events'));
    }

    public function packageStore(Request $request)
    {
        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'name' => 'required',
                'event_id' => 'required',
                'price' => 'required',
                'discount_price' => 'required',
                'guest' => 'required|integer|min:1', 
            ]
        );

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        Package::create
        ([
            'name'=>$request->name,
            'price'=>$request->price,
            'guest'=>$request->guest,
            'event_id'=>$request->event_id,
        ]);

        notify()->success('Package Created Successfully.');
        return redirect()->route('admin.package.list');
    }

    public function packageEdit($package_id)
    {
        $events= Event::all();
        $package = Package::find($package_id);
        return view('backend.pages.package.editpackage', compact('package','events'));
    }

    public function packageUpdate(Request $request, $id)
    {
        // $events=Event::find($id);
        $package = Package::find($id);

        $checkValidation = Validator::make
        (
            $request->all(),
            [
                'name' => 'required',
                'event_id' => 'required',
                'price' => 'required',
                'guest' => 'required',
            ]
        );
        // dd($request->all()); 

        if ($checkValidation->fails()) {
            notify()->error("Something Went Wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $package->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'guest'=>$request->guest,
            'event_id'=>$request->event_id,

            ]);

        notify()->success('Package Updated Successfully.');

        return redirect()->route('admin.package.list');
    }

    public function packageDelete($id)
    {
        $package = Package::find($id);
        $package->delete();
        notify()->success('Package Deleted Successfully.');
        return redirect()->back();
    }


}
