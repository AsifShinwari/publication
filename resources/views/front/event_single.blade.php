@extends('front.layout.master')
 
@section('contents') 
 			<!-- start banner Area -->
             <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Events				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('front.events','CommingEvents')}}"> Events</a>   <span class="lnr lnr-arrow-right"></span>  <a href="#"> {{$data->title}}</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start event-details Area -->
			<section class="event-details-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 event-details-left">
							
							<div class="details-content">
								<a href="#">
									<h3>{{$data->title}}<br><br></h3>
								</a>
								<p class="justifytext">	{{$data->description}} 									
								</p>
							</div>
							
								<a href="#">
									<h5>Organizer</h5>
								</a>
								<p>	{{$data->organizer}}									
								</p>
								
								<a href="#">
									<h6>Category</h6>
								</a>
								<p>	{{$data->category}}								
								</p>
								
								<a href="#">
									<h6>Website</h6>
								</a>
								<p>	{{$data->website}}								
								</p>
								<a href="#">
									<h6>Topics</h6>
								</a>
								<p>	{{$data->topics}}								
								</p>
								<a href="#">
									<h6>Keywords</h6>
								</a>
								<p>	{{$data->keywords}}								
								</p>
						</div>
						
						
						
						<div class="col-lg-4 event-details-right">
							<div class="single-event-details">
								<h4>Important Dates</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Start date</span>
										<span>{{date('d-M-Y h:i a',strtotime($data->start_date))}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>End date</span>
										<span>{{date('d-M-Y h:i a',strtotime($data->end_date))}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Deadline for Registration</span>
										<span>{{date('d-M-Y h:i a',strtotime($data->deadline_reg_date))}}</span>
									</li>	
																						
								</ul>
							</div>
							<div class="single-event-details">
								<h4>Details</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Event Type</span>
										<span>{{$data->event_type}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Country</span>
										<span>{{$data->country_name}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>City</span>
										<span>{{$data->city}}</span>
									</li>														
								</ul>
							</div>
							<div class="single-event-details">
								<h4>Contact Details</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>Contact Person</span>
										<span>{{$data->contact_person_name}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Email-ID</span>
										<span>{{$data->email}}</span>
									</li>
									<li class="justify-content-between d-flex">
										<span>Phone</span>
										<span>{{$data->phone}}</span>
									</li>														
								</ul>
							</div>														
						</div>
					</div>
				</div>	
			</section>
			<!-- End event-details Area -->

	
				
@endsection

@section('manual_scripts')
<script>

</script>
@endsection