@extends('front.layout.publication_master')
 
@section('contents') 

	<!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Publication				
							</h1><br>	
							<div class="single-footer-widget">
								
								<div class="" id="mc_embed_signup">
									 <form action="{{route('front.publication.filter')}}" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="search" placeholder="Search">
									    <div class="input-group-btn">
									      <button class="btn btn-default" type="submit" name="submit" value="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>    
									    </div>
									    	<div class="info"></div>  
									  </div>
									</form> 
								</div>
							</div>
							
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	



            <!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Author Services</h4>
									{{--<ul class="cat-list">
                                        @foreach($disciplines as $item)
									    <li>
											<a href="{{route('front.publication.filter')}}?search=&publication_type%5B%5D={{$item->id}}" class="d-flex justify-content-between">
												<p>{{$item->title}}</p>
											</a>
										</li>
                                        @endforeach
									</ul>--}}
									<ul class="cat-list">
										@php $our_services=DB::table('our_services')->orderBy('id','asc')->get(); @endphp
										@foreach($our_services as $item)
										<li>
											<a class="d-flex justify-content-between" href="#" onclick="show_item(event,'item{{$item->id}}')">
												<p>{{$item->title}}</p>
											</a>
										</li>
										@endforeach
									</ul>
								</div>	

							</div>
						</div>
						<div class="col-lg-8">
						@foreach($our_services as $item)
							<div class="container py-4 bg-white {{ $loop->index!=0 ? 'd-none' : '' }} items" id="item{{$item->id}}">
								<h4>{{$item->title}}</h4>
								<hr class="mb-4">
								<img src="{{asset('storage/'.$item->image)}}" alt="image" >
								<p class="mt-4">{{$item->description}}</p>
							</div>
						@endforeach
						</div>
						{{--
						<div class="col-lg-8">
							<div class="col-lg-12 sidebar-widgets">
								<div class="widget-wrap">
									<div class="single-sidebar-widget popular-post-widget">
										<h4 class="popular-title">Recently Published Books</h4>
										<div class="popular-post-list">
										<div class="row">
                                            @foreach($recent_publication as $item)
											<div class="col-lg-3">
												<a href="{{route('front.publication.single',$item->id)}}" data-toggle="tooltip" 
                                                data-placement="bottom" title="{{$item->title}}">

                                                    <img class="img-fluid center-content" src="{{asset('storage/'.$item->image)}}"
                                                     alt="" width="140px" class="center-content">

                                                </a>
											</div>
                                            @endforeach
										</div>
										</div>
									</div>
								</div>
							</div>
								<div class="row">
								<div class="col-lg-6 sidebar-widgets">
									<div class="widget-wrap">
										<div class="single-sidebar-widget popular-post-widget">
											<h4 class="popular-title">Call for Chapters</h4>
											<div class="popular-post-list">
											
												<div class="single-post-list d-flex flex-row align-items-center">
													<div class="details">
														<a href="publication-book-call-for-chapter-detail681a.html?id=1"><h6>Call for Chapter</h6></a>
													</div>
												</div>
																								
												<a href="#" class="genric-btn primary small center-content">View More</a>												
											</div>
											
										</div>

									</div>
								</div>
								<div class="col-lg-6 sidebar-widgets">
									
									<div class="widget-wrap">
										
										<div class="single-sidebar-widget post-category-widget">
											<h4 class="category-title">Our Journals</h4>
											<ul class="cat-list">
												@foreach($recent_jurnals as $item) 
												<li>
													<a href="{{route('front.publication.single',$item->id)}}" class="d-flex justify-content-between">
														<p>{{$item->title}}</p>
													</a>
												</li>
												@endforeach
											</ul>
											<br>
											<a href="{{route('front.journals.index')}}" class="genric-btn primary small center-content">View More</a>
										</div>	

									</div>
									
								</div>
							
							</div>
						</div>
						--}}
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

@endsection

@section('manual_scripts')
<script>

	function show_item(e,item_id){
		e.preventDefault();
		$('.items').removeClass('d-none');
    	$('.items').addClass('d-none');
		$(`#${item_id}`).removeClass('d-none');
		return;
	}
</script>
@endsection