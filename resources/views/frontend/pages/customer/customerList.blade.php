@extends('backend.master')

@section('content')

<h1>Customers</h1>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Image</th>
     
      <th>Action</th>
    </tr>
  </thead> 
  <tbody>

@foreach($customerDetails as $data)
 
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->phone}}</td>
      <td>{{$data->address}}</td>
      <td><img style="width: 100px;height:100px" src="{{ url('images/customers', $data->image) }}"
      alt="" srcset=""></td>
      <td> 
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td> 
    </tr>
@endforeach    
  </tbody>
</table>
{{$customerDetails->links()}}

@endsection    