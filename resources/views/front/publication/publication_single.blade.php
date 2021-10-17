@extends('front.layout.publication_master')
 
@section('contents') 

			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								{{$publication->title}}			
							</h1><p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('front.publication.index')}}"> Publication</a></p>
							
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start post-content Area -->
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 posts-list">
							<div class="single-post single-post-custom row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-2">
											<img class="img-fluid center-content" src="{{asset('storage/'.$publication->image)}}" alt="" width="150px" class="center-content"> 
										</div>
										<div class="col-lg-10">
											<h2 class="book-title">{{$publication->title}}</h2>
											<h5 class="book-author"><i class="fa fa-user" aria-hidden="true"></i>{{$publication->author}}</h5>
											<hr>
											
											<div class="row">
												<div class="col-lg-4">
													<p class="book-details">
														<span>ISBN:</span> {{$publication->isbn}}																										
														<br><span>DOI: </span> <a href='http://doi.org/{{$publication->doi}}' target='_blank'>{{$publication->doi}}</a>	
														<br><span>Pages:</span> {{$publication->pages}}
														<br><span>Year of Publication:</span> {{$publication->year_of_publication}}
													</p>
												</div>
												<div class="col-lg-8">
													<button type="button" class="btn  genric-btn info circle">
													  Views <span class="badge badge-light">{{$publication->views_count}}</span>
													</button>
													<button type="button" class="btn  genric-btn info circle">
													  Downloads <span class="badge badge-light">{{$publication->downloads_count}}</span>
													</button>
													
												</div>
											</div>
											<a @if($publication->book_pdf) href="{{asset('storage/'.$publication->book_pdf)}}" @endif target="_blank" class="genric-btn primary small"><i class="fa fa-download" aria-hidden="true"></i>  Download Full Book</a>
											 <a @if($publication->table_of_content_pdf) href="{{asset('storage/'.$publication->table_of_content_pdf)}}" @endif target="_blank" class="genric-btn primary small"><i class="fa fa-download" aria-hidden="true"></i>  Table of Contents</a><br><br>
											<h4>Table of Contents</h4><hr>
											
											<!-- Chapter List Start -->

											@foreach($chapters as $item)
											  <!-- Article -->
											  <div class="search-result">
												<a href="{{route('front.publication.single.chapter',$item->id)}}"><h3 class="search-title">{{$item->title}}</h3></a>
												<h5 class="search-author"><i class="fa fa-user" aria-hidden="true"></i> {{$item->author}}</h5>
												<h5 class="search-author"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i>{{$item->pages}}</h5>
											</div>
											  
											  <!-- End: Article -->
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