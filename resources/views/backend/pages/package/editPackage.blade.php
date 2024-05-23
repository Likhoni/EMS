@extends('backend.master')
@section('content')

<h1>Edit Packages</h1>


<form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
@method('put')
@csrf
  <div class="form-group">
    <label for="">Package Name</label>
    <input required name="name" type="text" class="form-control" id="" value="{{$package->name}}" placeholder="Enter Package name">
  </div>

  <br>

  <div class="form-group">
    <label for=""> Event</label>
    <select class="form-control" name="event_id" id="">
    <option value ="{{$package->event->id}}">{{$package->event->name}}</option>
      @foreach ($events as $data)
     <option value ="{{$data->id}}">{{$data->name}}</option>
     @endforeach 
     </select>
  </div>

 <br>

  <div class="form-group">
    <label for="">Package Price</label>
    <input required name="price" type="number" class="form-control" id="" value="{{$package->price}}" placeholder="Enter Package Price">
</div>
  
 <br>
 <div class="form-group">
    <label for="">Guest</label>
    <input required name="guest" type="number" class="form-control" id="" value="{{$package->guest}}" placeholder="Number of Guest">
  </div>
  <br>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection