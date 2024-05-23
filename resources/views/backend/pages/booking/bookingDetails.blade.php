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

<h1>Booking Details</h1>
<button id="print" onclick="printlist()" class="btn btn-info">Print</button>
<br>
<br>


<form action="{{route('admin.search')}}" method="get">
  <div class="input-group mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search..." name="search">
    <div class="input-group-append">
      <button style="color: black;" class="btn btn-outline-secondary" type="button">Search</button>
    </div>
  </div>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User</th>
      <th scope="col">Event</th>
      <th scope="col">Package</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Amount</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Status</th>
      <th scope="col">Payment Status</th>
      <th class="action">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($bookings as $data)

    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->package->event->name}}</td>
      <td>{{$data->package->name}}</td>
      <td>{{$data->phone_number}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->amount}} .BDT</td>
      <td>{{$data->start_time}}</td>
      <td>{{$data->end_time}}</td>
      <td>{{$data->status}}</td>
      <td>{{$data->payment_status}}</td>
      <td class="action">
        @if($data->status=='Pending')
        <a href="{{route('admin.accept.booking', $data->id)}}" class="btn btn-success">Accept</a>
        <a href="{{route('admin.reject.booking', $data->id)}}" class="btn btn-danger">Reject</a>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
{{$bookings->links()}}

<script>
  function printlist() {
    window.print();
  }
</script>

@endsection