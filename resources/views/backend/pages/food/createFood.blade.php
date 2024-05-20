@extends('backend.master')
@section('content')

<h1>Create Food Item</h1>


<form action="{{route('admin.food.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="">Food Name</label>
    <input required name="name" type="text" class="form-control" id="" placeholder="Enter Food name">
  </div>


  <br>
  <div class="form-group">
    <label for="">Description</label>
    <textarea name="description" id="" class="form-control" placeholder="Enter Description" ></textarea>
  </div>
  
 <br>
  <div class="form-group">
    <label for="">Upload Image</label>
    <input name="image" type="file" class="form-control" id="" placeholder="Upload Image">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection