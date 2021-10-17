@extends('front.layout.publication_master')
 
@section('contents') 

@php
    if(isset($_GET['publication_type'])){ $publication_type=$_GET['publication_type']; }
    else{ $publication_type=[]; }
    
    if(isset($_GET['discipline'])){ $discipline=$_GET['discipline']; }
    else{ $discipline=[]; }


    function filter($arr,$check_for){
        $exist=false;
        for ($i=0; $i < count($arr); $i++) { 
            if($arr[$i]==$check_for){
                $exist=true;
                break;
            }
        }
        return $exist;
    }

@endphp
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Publication Filter			
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
					
											
						<div class="col-lg-3 sidebar-widgets">
							<div class="widget-wrap">
							
							<form action="{{route('front.publication.filter')}}" method="get">
							
							<input type="hidden" name="search" value="" />
								
								<!-- accordion 2 start-->
								<dl class="accordion">
									<dt>
										<a href="#">Publication Type</a>
									</dt>
									<dd>
									    @foreach($publication_types as $item)
										<div class="checkbox">
										    <label><input type="checkbox" name="publication_type[]" @if(filter($publication_type,$item->id)) checked @endif value="{{$item->id}}"> {{$item->title}}</label>										
										</div>
                                        @endforeach
										
									</dd>
									<dt>
										<a href="#">Discipline</a>
									</dt>
									<dd>
                                        @foreach($disciplines as $item)
										<div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="discipline[]"
                                                @if(filter($discipline,$item->id)) checked @endif 
                                                 value="{{$item->id}}"> {{$item->title}}
                                            </label>
                                        </div>
                                        @endforeach
									</dd>

								</dl>
								<!-- accordion 2 end-->
								<button type="submit" name="submit" value="apply" class="genric-btn primary small center-content" style="margin-bottom:15px;">Apply</button>
								
								<button type="button" id="rset" class="genric-btn primary small center-content" style="margin-bottom:15px;">Reset</button>
							</form>
								
							</div>
							
							
						</div>
						
						<div class="col-lg-9">
							<div class="widget-wrap">
							
							
							        <!-- <p class="search-key">Search result for <span>Engineering</span> and <span>Book</span></p> -->
                                    @foreach($publications as $item)
                                    <div class="search-result">
                                        <p class="search-type">
                                            <i class="fa fa-folder-o" aria-hidden="true"></i> {{$item->type_title}}
                                        </p>
                                        <a href="publication-book-detail0b30.html?id=2">
                                            <h3 class="search-title">{{$item->title}}</h3>
                                        </a>
                                        <h5 class="search-author">
                                            <i class="fa fa-user" aria-hidden="true"></i> {{$item->author}}
                                        </h5>
                                    </div>
                                    @endforeach
                            </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        {{$publications->links('laravel_pagination')}}
                                    </div>
                                </div>
                        </div>
                        
<style>

.paginate {
	
	text-align:center;

	padding:0px 6px 0px 6px;

	background-color:#fff;

	color:#fff;

}



.paginate a {

	color:#666;

	text-decoration:none;

	padding:5px 11px 4px 11px;

	margin:0 3px 0 3px;

}



.paginate a:hover, .paginate a:active {

	color:#fff;

	background-color:#18A730;

}

.paginate span.current {

	padding:5px 11px 4px 11px;

	margin:0 3px 0 3px;

	color:#fff;

	background-color:#18A730;

}

.paginate span.disabled {

	display:none;

}



	

</style>
							
							
							<br /><center><table style="width:100%;"><tr><td style="text-align:right;"></td></tr></table></center><br />								
								
								<!-- <nav class="blog-pagination justify-content-center d-flex">
								
								
									<ul class="pagination">
										<li class="page-item">
											<a href="#" class="page-link" aria-label="Previous">
												<span aria-hidden="true">
													<span class="lnr lnr-chevron-left"></span>
												</span>
											</a>
										</li>
										<li class="page-item"><a href="#" class="page-link">01</a></li>
										<li class="page-item active"><a href="#" class="page-link">02</a></li>
										<li class="page-item"><a href="#" class="page-link">03</a></li>
										<li class="page-item"><a href="#" class="page-link">04</a></li>
										<li class="page-item"><a href="#" class="page-link">09</a></li>
										<li class="page-item">
											<a href="#" class="page-link" aria-label="Next">
												<span aria-hidden="true">
													<span class="lnr lnr-chevron-right"></span>
												</span>
											</a>
										</li>
									</ul>
									
									
								</nav> -->	

							</div>
						</div>
						
											
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

@endsection

@section('manual_scripts')
<script>
    $('.page-link').css('color','#18a730');
    $('.page-item.active .page-link').css('background-color','#18a730');
    $('.page-item.active .page-link').css('color','white');
</script>
@endsection