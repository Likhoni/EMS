@extends('backend.master')
@section('content')

<h1>Create Service</h1>
<form action="{{route('admin.package.service.store')}}" method="post" enctype="multipart/form-data">
@csrf


<label style="color:Black ;">Event Name</label>
<input name="name" type="text" value="{{$events->name}}" class="form-control main" placeholder="Event Name" required>

 <br>

  <div class="form-group">
    <label for="">Package </label>
    <select class="form-control" name="package_id" id="">
    <option>select package</option>
      @foreach ($packages as $data)
     <option value ="{{$data->id}}">{{$data->name}}</option>
     @endforeach 
     </select>
  </div>

 <br>

 <label for="">Services</label>
   @foreach($services as $data)
     <div class="form-check">
        <input class="form-check-input" type="checkbox" name="service_id[]" value="{{ $data->id }}">
           <label class="form-check-label" for="service">
              {{ $data->name }} </label></label>
            </div>
           @endforeach
                    
<br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection