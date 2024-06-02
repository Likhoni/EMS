@extends('backend.master')
<style>
  @media print {
    #print, .search-form {
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

    .table-responsive {
      overflow: visible !important;
    }

    .table {
      width: 100%;
      table-layout: fixed;
      font-size: smaller; /* Smaller font size for printing */
    }

    th, td {
      white-space: nowrap; /* Ensure no cell content breaks into new lines */
    }
  }

  /* Ensure table doesn't overflow */
  .table-responsive {
    overflow-x: auto;
  }

  .table {
    width: 100%;
    table-layout: auto;
  }
</style>

@section('content')

<h1>Booking Details</h1>
<button id="print" onclick="printlist()" class="btn btn-info">Print</button>
<br>
<br>

<form action="{{route('admin.search.booking')}}" method="get" class="search-form">
  <div class="input-group mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search..." name="search">
    <div class="input-group-append">
      <button style="color: black;" class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Event</th>
        <th>Package</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Venue</th>
        <th>Guest</th>
        <th>Transaction Id</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Payment Status</th>
        <th class="action">Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach($bookings as $key => $data)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->package->event->name}}</td>
        <td>{{$data->package->name}}</td>
        <td>{{$data->phone_number}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->venue}}</td>
        <td>{{$data->guest}}</td>
        <td>{{$data->transaction_id}}</td>
        <td>{{$data->date}}</td>
        <td>{{$data->start_time}}</td>
        <td>{{$data->end_time}}</td>
        <td>{{$data->total_amount}}</td>
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
</div>

{{$bookings->links()}}

<script>
  function printlist() {
    window.print();
  }
</script>

@endsection
