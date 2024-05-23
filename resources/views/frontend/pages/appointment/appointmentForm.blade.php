@extends('frontend.master')
@section('content')

<section class="registration">
	<div class="">
		<div class="registration-block bg-registration-one">
			<div class="block">
				<div class="row" style="margin-top:0px; margin-bottom:0px;">
					<div class="col-md-4"></div>
					<div style="margin-top:80px;" style=" border-radius:15px;">
						<div class="col-md-4"></div>
						<form action="{{route('appointment.details.store')}}" method="post">
							@csrf
							<div class="col-md-6">
								<h3 style="color: black;"><strong>Appointment For</strong> <span class="alternate"><strong>Eventre</strong> </span></h3>
								<div class="form-group">
									<input required name="user_name" type="text" class="form-control" id="" value="{{auth('customerGuard')->user()->name}}" placeholder="Enter Name">
								</div>
								<div class="form-group">
									<input required name="phone_number" type="tel" id="" value="{{auth('customerGuard')->user()->phone}}" class="form-control" placeholder="Enter Phone Number">
								</div>
								<div class="form-group">
									<input required name="email" type="email" id="" class="form-control" value="{{auth('customerGuard')->user()->email}}" placeholder="Enter Email">
								</div>
								<div class="form-group">
									<input required name="date" type="date" id="datePicker" class="form-control" placeholder="Enter date">
								</div>
								<div class="form-group">
									<input required name="time" type="time" id="" class="form-control" placeholder="Enter time">
								</div>
								<button type="submit" class="btn btn-white-md">Get Appointment</button>
							</div>
						</form>
						<div class="col-md-4 "></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
        // Get today's date
        const today = new Date();
        // Add one day to today's date to get tomorrow's date
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1);
        // Format tomorrow's date in YYYY-MM-DD format
        const minDate = tomorrow.toISOString().split('T')[0];
        // Set the min attribute to tomorrow's date
        document.getElementById('datePicker').setAttribute('min', minDate);
    </script>
@endsection