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
					@php  $data = DB::table("enter_dev")->orderBy('id','desc')->first(); @endphp

					{!!$data->contents!!}
				</div>
					
			</section>
			<!-- End events-list Area -->	
@endsection

@section('manual_scripts')
<script>

</script>
@endsection