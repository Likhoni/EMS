@extends('backend.master')

@section('content')

<h1>Events</h1>

<a href="{{route('admin.create.event')}}" class="btn btn-success">Create Event</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Description</th> -->
      <th scope="col">Image</th>
      <th>Action</th>
    </tr>
  </thead> 
  <tbody>

@foreach($events as $data)
 
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <!-- <td>{{$data->description}}</td> -->
      <td><img style="width: 100px;height:100px" src="{{ url('images/events', $data->image) }}"
      alt="" srcset=""></td>
      <td> 
        <a class="btn btn-info" href="{{route('admin.event.edit' , $data->id)}}">Edit</a>
        <a class="btn btn-success" href="{{route('admin.event.view' , $data->id)}}">View</a>
        <a class="btn btn-danger" href="{{route('admin.event.delete' , $data->id)}}">Delete</a>
      </td> 
    </tr>
@endforeach    
  </tbody>
</table>
{{$events->links()}}

@endsection    