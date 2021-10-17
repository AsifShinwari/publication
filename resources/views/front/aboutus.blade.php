@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								About Us				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  About Us</p>
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
							<h1>{{$data->title}}</h1>
							<p class="justifytext">{{$data->message}}</p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End info Area -->	

			<!-- Start course-mission Area -->
			<section class="course-mission-area pb-120">
				<div class="container">
											
                    <div class="row">
                        <div class="col-md-8 accordion-left">

                            <!-- accordion 2 start-->
                            <dl class="accordion">
                                <dt>
                                    <a href="#">Mission</a>
                                </dt>
                                <dd>
                                    {{$data->mission}}
                                </dd>
                                <dt>
                                    <a href="#">Vision</a>
                                </dt>
                                <dd>
                                    {{$data->vision}}    
                                </dd>
                                                                  
                            </dl>
                            <!-- accordion 2 end-->
                        </div>
                        <div class="col-md-4 no-padding info-area-left">
							<img class="img-fluid" src="{{asset('storage/'.$data->image2)}}" alt="">
						</div>
                    </div>					
					
					
					
				</div>	
				
			</section>
			
			
			<!-- End course-mission Area -->
			
					
@endsection

@section('manual_scripts')
<script>

</script>
@endsection