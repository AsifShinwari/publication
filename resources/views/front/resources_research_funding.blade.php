@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
                                Research Funding
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Research Funding</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start info Area -->
            <section class="info-area pb-120 pt-120">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6 no-padding info-area-left">
							<img class="img-fluid" src="{{asset('storage/'.$page_data->image)}}" alt="">
						</div>
						<div class="col-lg-6 info-area-right">
							<h1>Research Funding</h1>
							<p class="justifytext">{{$page_data->message}}</p>
						</div>
					</div>
					
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 pt-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Apply for Research Funding</h1>
								<p>Do you require any fund assistance for your research? Check in here. </p>
								<a href="{{route('front.contact.us.index')}}" class="text-uppercase primary-btn mx-auto mt-40">Research Funding Application</a>	
							</div>
						</div>
					</div>
					
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 pt-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Are you Investor? Looking to Invest?</h1>
								<p>Know what you choose and know why you choose it. CIIR helps you to invest in the right project. </p>
								<a href="{{route('front.contact.us.index')}}" class="text-uppercase primary-btn mx-auto mt-40">Investor Application</a>	
							</div>
						</div>
					</div>
					
				</div>	
			</section>
			<!-- End info Area -->		
			
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