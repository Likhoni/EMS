@extends('backend.master')

@section('content')

<h1>Decorations</h1>

<a href="{{route('admin.create.decoration')}}" class="btn btn-success">Create Decoration</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Event</th>
      <th scope="col">Price</th>
      <th>Action</th>
    </tr>
  </thead> 
  <tbody>

@foreach($decorations as $key => $data)
 
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->event->name}}</td>
      <td>BDT.{{$data->price}}</td>
     
      <td> 
        <a class="btn btn-info" href="{{route('admin.decoration.edit' , $data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('admin.decoration.delete' , $data->id)}}">Delete</a>
      </td> 
    </tr>
@endforeach    
  </tbody>
</table>
{{$decorations->links()}}
@endsection    