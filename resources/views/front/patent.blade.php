@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							Patent				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Patent  </p>
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
							<img class="img-fluid" src="{{asset('storage/'.$data->image)}}" alt="">
						</div>
						<div class="col-lg-6 info-area-right">
							<h1>Patent Service</h1>
							<p class="justifytext">{{$data->message}}</p>
						</div>
					</div>
					
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 pt-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Apply for Patent</h1>
								<p>It's easy to be safe. Need service in patenting your invention? Get expert support here.
</p>
								<a href="{{route('front.contact.us.index')}}" class="text-uppercase primary-btn mx-auto mt-40">File Patent Application</a>	
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
								<h1 class="mb-10">Our Patent Projects</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>
					<div class="row align-items-center" id="our_projects">
					    @foreach($patent_projects as $item)
						<div class='col-lg-4 pb-30 onscroll-load our_project_item'>
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
	var ourFundedNextUrl='{{$patent_projects->nextPageUrl()}}';
	  var $our_projects = $(".our_project_item");
 		
		function our_project_item(item){
			return `
                <div class='col-lg-4 pb-30 onscroll-load our_project_item'>
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
			ourFundedNextUrl=response.nextUrl;
			if(response.patent_projects.data!=null){
				var htm='';
				$.each(response.patent_projects.data,function(key,our_project){
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