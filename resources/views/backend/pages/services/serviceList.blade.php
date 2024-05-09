@extends('backend.master')

@section('content') 

<h1>Services</h1>

<a href="{{route('admin.create.service')}}" class="btn btn-success">Create Service</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Event</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($services as $data)
 
 <tr>
   <th scope="row">{{$data->id}}</th>
   <td>{{$data->name}}</td>
   <td>{{$data->event->name}}</td>
   <td>{{$data->description}}</td>
   <td><img style="width: 100px;height:100px" src="{{ url('images/services', $data->image) }}"
   alt="" srcset=""></td>
    <!-- <td>{{$data->image}}</td>                      -->
   <td>
     <a class="btn btn-info" href="">Edit</a>
     <a class="btn btn-success" href="">View</a>
     <a class="btn btn-danger" href="">Delete</a>
   </td>
 </tr>
@endforeach    
</tbody>
</table>
{{$services->links()}}
@endsection