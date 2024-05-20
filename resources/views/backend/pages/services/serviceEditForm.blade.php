@extends('backend.master')
@section('content')

<h1>Edit Service</h1>
<form action="{{route('admin.service.update',$services->id)}}" method="post" enctype="multipart/form-data">
@method('put')
@csrf
<div class="form-group">
    <label for="">Service Name</label>
    <input name="service_name" type="text" value="{{$services->name}}" class="form-control" id="" placeholder="Enter service name">
  </div>

  <br>
 
  <div class="form-group">
    <label for="">Service Event</label>
    <select class="form-control" name="event_id" id="">
    <option>{{$services->event->name}}</option>
      @foreach ($events as $data)
     <option value ="{{$data->id}}">{{$data->name}}</option>
     @endforeach 
     </select>
  </div>

 <br>



  <div class="form-group">
    <label for="">Upload Image</label>
    <img style="width: 100px;height:100px" src="{{url('images/services',$services->image)}}" alt="">
    <input name="service_image" type="file" class="form-control" id="" placeholder="Upload service Image">
  </div>

  <br>

  <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection