@extends('frontend.master')
@section('content')
<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 align-self-center">
				<div class="image-block bg-about">
					<img class="img-fluid" src="{{url('templateImage/speakers/featured-speaker.jpg')}}" alt="">
				</div>
			</div>
			<div class="col-lg-8 col-md-6 align-self-center">
				<div class="content-block">
					<h2>About The <span class="alternate">Eventre</span></h2>
					<div class="description-one">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.
						</p>
					</div>
					<div class="description-two">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmtempor incididunt ut labore et dolore magna aliq enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
					</div>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="#" class="btn btn-main-md">Buy ticket</a>
						</li>
						<li class="list-inline-item">
							<a href="#" class="btn btn-transparent-md">Read more</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
