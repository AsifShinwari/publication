@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							Mentor's Post
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Mentor's Post</p>
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
								<h1 class="mb-10">Mentor's Post</h1>
								<p>Mentors make a difference in our lives by making our goals and interests become reality. They help us to reach our ultimate potential.</p>
							</div>
						</div>
					</div>
					<div class="row align-items-center">
						@foreach($data as $item)
						<div class='col-lg-6 pb-30 onscroll-load-mentor-post post_item'>
							<div class='single-carusel row align-items-center'>
								<div class='col-12 col-md-6 thumb'>
									<img class='img-fluid' src="{{asset('storage/'.$item->image)}}">
								</div>
								<div class='detials col-12 col-md-6'>
									<a href="{{route('front.resources.mentor.single.post',$item->id)}}"><h4>{{$item->title}}</h4></a>
									<p>{{$item->mentor_name}}</p><br>
									<p>
										<p>{{substr($item->details,0,160)}} @if(strlen($item->details) > 160) ... @endif
									</p>
									<br>
									<a href="{{route('front.resources.mentor.single.post',$item->id)}}" class='genric-btn primary small'>Explore</a>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
					
					<div class="row">
						<button class="load-more-mentor-post text-uppercase primary-btn mx-auto mt-40">Load more Posts</button>
					</div>		
				</div>	
					
			</section>
			<!-- End events-list Area -->
	
@endsection

@section('manual_scripts')
<script>
	// current projects
	  var nextUrl='{{$data->nextPageUrl()}}';
	  var $posts = $(".post_item");
 		
		function postItem(item){
			return `
				<div class='col-lg-6 pb-30 onscroll-load-mentor-post post_item'>
					<div class='single-carusel row align-items-center'>
						<div class='col-12 col-md-6 thumb'>
							<img class='img-fluid' src="{{asset('storage/')}}/${item.image}">
						</div>
						<div class='detials col-12 col-md-6'>
							<a href="{{route('front.resources.mentor.single.post')}}/${item.id}"><h4>${item.title}</h4></a>
							<p>${item.mentor_name}</p><br>
							<p>
								<p>${item.details.substring(0,160)}
							</p>
							<br>
							<a href="{{route('front.resources.mentor.single.post')}}/${item.id}" class='genric-btn primary small'>Explore</a>
						</div>
					</div>
				</div>
			   `;
		}

	  $(".load-more-mentor-post").click(function() {
	      $.get(nextUrl, function(response) {
			nextUrl=response.nextUrl;
			if(response.data.data!=null){
				var htm='';
				$.each(response.data.data,function(key,post_item){
					htm+=postItem(post_item);
				});
				// console.log(htm);
			}
			if(nextUrl==null){
				$('.load-more-mentor-post').remove();
			}else{
				$('.load-more-mentor-post').removeClass('d-none');
			}

	           $posts.after(htm);
	      });
	  });
	//end current projects
	
</script>
@endsection