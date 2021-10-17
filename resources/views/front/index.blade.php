 @extends('front.layout.master')
 
 @section('contents')
  <!-- start banner Area -->
            <section class="banner-area relative" style="background-image:url('{{asset('storage/'.$home_page->banner_image)}}')" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								{{$home_page->banner_title}}			
							</h1>
							<p class="pt-10 pb-10">
                                {{substr($home_page->banner_subtitle,0,49)}} <br>
                                {{substr($home_page->banner_subtitle,49)}}
							</p>
							<a href="{{route('front.individual.join')}}" class="primary-btn text-uppercase">Get Started</a>
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{$home_page->banner_card_title1}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
										{{$home_page->banner_card1}} 
									</p>
									<a href="{{route('front.company.join')}}">Join Now</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{$home_page->banner_card_title2}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
										{{$home_page->banner_card2}} 
									</p>
									<a href="{{route('front.events','CommingEvents')}}">Find Events</a>									
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-feature">
								<div class="title">
									<h4>{{$home_page->banner_card_title3}}</h4>
								</div>
								<div class="desc-wrap">
									<p>
										{{$home_page->banner_card3}}
									</p>
									<a href="{{route('front.publication.index')}}">Explore</a>								
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
					
			
			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Upcoming Events</h1>
								<p>Sneak a look on forthcoming events.</p>
							</div>
						</div>
					</div>
					<div class="row align-items-start" id="events">
						@foreach($comming_events as $item)
						<div class='col-lg-4 pb-30 onscroll-load event-item'>
							<div class='single-carusel row align-items-center'>
								<div class='detials col-12 col-md-12'>
									<a href="{{route('front.single.event',$item->id)}}">
									<h4> 
 										{{$item->title}}
									</h4>
									</a>
									<p>{{date('d-M-Y h:i A',strtotime($item->start_date))}} - {{date('d-M-Y h:i A',strtotime($item->end_date))}}</p><br>
									<p>
										{{substr($item->description,0,105)}}
									</p>
									<br>
									<a href="{{route('front.single.event',$item->id)}}" class='genric-btn primary small'>Explore</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">
						<button type="button" class="see-more-events text-uppercase primary-btn mx-auto mt-40">View more Events</button>
					</div>
				</div>	
					
			</section>
			<!-- End events-list Area -->
 			@php 
 				$m_img='storage/'.$home_page->mentor_banner_image;
			@endphp
			<!-- Start cta-one Area -->
			<section class="cta-one-area relative section-gap" style="background-image:url('{{asset($m_img)}}')">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">{{$home_page->mentor_title_message}}</h1>
							<p>
								{{$home_page->mentor_message}} 
							</p>
							<a class="primary-btn wh" href="{{route('front.mentor.join')}}">Join as Mentor</a>								
						</div>					
					</div>
				</div>	
			</section>
			<!-- End cta-one Area -->
			
		

            <!-- Start popular-course Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Mentor's Posts</h1>
								<p>A mentor is someone who allows you to see the hope inside yourself.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">
						
						@foreach($mentor_posts as $item)
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
										<img class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="Post Image">
									</div>
																		
								</div>
								<div class="details">
									<a href="{{route('front.resources.mentor.single.post',$item->id)}}">
										<h4>
											{{$item->title}}										
										</h4>
									</a>
									<p>
										<p>{{substr($item->details,0,160)}} @if(strlen($item->details) > 160) ... @endif</p>
								</div>
							</div>	
							@endforeach
							
							
											
						</div>
					</div>
					
						<div class="row event-page-lists align-items-center">
							<a href="{{route('front.resources.mentor.posts.index')}}" class="text-uppercase primary-btn mx-auto mt-40">View More Posts</a>
						</div>
				</div>	
			</section>
			<!-- End popular-course Area -->	

            <!-- Start popular-course Area -->
			<section class="popular-course-area section-gap" style="background-color: #063453;">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Our Partners</h1>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-popular-carusel">
						
						@foreach($our_partners as $item)
							<div class="single-popular-carusel">
								<div class="thumb-wrap relative m-0">
									<div class="thumb relative rounded-circle m-0" style="width:180px;height:180px;">
										<div class="overlay overlay-bg"></div>	
										<img class="img-flui rounded-circle" style="width:180px;height:180px;" src="{{asset('storage/'.$item->logo)}}" alt="Post Image">
									</div>
																		
								</div>
								<div class="details">
										<h4 class="text-center text-white" style="width:180px;">
											{{$item->name}}										
										</h4>
								</div>
							</div>	
							@endforeach
							
							
											
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-course Area -->	

@endsection

@section('manual_scripts')
<script>
	  var eventsNextPageUrl='{{$comming_events->nextPageUrl()}}';
	  var $posts = $("#events");
 		
		function event_single_item(event_item){
			return `
			   	<div class='col-lg-4 pb-30 onscroll-load'>
					<div class='single-carusel row align-items-center'>
						<div class='detials col-12 col-md-12'>
							<a href="{{route('front.single.event')}}/${event_item.id}">
							<h4> 
								${event_item.title}
							</h4>
							</a>
							<p>${event_item.start_date} - ${event_item.end_date}</p><br>
							<p>
							
								${event_item.description}
							</p>
							<br>
							<a href="{{route('front.single.event')}}/${event_item.id}" class='genric-btn primary small'>Explore</a>
						</div>
					</div>
				</div>
			   `;
		}

	  $(".see-more-events").click(function() {
	      $.get(eventsNextPageUrl, function(response) {
			eventsNextPageUrl=response.nextUrl;
			if(response.comming_events.data!=null){
				var htm='';
				$.each(response.comming_events.data,function(key,event_item){
					htm+=event_single_item(event_item);
				});
				// console.log(htm);
			}
			if(eventsNextPageUrl==null){
				$('.see-more-events').remove();
			}

	           $posts.append(htm);
	      });
	  });
	
</script>
@endsection