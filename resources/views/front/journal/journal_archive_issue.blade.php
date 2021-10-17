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
						
						<div class="col-lg-9 posts-list">
							<div class="single-post single-post-custom row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-2">
											<img class="img-fluid center-content" src="cont-mgt/wrapper/20200707124856pm.jpg" alt="" width="150px" class="center-content">
										</div>
										<div class="col-lg-10">
											<a href="{{route('front.journals.details',[$journal->id,'about'])}}"><h6 class="book-tidtle"> {{$journal->title}}<i class="fa fa-level-down" aria-hidden="true"></i></h6></a>
											
																						
											<h2 class="book-title">Volume {{$archive->volume}}, {{$archive->issue}}, {{date('Y',strtotime($archive->year))}}</h2>
											<hr>
											
											
											<h4>Table of Contents</h4><hr>
											
											@foreach($issues as $issue)											
											<div class="search-result">
												<a href="{{route('front.journals.archives.single.issue',$issue->id)}}"><h3 class="search-title">{{$issue->title}}</h3></a>
												<h5 class="search-author"><i class="fa fa-user" aria-hidden="true"></i> {{$issue->author}}</h5>
												
																								
												
												<h5 class="search-author"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> Pages: {{$issue->pages}}</h5>
												<a href="{{asset('storage/',$issue->file)}}" class="genric-btn primary small" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>  Download</a><br><br>
											</div>
											<!-- End: Article -->
											@endforeach
											
										</div>
									</div>
								
								
									
								</div>
								
								
								
							</div>
							
						</div>
						<div class="col-lg-3 sidebar-widgets">
							<div class="widget-wrap">
								
								
                            <div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Quick Links</h4>
									<ul class="cat-list">
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'about'])}}" class="d-flex justify-content-between">
												<p>About the Journal</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'aim_and_scop'])}}" class="d-flex justify-content-between">
												<p>Aim &amp; Scope</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'indexing'])}}" class="d-flex justify-content-between">
												<p>Indexing</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'archive'])}}" class="d-flex justify-content-between">
												<p>Archives</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'editorial_board'])}}" class="d-flex justify-content-between">
												<p>Editorial Board</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'autor_guidline'])}}" class="d-flex justify-content-between">
												<p>Author Guidelines</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$journal->id,'pub_ethics'])}}" class="d-flex justify-content-between">
												<p>Publication Ethics</p>
											</a>
										</li>														
									</ul>
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