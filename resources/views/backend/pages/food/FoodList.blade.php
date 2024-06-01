@extends('backend.master')

@section('content')

<h1>Foods</h1>

<a href="{{route('admin.create.food')}}" class="btn btn-success">Create Food</a>

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

@foreach($foods as $key => $data)
 
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->event->name}}</td>
      <td>BDT.{{$data->price}} /-per person</td>
     
      <td> 
        <a class="btn btn-info" href="{{route('admin.food.edit' , $data->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('admin.food.delete' , $data->id)}}">Delete</a>
      </td> 
    </tr>
@endforeach    
  </tbody>
</table>
{{$foods->links()}}
@endsection    