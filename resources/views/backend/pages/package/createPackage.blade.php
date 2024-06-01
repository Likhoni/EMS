@extends('backend.master')
@section('content')

<h1>Create Packages</h1>


<form action="{{route('admin.package.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="">Package Name</label>
    <input required name="name" type="text" class="form-control" id="" placeholder="Enter Package name">
  </div>

  <br>

  <div class="form-group">
    <label for=""> Event</label>
    <select class="form-control" name="event_id" id="">
    <option>select event</option>
      @foreach ($events as $data)
     <option value ="{{$data->id}}">{{$data->name}}</option>
     @endforeach 
     </select>
  </div>

 <br>

  <div class="form-group">
    <label for="">Package Price</label>
    <input required name="price" type="number" class="form-control" id="" placeholder="Enter Package Price">
</div>
<div class="form-group">
    <label for="">Discount Price</label>
    <input required name="discount_price" type="number" class="form-control" id="" placeholder="Enter Discount Price">
</div>
  
 <br>
 <div class="form-group">
    <label for="">Guest</label>
    <input required name="guest" type="number" class="form-control" id="" placeholder="Number of Guest">
  </div>
  <br>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection