@extends('frontend.master')
@section('content')

<section class="section speakers bg-speaker overlay-lighter">
	<div class="container">

			
		<style>
        .button-container {
            text-align: center;
            margin-top: 50px;
        }
    </style>

    <form action="" method="">
        @csrf
        <div class="container mt-5 pt-6">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <img class="img-fluid" style="object-fit: cover; width: 100%; height: 300px;"
                        src="" alt="">
                    <div class="mt-4">
                        <h3  style="color:white ;">Event Name</h3>
                        <p  style="color:white ;">Event Description</p>
                        <p  style="color:white ;"><strong>Price Range:</strong> min_price- max_price .BDT</p>
                    </div>

                    <h5  style="color:white ;">Select Services:</h5>
                   
                        <div class="form-check">
                    
                <input step="visibility:none';" type="hidden" class="card-title" name="event_name"
                    value="" />
                <hr>
                <h5  style="color:white ;">Calculated Price: <span id="calculated_price"></span></h5>
                <hr>
                <div class="form-outline md-6" style="width: 22rem;">
                    <label class="form-label" for="form2"  style="color:white ;">Enter number of guest</label>
                    <input  name="guest" id="guest" type="number" class="form-control" onkeyup=""/>

                </div>
                <div class="form-group 2">
                    <label for="inputContactNumber"  style="color:white ;">Appointment Date</label>
                    <input name="apponitment_date" type="date" class="form-control" id="event_price" placeholder=""
                        required>
                        
                       

                </div>
                <div class="form-group 2">
                    <label for="inputContactNumber"  style="color:white ;">Event Starting Date</label>
                    <input name="start_date" type="date" class="form-control" id="event_price" placeholder="" required>
                    

                </div>
                <div class="form-group 2">
                    <label for="inputContactNumber"  style="color:white ;">Event Ending Date</label>
                    <input name="end_date" type="date" class="form-control" id="event_price" placeholder="" required>
                    
                </div>

                <div class="form-outline md-6" style="width: 22rem;">
                    <label class="form-label" for="form2"  style="color:white ;">Location</label>
                    <input required name="location" value="" type="text" id="form2" class="form-control" />
                   

                </div>
                <div class="form-outline md-6" style="width: 22rem;">
                    <label class="form-label" for="form2"  style="color:white ;">Remarks </label>
                    <input required name="remarks" value="" type="text" id="form2" class="form-control" />
                   

                </div>
                <div class="mt-4 text-align-center">
                    <button type="submit" class="col-12 mb-4 btn btn-primary">Get Quote</button>
                </div>

            </div>
        </div>
    </form>
          
    
    

			
		
	</div>
</section>
</div>
@endsection







		
		
		
			
				





