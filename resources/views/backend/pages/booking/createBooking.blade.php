@extends('backend.master')
@section('content')

<h1>Create Booking</h1>


<form action="{{route('admin.booking.details.store')}}" method="post">
@csrf
  <div class="form-group">
    <label for="">User Name</label>
    <input required name="user_name" type="text" class="form-control" id="" placeholder="Enter User name">
  </div>

  <br>

  <div class="form-group">
    <label for="">Event</label>
    <select class="form-control" name="event_id">
      <option>select event</option>
      @foreach($events as $data)
      <option value="{{$data->id}}">{{$data->name}}</option>
      @endforeach
    </select>
    </div>

    <br>



  

  <br>
  <div class="form-group">
    <label for="">Number Of Guest</label>
    <input required name="number_of_guest" type="number" id="" class="form-control" placeholder="Enter Number Of Guest">
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Phone Number</label>
    <input required name="phone_number" type="tel" id="" class="form-control" placeholder="Enter Phone Number" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Email</label>
    <input required name="email" type="email" id="" class="form-control" placeholder="Enter email" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Amount</label>
    <input required name="amount" type="number" id="" class="form-control" placeholder="Enter Amount" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Start Date</label>
    <input required name="start_date" type="date" id="" class="form-control" placeholder="" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">End_Date</label>
    <input required name="end_date" type="date" id="" class="form-control" placeholder="" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Location</label>
    <input required name="location" type="string" id="" class="form-control" placeholder="Enter loction">
  </div>
  
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection