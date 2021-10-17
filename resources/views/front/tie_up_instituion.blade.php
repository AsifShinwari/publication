@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							    Tie-up Institution
							</h1>	
 									
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span> Tie-up Institution </p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					<div class="row">					
						@foreach($data as $item)
                        <div class='col-md-4'>
							<div class='advisory'>
								<img @if($item->image!=null) src="{{asset('storage/'.$item->image)}}" @else src="{{asset('front_assets/profilepic/default.png')}}" @endif class='img-fluid rounded' width='200px'><br><br>
								<h4>{{$item->title}}</h4>
								<p>
									 {{$item->country_name}}
								</p>
							</div>
						</div>	
                        @endforeach	
					</div>
				</div>
					
			</section>
			<!-- End events-list Area -->	
	
@endsection

@section('manual_scripts')

@endsection