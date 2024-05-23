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
      <th scope="col">Time</th>
      <th scope="col">Status</th>
     
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
      <td>{{$data->time}}</td>
      <td>
        @if($data->status=='Pending')
        <a href="{{route('admin.accept.appointment', $data->id)}}" class="btn btn-success">Accept</a>
        <a href="{{route('admin.reject.appointment', $data->id)}}" class="btn btn-danger">Reject</a>
        @endif
      </td>
    </tr>
@endforeach    
  </tbody> 
</table>
{{$appointments->links()}}
@endsection