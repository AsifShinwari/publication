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
											<img class="img-fluid center-content" src="{{asset('storage/'.$journal->image)}}" alt="" width="150px" class="center-content">
										</div>
										<div class="col-lg-10">
											<h2 class="book-title">{{$journal->title}}</h2>
											<hr>
											
											<div class="row">
												<div class="col-lg-4">
													<p class="book-details"><span>ISSN:</span> {{$journal->isbn}}																										<br>
													<br>
													</p>
												</div>
												
											</div>
											<h4>
                                                @if($type=='about')
                                                    About
                                                @endif

                                                @if($type=='aim_and_scop')
                                                    Aim and Scope
                                                @endif

                                                @if($type=='indexing')
                                                    Indexing
                                                @endif

                                                @if($type=='editorial_board')
                                                    Editorial Board
                                                @endif

                                                @if($type=='autor_guidline')
                                                     Autor Guidline
                                                @endif

                                                @if($type=='pub_ethics')
                                                    Publication Ethics
                                                @endif

                                                @if($type=='archive')
                                                    Archives
                                                @endif
                                            </h4><hr>
											<p><p>
                                                @if($type=='about')
                                                    {{$journal->about}}
                                                @endif

                                                @if($type=='aim_and_scop')
                                                    {{$journal->aim_and_scop}}
                                                @endif

                                                @if($type=='indexing')
                                                    {{$journal->indexing}}
                                                @endif

                                                @if($type=='editorial_board')
                                                    {{$journal->editorial_board}}
                                                @endif

                                                @if($type=='autor_guidline')
                                                    {{$journal->autor_guidline}}
                                                @endif

                                                @if($type=='pub_ethics')
                                                    {{$journal->pub_ethics}}
                                                @endif


                                                @if($type=='archive')
                                            <div class="col-lg-12 sidebar-widgets">
											  <div class="widget-wrap">
													<!-- accordion 2 start-->
													<dl class="accordion">
														@foreach($journal_archives as $item)
                                                        <dt>
															<a href="#">Volume {{$item->volume}}, {{date('Y',strtotime($item->year))}}</a>
														</dt>
														<dd>
															<a href="{{route('front.journals.archives.issues',$item->id)}}"><p><b>{{$item->issue}}</b></p></a>
														</dd>
                                                        @endforeach
													</dl>
												  <!-- accordion 2 end-->
												</div>
											</div>
                                            @endif
                                            <br></p><p><br></p>											
											
										</div>
									</div>
								
								
									
								</div>
								
								
								
							</div>
							
						</div>
						<div class="col-lg-3 sidebar-widgets">
						<div class="row">
						  <div class="col-lg-12 sidebar-widgets">
							<div class="widget-wrap">
								
								
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Quick Links</h4>
									<ul class="cat-list">
										<li>
											<a href="{{route('front.journals.details',[$id,'about'])}}" class="d-flex justify-content-between">
												<p>About the Journal</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$id,'aim_and_scop'])}}" class="d-flex justify-content-between">
												<p>Aim &amp; Scope</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$id,'indexing'])}}" class="d-flex justify-content-between">
												<p>Indexing</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$id,'archive'])}}" class="d-flex justify-content-between">
												<p>Archives</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$id,'editorial_board'])}}" class="d-flex justify-content-between">
												<p>Editorial Board</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$id,'autor_guidline'])}}" class="d-flex justify-content-between">
												<p>Author Guidelines</p>
											</a>
										</li>
										<li>
											<a href="{{route('front.journals.details',[$id,'pub_ethics'])}}" class="d-flex justify-content-between">
												<p>Publication Ethics</p>
											</a>
										</li>														
									</ul>
								</div>																	
							</div>
						  </div>
							
						  <div class="col-lg-12 sidebar-widgets">
								
							<div class="widget-wrap">
								
								
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Manuscript Submission</h4>
									<p><br>You can submit your book manuscript in the following link</p>
									<a href="{{route('front.manuscript.add',$journal->id)}}" class="genric-btn primary small center-content">Submit Manuscript</a>
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