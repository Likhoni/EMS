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
      
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($services as $key => $data)
 
 <tr>
   <th scope="row">{{$key+1}}</th>
   <td>{{$data->name}}</td>
   <td>{{$data->event->name}}</td>
   <!-- <td><img style="width: 100px;height:100px" src="{{ url('images/services', $data->image) }}"
   alt="" srcset=""></td> -->
    
   <td>
     <a class="btn btn-info" href="{{route('admin.service.edit',$data->id)}}">Edit</a>
     <a class="btn btn-danger" href="{{route('admin.service.delete',$data->id)}}">Delete</a>
   </td>
 </tr>
@endforeach    
</tbody>
</table>
{{$services->links()}}
@endsection
