@extends('frontend.master')
@section('content')
<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 align-self-center">
				<div class="image-block bg-about">
					<img class="img-fluid" src="images/speakers/featured-speaker.jpg" alt="">
				</div>
			</div>
			<div class="col-lg-8 col-md-6 align-self-center">
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
						
                    
                    </div>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="#" class="btn btn-main-md">Update Profile</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
