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

    @foreach($packages as $key => $data)

    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->event_name}}</td>
      <td>{{$data->package->name}}</td>
      <td>{{$data->service->name}}</td>


      <!-- <td><img style="width: 100px;height:100px" src="{{ url('images/events', $data->image) }}"
      alt="" srcset=""></td> -->
      <td>
         <a class="btn btn-danger" href="{{route('admin.package.service.delete',$data->id)}}">Delete</a>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
{{$packages->links()}}
@endsection