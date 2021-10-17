@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							Report
							</h1>	
 									
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span> Report </p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Report</h1>
								<p>Our performance report based on activities.</p>
							</div>
						</div>
					</div>
					<div class="row">
										
					</div>
				</div>
					
			</section>
			<!-- End events-list Area -->	
	
@endsection

@section('manual_scripts')

@endsection