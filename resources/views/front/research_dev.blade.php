@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
                                Research & Development
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Research & Development</p>
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
								<h1 class="mb-10">Current Projects</h1>
								<p>Champions keep playing until </p>
							</div>
						</div>
					</div>
					<div class="row align-items-center" id="current_projects">
					    @foreach($current_projects as $item)
						<div class='col-lg-4 pb-30 m-2 onscroll-load current_project_item border'>
							<div class='single-carusel row align-items-center'>
								<div class='detials col-12 col-md-12'>
									
									<h4> 
 										{{$item->proj_name}}
									</h4>
									<p>
										{{substr($item->details,0,105)}}
									</p>
									<br>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
					<div class="row">
						<button class="load-more-proj-current text-uppercase primary-btn mx-auto mt-40">Load more Projects</button>
					</div>							
				</div>	
			</section>
			<!-- End events-list Area -->	

			<!-- Start events-list Area -->
			<section class="events-list-area section-gap-bottom-only event-page-lists">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Past Projects</h1>
								<p>A little nudge, a little direction, a little support, a little coaching can make greatest things happen. Here is the list of previous projects successfully completed by scholars with Our guidance. </p>
							</div>
						</div>
					</div>
					<div class="row align-items-center" id="_past_projects">
					    @foreach($past_projects as $item)
						<div class='col-lg-4 pb-30 m-2 onscroll-load past_project_item border'>
							<div class='single-carusel row align-items-center'>
								<div class='detials col-12 col-md-12'>
									
									<h4> 
 										{{$item->proj_name}}
									</h4>
									<p>
										{{substr($item->details,0,105)}}
									</p>
									<br>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
					<div class="row">
						<button class="load-more-proj-past text-uppercase primary-btn mx-auto mt-40">Load more Projects</button>
					</div>	
				</div>	
			</section>
			<!-- End events-list Area -->		
			
			<!-- Start events-list Area -->
			<section class="events-list-area section-gap-bottom-only event-page-lists">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Funded Projects</h1>
								<p>When there is team work and collaboration, wonderful things can be achieved. We encourage innovative research projects by offering funds. Our funded projects are listed below.</p>
							</div>
						</div>
					</div>
					<div class="row align-items-center" id="our_projects">
					    @foreach($our_funded_projects as $item)
						<div class='col-lg-4 pb-30 m-2 onscroll-load our_project_item border'>
							<div class='single-carusel row align-items-center'>
								<div class='detials col-12 col-md-12'>
									
									<h4> 
 										{{$item->proj_name}}
									</h4>
									<p>
										{{substr($item->details,0,105)}}
									</p>
									<br>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
					<div class="row">
						<button class="load-more-proj-our text-uppercase primary-btn mx-auto mt-40">Load more Projects</button>
					</div>	
				</div>	
			</section>
			<!-- End events-list Area -->	
	
@endsection

@section('manual_scripts')
<script>
	// current projects
	  var currentNextPageUrl='{{$current_projects->nextPageUrl()}}';
	  var $current_projects = $(".current_project_item");
 		
		function current_project_item(item){
			return `
                <div class='col-lg-4 pb-30 m-2 onscroll-load current_project_item border'>
					<div class='single-carusel row align-items-center'>
						<div class='detials col-12 col-md-12'>
							<h4> 
 								${item.proj_name}
							</h4>
							</a>
							<p>
								${item.details}
							</p>
							<br>
						</div>
					</div>
				</div>
			   `;
		}

	  $(".load-more-proj-current").click(function() {
	      $.get(currentNextPageUrl, function(response) {
			currentNextPageUrl=response.currentNextUrl;
			if(response.current_projects.data!=null){
				var htm='';
				$.each(response.current_projects.data,function(key,current_project){
					htm+=current_project_item(current_project);
				});
				// console.log(htm);
			}
			if(currentNextPageUrl==null){
				$('.load-more-proj-current').remove();
			}else{
				$('.load-more-proj-current').removeClass('d-none');
			}

	           $current_projects.after(htm);
	      });
	  });
	//end current projects

	// Past projects
	  var pastNextPageUrl='{{$past_projects->nextPageUrl()}}';
	  var $past_projects = $(".past_project_item");
 		
		function past_project_item(item){
			return `
                <div class='col-lg-4 pb-30 m-2 onscroll-load past_project_item border'>
					<div class='single-carusel row align-items-center'>
						<div class='detials col-12 col-md-12'>
							<h4> 
 								${item.proj_name}
							</h4>
							</a>
							<p>
								${item.details}
							</p>
							<br>
						</div>
					</div>
				</div>
			   `;
		}

	  $(".load-more-proj-past").click(function() {
	      $.get(pastNextPageUrl, function(response) {
			pastNextPageUrl=response.pastNextUrl;
			if(response.past_projects.data!=null){
				var htm='';
				$.each(response.past_projects.data,function(key,past_project){
					htm+=past_project_item(past_project);
				});
				// console.log(htm);
			}
			if(pastNextPageUrl==null){
				$('.load-more-proj-past').remove();
			}else{
				$('.load-more-proj-past').removeClass('d-none');
			}

	           $past_projects.after(htm);

	      });
	  });
	//end Past projects


	// Our Funded projects
	  var ourFundedNextUrl='{{$our_funded_projects->nextPageUrl()}}';
	  var $our_projects = $(".our_project_item");
 		
		function our_project_item(item){
			return `
                <div class='col-lg-4 pb-30 m-2 onscroll-load past_project_item border'>
					<div class='single-carusel row align-items-center'>
						<div class='detials col-12 col-md-12'>
							<h4> 
 								${item.proj_name}
							</h4>
							</a>
							<p>
								${item.details}
							</p>
							<br>
						</div>
					</div>
				</div>
			   `;
		}

	  $(".load-more-proj-our").click(function() {
	      $.get(ourFundedNextUrl, function(response) {
			ourFundedNextUrl=response.ourFundedNextUrl;
			if(response.our_funded_projects.data!=null){
				var htm='';
				$.each(response.our_funded_projects.data,function(key,our_project){
					htm+=our_project_item(our_project);
				});
				// console.log(htm);
			}
			if(ourFundedNextUrl==null){
				$('.load-more-proj-our').remove();
			}else{
				$('.load-more-proj-our').removeClass('d-none');
			}

	           $our_projects.after(htm);

	      });
	  });
	//end Our Funded projects
	
</script>
@endsection