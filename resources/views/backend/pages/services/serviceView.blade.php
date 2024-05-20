@extends('backend.master')
@section('content')

<h1>Details</h1>


<p>Event Name: {{$services->name}}</p>
<p>Event Name: {{$services->event->name}}</p>

<p>Image:</p> <img style="width: 100px;height:100px" src="{{url('/images/services' ,$services->image)}}" alt="">



@endsection