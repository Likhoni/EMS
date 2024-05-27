@extends('frontend.master')
@section('content')
<section class="section speakers bg-speaker overlay-lighter">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title white">
					<h3><span class="alternate">Services</span></h3>

				</div>
			</div>
		</div>
		<div class="col">
			<div class="row">
				<div class="col-md-6">
					<div class="speaker-item">
						<div class="image">
							<img style="width: 600px;height:200px;" src="{{url('images/events/Marriage.jpg')}}" alt="speaker" class="img-fluid">
							<div class=""></div>
						</div>
						<div class="content text-left">
							@foreach($packageDetails as $data)
							<h6>{{$data->service->name}}</h6>
							@endforeach
							@foreach($packageDetails as $data)
							<h6>Guest: {{$data->package->guest}}</h6>
							@break
							@endforeach
						</div>
						@foreach($packageDetails as $data)
						<a href="{{ route('booking.form', $data->package_id) }}" class="btn btn-success">Book Now</a>
						@break
						@endforeach
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection