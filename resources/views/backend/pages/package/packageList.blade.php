@extends('backend.master')

@section('content')

<h1>Packages</h1>

<a href="{{route('admin.create.package')}}" class="btn btn-success">Create Package</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Event</th>
      <th scope="col">Price</th>
      <th scope="col">Guest</th>
      
      
      
      <th>Action</th>
    </tr>
  </thead> 
  <tbody>

@foreach($packages as $key => $data)
 
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->event->name}}</td>
      <td>{{$data->price}}</td>
      <td>{{$data->guest}}</td>
      
      <!-- <td><img style="width: 100px;height:100px" src="{{ url('images/events', $data->image) }}"
      alt="" srcset=""></td> -->
      <td> 
        <a class="btn btn-info" href="{{route('admin.package.edit',$data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('admin.package.delete',$data->id)}}">Delete</a>
      </td> 
    </tr>
  
    @endforeach 
  </tbody>
</table>
{{$packages->links()}}
@endsection    