@extends('frontend.master')
@section('content')

<section class="registration">
	<div class=""  >
		<div class="registration-block bg-registration-one" >
			<div class="block">
				<div class="row" style="margin-top:0px; margin-bottom:0px;"><div class="col-md-4"></div>
                    <div style="margin-top:80px;" style=" border-radius:15px;">
					<div class="col-md-4"></div>
                        <form action="{{route('appointment.details.store')}}" method="post">
                        @csrf
						<div class="col-md-6">
						  <h3 style="color: black;"><strong>Appointment For</strong> <span class="alternate"><strong>Eventre</strong> </span></h3>
                             <div class="form-group"> 
								<input required name="user_name" type="text" class="form-control" id="" placeholder="Enter Name">
                             </div>
							 <div class="form-group">
								<input required name="phone_number" type="tel" id="" class="form-control" placeholder="Enter Phone Number" >
                             </div>
                             <div class="form-group">
								<input required name="email" type="email" id="" class="form-control" placeholder="Enter Email" >
                             </div>
                             <div class="form-group">
								<input required name="date" type="date" id="" class="form-control" placeholder="Enter date">
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
@endsection