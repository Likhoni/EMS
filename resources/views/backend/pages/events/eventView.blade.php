@extends('backend.master')
@section('content')

<h1>Details</h1>

<p>ID: {{ $events->id}}</p>
<p>Event Name: {{ $events->name}}</p>
<p>Description: {{ $events->description}}</p>
<p>Image:</p> <img style="width: 100px;height:100px" src="{{url('/images/events' ,$events->image)}}" alt="">



@endsection