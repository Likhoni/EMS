@extends('backend.master')

@section('content')

<h1>Booking Details</h1>
<a href="{{route('create.booking')}}" class="btn btn-success">Create Booking</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User</th>
      <th scope="col">Event</th>
      
      <th scope="col">Number of Guest</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Amount</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Location</th>
      <!-- <th scope="col">Status</th>
      <th>Action</th> -->
    </tr> 
  </thead> 

  <tbody>
  @foreach($bookings as $data)
 
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->user_name}}</td>
      <td>{{$data->event->name}}</td>
    
      <td>{{$data->phone_number}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->amount}} .BDT</td>
      <td>{{$data->start_date}}</td>
      <td>{{$data->end_date}}</td>
      <td>{{$data->location}}</td>
    </tr>
@endforeach    
  </tbody>
</table>
</table> 

@endsection