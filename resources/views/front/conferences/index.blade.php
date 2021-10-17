@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							    Conference 
							</h1>	
 									
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span> {{date('Y',strtotime($data->year))}} | {{$data->title}} </p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

            <div class="container py-4 my-4" style="word-break: break-all;">
                <h4 class="border-bottom mb-4">{{date('Y',strtotime($data->year))}} | {{$data->title}}</h4>
                {!!$data->description!!}
            </div>
	
@endsection

@section('manual_scripts')

@endsection