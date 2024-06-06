@extends('backend.master')
<style>
  @media print {
    #print {
      display: none;
    }

    footer {
      display: none !important;
    }

    .sidebar {
      display: none !important;
    }

    .navbar {
      display: none !important;
    }

    .action {
      display: none !important;
    }
  }
</style>

@section('content')

<h1>Appointment Details</h1>
<button id="print" onclick="printlist()" class="btn btn-info">Print</button>
<br>
<form action="{{ route('admin.search.appointment') }}" method="get">
  <div class="input-group mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search by date..." name="search">
    <input type="date" id="startDateInput" class="form-control" placeholder="Start Date" name="start_date">
    <input type="date" id="endDateInput" class="form-control" placeholder="End Date" name="end_date">
    <div class="input-group-append">
      <button style="color: black;" class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </div>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Status</th>
      <th class="action">Action</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($appointments as $key => $data)
 
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$data->user_name}}</td>
      <td>{{$data->phone_number}}</td> 
      <td>{{$data->email}}</td>
      <td>{{$data->date}}</td>
      <td>{{$data->time}}</td>
      <td>{{$data->status}}</td>
      <td class="action">
        @if($data->status=='Pending')
        <a href="{{route('admin.accept.appointment', $data->id)}}" class="btn btn-success">Accept</a>
        <a href="{{route('admin.reject.appointment', $data->id)}}" class="btn btn-danger">Reject</a>
        @endif
      </td>
    </tr>
@endforeach    
  </tbody> 
</table>
{{$appointments->links()}}
<script>
  function printlist() {
    window.print();
  }
</script>
@endsection