@extends('backend.master')

@section('content')

<h1>Appointment Details</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <!-- <th>Action</th> -->
    </tr>
  </thead>
  <tbody>
  @foreach($appointments as $data)
 
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->user_name}}</td>
      <td>{{$data->phone_number}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->date}}</td>
    </tr>
@endforeach    
  </tbody> 
</table>
{{$appointments->links()}}
@endsection