@extends('backend.master')

@section('content')

<h1>Events</h1>

<a href="{{route('admin.create.food')}}" class="btn btn-success">Create Event</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th>Action</th>
    </tr>
  </thead> 


@endsection    