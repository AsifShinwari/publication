@php
	$general_info=DB::table('general_info')->orderBy('id','desc')->first();
@endphp
		<header id="header" id="home">
	  		
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="{{route('/')}}"><img src="{{asset('storage/'.$general_info->app_logo)}}" alt="" title="" height="85px" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="{{route('/')}}">Home</a></li>
			            
					 {{-- <li><a href="{{route('front.publication.index')}}">Publication</a></li> --}}
					  <li><a href="{{route('front.publication.filter')}}?search=&publication_type%5B%5D=6">Book</a></li>  
					  <li><a href="{{route('front.publication.filter')}}?search=&publication_type%5B%5D=5">Conference Series</a></li>  
					  {{--<li><a href="{{route('front.publication.filter')}}?search=&publication_type%5B%5D=4">Journal</a></li>--}}  
					  <li><a href="{{route('front.contact.us.index')}}">Contact</a></li>
					 @if(!auth()->user()) 
					  <li class="menu-has-children"><a href="#">Join  <span class="lnr lnr-user"></span></a>
			            <ul>
						  
						    
							  <li><a href="{{route('front.individual.join')}}">Join as Individual</a></li>
							  <li><a href="{{route('front.company.join.post')}}">Join as Institution/Company</a></li>
							  <li><a href="{{route('front.mentor.join')}}">Join as Mentor</a></li>
							  <li><a href="{{route('front.show.login')}}">Login</a></li>
						 </ul>
			          </li>
					@else
						<li class="menu-has-children"><a href="#"> <span class="lnr lnr-user"></span></a>
			             <ul>
						  	@if(auth()->user()->type=='Individual')
							  <li><a href="{{route('front.profile.individual')}}">Profile</a></li>
							@elseif(auth()->user()->type=='Company')
							  <li><a href="{{route('front.profile.company')}}">Profile</a></li>
							@elseif(auth()->user()->type=='Mentor')
							  <li><a href="{{route('front.profile.mentor')}}">Profile</a></li>
							@endif
							  <li><a href="{{route('front.logout')}}">Logout</a></li>
						 </ul>
			          	</li>
					@endif
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		</header><!-- #header -->