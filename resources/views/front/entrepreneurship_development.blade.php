@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white"> 
                                Entrepreneurship Development
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>Entrepreneurship Development</p>
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
								<h1 class="mb-10">Our Mentors</h1>
							</div>
						</div>
					</div>
				    <div class="row">	
                        @foreach($data as $item)
						<div class='col-md-4'>
							<div class='advisory'>
								<img src="{{asset('storage/'.$item->image)}}" class='img-fluid rounded' >
								<h4 style='padding-top:10px;'>{{$item->name}}</h4>
								<p>
									{{$item->qualification}}
								</p>
								<p>
									<b>{{$item->country_name}}</b>
								</p>
							</div>
						</div>	
                        @endforeach
                    </div>
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 pt-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Want to Join as a Mentor ?</h1>
								<p>Interested to join as mentor text content here, Interested to join as mentor text content here, Interested to join as mentor text content here. </p>
								<a href="{{route('front.mentor.join')}}" class="text-uppercase primary-btn mx-auto mt-40">Apply to Join</a>	
							</div>
						</div>
					</div>
				</div>
					
			</section>
			<!-- End events-list Area -->	
@endsection

@section('manual_scripts')
<script>

</script>
@endsection