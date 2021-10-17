 @extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							
 									@if($event_type=='CommingEvents')
 										Upcoming Events
									 @elseif($event_type=='PastEvents')
 										Past Events
									 @endif
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('front.events','CommingEvents')}}"> Events</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					
					<div class="row align-items-start" id="events">
						@foreach($events as $item)
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
	
@endsection

@section('manual_scripts')
<script>
	  var eventsNextPageUrl='{{$events->nextPageUrl()}}';
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
								{{substr($item->description,0,105)}}
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
			if(response.events.data!=null){
				var htm='';
				$.each(response.events.data,function(key,event_item){
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