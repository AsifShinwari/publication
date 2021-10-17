@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
                                Event Sponsorship				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Event Sponsorship</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

	        <!-- Start info Area -->
            <section class="info-area pb-120 pt-120">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6 no-padding info-area-left">
							<img class="img-fluid" src="{{asset('storage/'.$data->image)}}" alt="">
						</div>
						<div class="col-lg-6 info-area-right">
							<h1>Event Sponsorship</h1>
							<p class="justifytext">{{$data->message}}</p>
						</div>
					</div>
					
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 pt-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Apply for Event Sponsorship</h1>
								<p>Need financial and physical support to make your events a grand success? Apply here for sponsorship.</p>
								<a href="{{route('front.contact.us.index')}}" class="text-uppercase primary-btn mx-auto mt-40">Event Sponsorship Application</a>	
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->	
			
					
@endsection

@section('manual_scripts')
<script>

</script>
@endsection