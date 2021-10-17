@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							Mentor's Post
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Mentor's Post</p>
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
								
								<img class='img-fluid center-content' src="{{asset('storage/'.$data->image)}}"> 
								<br><br>
								<p class="justifytext">	<p>{{$data->details}}<br></p>									
								</p>
							</div>
							
								
						</div>
						
						
						
						<div class="col-lg-4 event-details-right">
							<div class="single-event-details">
								<h4>Author</h4>
								<ul class="mt-10">
									<li class="justify-content-between d-flex">
										<span>{{$data->mentor_name}}</span>
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

@endsection