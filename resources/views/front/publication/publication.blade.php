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
										<li>
											<a class="d-flex justify-content-between">
												<p>English Editing Services</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>JOURNAL PUBLICATION</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>PROPOSAL WRITING/EDITING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>CONTENT WRITING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>RESEARCH ARTICLE WRITING/EDITING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>THESIS WRITING/EDITING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>REPORT WRITING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>TRANSLATION WRITING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>PROOF READING</p>
											</a>
										</li>
										<li>
											<a class="d-flex justify-content-between">
												<p>PLAGIARISM WRITING</p>
											</a>
										</li>
									</ul>
								</div>	

							</div>
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
    
</script>
@endsection