@extends('frontend.master')
@section('content')
<section class="section speakers bg-speaker overlay-lighter">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title white">
					<h3><span class="alternate">Events</span></h3>
					
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($eventShow as $data)
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="speaker-item">
					<div class="image">
						<img style="width: 300px;height:200px;" src="{{url('images/events/',$data->image)}}" alt="speaker" class="img-fluid">
						<div class=""></div></div>
					    <div class="content text-center">
						<h5><a href="{{route('all.packages',$data->id)}}">{{$data->name}}</a></h5>
					</div>
				</div>
			</div>
            @endforeach
			
		</div>
	</div>
</section>
@endsection