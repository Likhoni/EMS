<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function eventList()
    {
        $events=Event::paginate(4);
        // dd($events);
        return view('backend.pages.events.eventList',compact('events'));
    }

    public function createEvent()
    {
        return view('backend.pages.events.createEvent');
    }

    public function eventStore(Request $request)
    {
        // $checkValidation=$request->except('_token');
        // dd($request->all());
        
        $checkValidation = Validator::make($request->all(),
        [
            'event_name'=>'required',
            // 'description'=>'required|min:6',
            'description'=>'required',
            'event_image'=>'image'       // |size:10000'

        ]);

        if($checkValidation->fails())
        {
            notify()->error("something went wrong.");
            // notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $event_image='';
        
        if($request->hasFile('image'))
        {
            
            $event_image=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
           
             $request->file('image')->storeAs('/events',$event_image);
             

        }

        Event::create
        ([
            'name'=>$request->event_name,
            'description'=>$request->description,
            'image'=>$event_image
        ]);

        notify()->success('Event created successfully.');

        return redirect()->route('admin.event.list');
    }


   public function eventView($event_id)
   {
    $events=Event::find($event_id); 
    return view('backend.pages.events.eventView',compact('events'));
    // $events->view('backend.pages.events.eventView',compact('events'));
   }

   public function eventEdit(Request $request ,$event_id)
   {
      $events=Event::find($event_id);
      return view('backend.pages.events.eventEditForm',compact('events'));
    
   }
 

   public function  eventUpdate(Request $request ,$event_id)
   {
    $events=Event::find($event_id);
    
    $event_image='';
        
    if($request->hasFile('image'))
    {
        
        $event_image=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
       
         $request->file('image')->storeAs('/events',$event_image);
         File::delete('images/events/'. $events->image);
 
    }

      

      $events->update
      ([
        'name'=>$request->event_name,
        'description'=>$request->description,
        'image'=>$event_image,

      ]);
      notify()->success('Event Updated Successfully.');

      return redirect()->route('admin.event.list');

   } 
   
   public function eventDelete($event_id)
   {
       $events=Event::find($event_id);
       $events->delete();
       return redirect()->back();
   }
    
}
