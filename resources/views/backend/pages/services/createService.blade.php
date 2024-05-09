@extends('backend.master')
@section('content')

<h1>Create Service</h1>
<form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="">Service Name</label>
    <input name="service_name" type="text" class="form-control" id="" placeholder="Enter service name">
  </div>

  <br>

  <div class="form-group">
    <label for="">Service Event</label>
    <select class="form-control" name="event_id" id="">
    <option>select event</option>
      @foreach ($events as $data)
     <option value ="{{$data->id}}">{{$data->name}}</option>
     @endforeach 
     </select>
  </div>

 <br>

  <div class="form-group">
    <label for="">Description</label>
    <textarea name="description" id="" class="form-control" placeholder="Enter Description" ></textarea>
  </div>

 <br>

  <div class="form-group">
    <label for="">Upload Image</label>
    <input name="service_image" type="file" class="form-control" id="" placeholder="Upload service Image">
  </div>

  <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection