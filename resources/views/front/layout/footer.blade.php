@php
	$general_info=DB::table('general_info')->orderBy('id','desc')->first();
	$home_page=DB::table('home_page')->orderBy('id','desc')->first();
@endphp

	@if(Route::currentRouteName()!='/')
	<!-- Start cta-two Area -->
	<section class="cta-two-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 cta-left">
					<h1>{{$home_page->join_us_banner_title}}</h1>
				</div>
				<div class="col-lg-4 cta-right">
					<a class="primary-btn wh" href="{{route('front.individual.join')}}">Join Now</a>
				</div>
			</div>
		</div>	
	</section>
	<!-- End cta-two Area -->	
	@endif

	<!-- start footer Area -->		
    <footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								@php $about_us=DB::table('about_us')->orderBy('id','desc')->first(); @endphp
								<h4>About {{$general_info->app_abbr}}</h4>
								<p> {{substr($about_us->message,0,220)}} </p>								
							</div>
						</div>
						
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Join Us</h4>
								<ul>
									<li><a href="{{route('front.individual.join')}}">Join as Individual</a></li>
									<li><a href="{{route('front.company.join')}}">Join as Institute/Company</a></li>
									<li><a href="{{route('front.mentor.join')}}">Join as Mentor</a></li>
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Quick Links</h4>
								<ul>
									<li><a href="{{route('front.events','CommingEvents')}}">Find Events</a></li>
									<li><a  href="{{route('front.company.join')}}">Engage your Institution</a></li>
									<li><a href="{{route('front.post.event')}}">Post your Events</a></li>
									<li><a href="{{route('front.about.tie.up')}}">Our Sponsors</a></li>
								</ul>								
							</div>
						</div>																		
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Contact</h4>
								<p>{{$general_info->email}}</p>
								<h6>Editorial Office</h6>
									<p>
										{{substr($general_info->office_address,0,25)}}
									</p>
									<p>
										{{substr($general_info->office_address,25,50)}}
									</p>
									<p>
										{{substr($general_info->office_address,50,75)}}
									</p>
									<p>
										{{substr($general_info->office_address,75,100)}}
									</p>
								
							</div>
						</div>											
					</div>
					
					
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12">
Copyright &copy;  <a href="https://hsoft.af/">HSOFT</a> <script>document.write(new Date().getFullYear());</script> All rights reserved
</p>
						
					</div>
											
				</div>
			</footer>	
			<!-- End footer Area -->