@extends('backend.master')
@section('content')

<h1>Create Appointment</h1>


<form action="{{route('admin.appointment.details.store')}}" method="post">
@csrf
  <div class="form-group"> 
    <label for="">User Name</label>
    <input required name="user_name" type="text" class="form-control" id="" placeholder="Enter Name">
  </div>

  <br>

 <div class="form-group">
    <label for="">Phone Number</label>
    <input required name="phone_number" type="number" id="" class="form-control" placeholder="Enter Phone Number" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Email</label>
    <input required name="email" type="email" id="" class="form-control" placeholder="Enter Email" >
  </div>
  
 <br>

 <div class="form-group">
    <label for="">Date</label>
    <input required name="date" type="date" id="" class="form-control" placeholder="Enter date">
  </div>
  
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection