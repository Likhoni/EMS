@extends('frontend.master')
@section('content')
<section class="section speakers bg-speaker overlay-lighter">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title white">
					<h3><span class="alternate">Packages</span></h3>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 30px;">
			@foreach($packageShow as $data)
			<div class="col-lg-3 col-md-4 col-sm-6" style="margin-left: 200px;">
				<div class="speaker-item">
					<div class="image">
						<img style="width: 300px;height:200px;" src="{{url('images/events/Marriage.jpg')}}" alt="speaker" class="img-fluid">
						<div class=""></div></div>
					    <div class="content text-center">
						<h6>{{$data->name}}</h6>
					    <h4>{{$data->price}}.BDT</h4>
						<a style="color: black;" href="{{route('all.packages.services.details', $data->id)}}">Details</a>
						
					</div>
				</div>
			</div>
            @endforeach	
		</div>
	</div>
</section>
@endsection