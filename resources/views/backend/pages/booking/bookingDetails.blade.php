@extends('backend.master')

@section('content')

<h1>Booking Details</h1>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User</th>
      <th scope="col">Event</th>
      <th scope="col">Package</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Amount</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <!-- <th scope="col">Status</th>
      <th>Action</th> -->
    </tr>
  </thead>

  <tbody>
    @foreach($bookings as $data)

    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->user_name}}</td>
      <td>{{$data->package->event->name}}</td>
      <td>{{$data->package->name}}</td>
      <td>{{$data->phone_number}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->amount}} .BDT</td>
      <td>{{$data->start_time}}</td>
      <td>{{$data->end_time}}</td>

    </tr>
    @endforeach
  </tbody>
</table>


@endsection