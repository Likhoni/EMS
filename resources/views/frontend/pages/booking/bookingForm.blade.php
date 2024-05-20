@extends('frontend.master')
@section('content')
<div>
	<section class="registration">
		<div class="">
			<div class="registration-block bg-registration-one overlay-dark">
				<div class="block">
					<div class="row" style="margin-top: 0px; margin-bottom:10px;">
						<div class="col-md-3"> </div>
						<div style="margin-top:0px;" class="col-md-6" style=" border-radius:15px;">


							<form action="{{route('booking.store')}}" method="post" class="row">
								@csrf
								<div class="col-md-3">
								</div>
								<div class="col-md-6">

									<div class="title text-left">
										<h3 style="color: white;"><strong>Booking Form</strong> <span class="alternate"><strong></strong> </span></h3>
									</div>
									<input type="hidden" name="package_id" value="{{ $package->id }}">
									<label style="color:white ;"><strong>Name</strong></label><input name="name" type="text" value="{{auth('customerGuard')->user()->name}}" class="form-control main" placeholder="Enter Your name" required>
									<label style="color:white ;"><strong>Email</strong></label><input name="email" type="email" value="{{auth('customerGuard')->user()->email}}" class="form-control main" placeholder="Enter Your Email" required>
									<label style="color:white ;"><strong>Phone Number</strong></label><input name="phone" value="{{auth('customerGuard')->user()->phone}}" type="tel" class="form-control main" placeholder="Enter Your Number" required>
									<label></label><strong style="color:white ;">Start Time</strong><input name="start_time" type="time" class="form-control main" placeholder="" required>
									<label></label><strong style="color:white ;">End Time</strong><input name="end_time" type="time" class="form-control main" placeholder="" required>
									<button type="submit" class="btn btn-white-md">Booked</button>
								</div>

								<div class="col-md-3">
								</div>
							</form>
						</div>
						<div class="col-md-3">
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
@endsection