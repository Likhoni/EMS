@extends('backend.master')

@section('content')

<h1>Package Services </h1>

<a href="{{route('admin.package.service.event')}}" class="btn btn-success">Select Event</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Event</th>
      <th scope="col">Package</th>
      <th scope="col">Service</th>


      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($packages as $data)

    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->event_name}}</td>
      <td>{{$data->package->name}}</td>
      <td>{{$data->service->name}}</td>


      <!-- <td><img style="width: 100px;height:100px" src="{{ url('images/events', $data->image) }}"
      alt="" srcset=""></td> -->
      <td>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection