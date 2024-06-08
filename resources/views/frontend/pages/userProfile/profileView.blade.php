@extends('frontend.master')
@section('content')
<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-4 align-self-center">
				<div class="image-block bg-about">
					<img class="img-fluid" style="width: 350px;height:350px" src="{{ url('images/customers', $profileData->image) }}" alt="">
				</div>
			</div>

			<div class="col-lg-6 align-self-center">
				<div class="content-block">
					<h2>About <span class="alternate">You</span></h2>
					<div class="description-one">
						<p>
						</p>
					</div>
					<div class="description-two">



						<div class="col-md-6">
							<label style="color: black;" for="Name">Name:{{ $profileData->name}}</label>
						</div>
						<div class="col-md-6">
							<label style="color: black;" for="Name">Email:{{ $profileData->email}}</label>
						</div>
						<div class="col-md-6">
							<label style="color: black;" for="Name">Phone:{{ $profileData->phone}}</label>
						</div>
						<div class="col-md-6">
							<label style="color: black;" for="Name">Address:{{ $profileData->address}}</label>
						</div>
					</div>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="{{route('edit.profile')}}" class="btn btn-main-md">Update Profile</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="col-lg-1"></div>


		</div>

	</div>

	<div style="padding: 50px;">
		<h5>Your Booking Details</h5>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Serial</th>
					<th scope="col">Transaction Id</th>
					<th scope="col">Event</th>
					<th scope="col">Package</th>
					<th scope="col">Venue</th>
					<th scope="col">Amount</th>
					<th scope="col">Date</th>
					<th scope="col">Start_time</th>
					<th scope="col">End_time</th>
					<th scope="col">Payment Status</th>
					<th scope="col">Action</th>

				</tr>
			</thead>
			<tbody>

				@foreach($bookingDetails as $key => $data)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$data->transaction_id}}</td>
					<td>{{$data->package->event->name}}</td>
					<td>{{$data->package->name}}</td>
					<td>{{$data->venue}}</td>
					<td>{{$data->total_amount}}</td>
					<td>{{$data->date}}</td>
					<td>{{$data->start_time}}</td>
					<td>{{$data->end_time}}</td>
					<td>
						@if($data->status == 'Cancelled')
						Booking Cancelled
						@elseif($data->status == 'Reject')
						Booking Rejected
						@else
						{{$data->payment_status}}
						@endif
					</td>
					<td>
						@if($data->status=='Pending')
						<a class="btn-sm btn-danger" href="{{route('cancel.booking', $data->id)}}">Cancel Booking</a>
						@elseif($data->status == 'Accept' && $data->payment_status != 'Paid' && $data->created_at->diffInDays(now()) <= 2) <a class="btn-sm btn-primary" href="{{route('make.payment',$data->id)}}">Make Payment</a>
						<a class="btn-sm btn-danger" href="{{route('cancel.booking', $data->id)}}">Cancel Booking</a>
							@elseif($data->payment_status == 'Paid')
							<a class="btn-sm btn-success" href="{{ route('download.receipt', $data->id) }}">Download Receipt</a>
							@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>



	<div style="padding: 50px;">
		<h5>Your Appointment Details</h5>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Date</th>
					<th scope="col">Time</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>

				@foreach($appointments as $data)

				<tr>
					<th scope="row">{{$data->id}}</th>
					<td>{{$data->date}}</td>
					<td>{{$data->time}}</td>
					<td>{{$data->status}}</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>


	<div style="padding: 50px;">
		<h5>Your Customize Booking Details</h5>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Serial</th>
					<th scope="col">Transaction Id</th>
					<th scope="col">Event</th>
					<th scope="col">Foods</th>
					<th scope="col">Decorations</th>
					<th scope="col">Venue</th>
					<th scope="col">Amount</th>
					<th scope="col">Date</th>
					<th scope="col">Start_time</th>
					<th scope="col">End_time</th>
					<th scope="col">Payment Status</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($customizeBookingDetails as $key => $booking)
				<tr>
					<th scope="row">{{ $key + 1 }}</th>
					<td>{{ $booking->transaction_id }}</td>
					<td>{{ $booking->event->name ?? 'N/A' }}</td>
					<td>
						@foreach($booking->foods as $food)
						{{ $food->name }},<br>
						@endforeach
					</td>
					<td>
						@foreach($booking->decorations as $decoration)
						{{ $decoration->name }},<br>
						@endforeach
					</td>
					<td>{{ $booking->venue}}</td>
					<td>{{ $booking->total_amount }}</td>
					<td>{{ $booking->date }}</td>
					<td>{{ $booking->start_time }}</td>
					<td>{{ $booking->end_time }}</td>
					<td>
						@if($booking->status == 'Cancelled')
						Booking Cancelled
						@elseif($booking->status == 'Reject')
						Booking Rejected
						@else
						{{$booking->payment_status}}
						@endif
					</td>
					<td>
						@if($booking->status=='Pending')
						<a class="btn-sm btn-danger" href="{{route('cancel.customize.booking', $booking->id)}}">Cancel Booking</a>
						@elseif($booking->status == 'Accept' && $booking->payment_status != 'Paid' && $booking->created_at->diffInDays(now()) <= 2) <a class="btn-sm btn-primary" href="{{route('customize.make.payment',$booking->id)}}">Make Payment</a>
						<a class="btn-sm btn-danger" href="{{route('cancel.customize.booking', $booking->id)}}">Cancel Booking</a>
							@elseif($booking->payment_status == 'Paid')
							<a class="btn-sm btn-success" href="{{ route('customize.download.receipt', $booking->id) }}">Download Receipt</a>
							@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</section>

@endsection