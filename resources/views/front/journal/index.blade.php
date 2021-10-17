@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Journals				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span> Journals</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-12 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget popular-post-widget">
									<h3>Journals</h3><hr>
									<div class="popular-post-list">
										<div class="row">
                                            @foreach($journals as $item)
									        <div class="col-lg-3">
												<a href="{{route('front.journals.details',[$item->id,'about'])}}" 
                                                title="{{$item->title}}">
                                                    <img class="img-fluid center-content" src="{{asset('storage/'.$item->image)}}"
                                                     alt="" width="140px" class="center-content">
												<h4 class="book-small-title">{{$item->title}}</h4></a>
											</div>
											@endforeach
										</div>
										
									</div>
								</div>
								
																
							</div>
						</div>
						
						
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->
					
@endsection

@section('manual_scripts')
<script>

</script>
@endsection