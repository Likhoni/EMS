@extends('frontend.master')
@section('content')
<section class="section about">
	<div class="container">
		<div class="row">
		 <div class="col-lg-1"></div>
			<div class="col-lg-4 align-self-center">
				<div class="image-block bg-about">
					<img class="img-fluid" style="width: 350px;height:350px"  src="{{ url('images/customers', $profileData->image) }}" alt="">
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
	<table class="table" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Event</th>
      <th scope="col">Package</th>
      <th scope="col">Amount</th>
      <th scope="col">Start_time</th>
      <th scope="col">End_time</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

  @foreach($bookingDetails as $data)
  <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->package->event->name}}</td>
      <td>{{$data->package->name}}</td>
      <td>{{$data->package->price}}</td>
      <td>{{$data->start_time}}</td>
      <td>{{$data->end_time}}</td>
	  <td>
		<button class="btn-sm btn-primary">Make Payment</button>
		<button class="btn-sm btn-danger">Cancel Booking</button>
	  </td>
    </tr>
	@endforeach
  </tbody>
	</table>
	</div>
	
</section>

@endsection
