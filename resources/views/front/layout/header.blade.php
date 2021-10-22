@php
	$general_info=DB::table('general_info')->orderBy('id','desc')->first();
@endphp
		<header id="header" id="home">
	  		
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="{{route('/')}}"><img src="{{asset('storage/'.$general_info->app_logo)}}" alt="" title="" height="85px" width="250px" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="{{route('/')}}">Home</a></li>
			          <li class="menu-has-children"><a href="#">About</a>
			            <ul>
			              <li><a href="{{route('front.about.us.index')}}">About Us</a></li>
			              <li><a href="{{route('front.about.tie.up')}}">Tie-up Institution</a></li>
						  <li><a href="{{route('front.about.report')}}">Report</a></li>
			            </ul>
			          </li>	
			          <li><a href="{{route('front.journals.index')}}">Journals</a></li>

					  @php $current=DB::table('conferences')->where('year','>=',date('Y-m-d'))->get(); 
					  $past=DB::table('conferences')->where('year','<',date('Y-m-d'))->get();  @endphp

					  <li class="menu-has-children"><a href="#">Conferences</a>
					  	<ul>
						 @foreach($current as $item)			              
			              <li><a href="{{route('front.conference.single',$item->id)}}">{{date('Y',strtotime($item->year))}} | {{substr($item->title,0,50)}}</a></li>
						 @endforeach
			              <li class="menu-has-children"><a href="#">Past Conferences</a>
							<ul>
								@foreach($past as $past_con)
								<li><a href="{{route('front.conference.single',$past_con->id)}}">{{date('Y',strtotime($past_con->year))}} | {{substr($past_con->title,0,50)}}</a></li>
								@endforeach
							</ul>
						  </li>
						  	
			            </ul>
					  </li>  

					 
					  
					  <li><a href="{{route('front.publication.index')}}">Publication</a></li>  
					  <li><a href="{{route('stripe')}}">Payment</a></li>
					{{--
					  <li><a href="{{route('front.research.dev.index')}}">R &amp; D</a></li>
			          <li><a href="{{route('front.advisory.board.index')}}">Advisory Board</a></li>
			             
					  <li class="menu-has-children"><a href="#">Events</a>
			            <ul>			              
			              <li><a href="{{route('front.events','CommingEvents')}}">Upcoming Events</a></li>
						  <li><a href="{{route('front.events','PastEvents')}}">Past Events</a></li>
						  <li><a href="{{route('front.post.event')}}">Post your Event</a></li>
			            </ul>
						
			          </li>	--}}
					  <li class="menu-has-children"><a href="#">Resources</a>
			            <ul>			              
			              <li><a href="{{route('front.resources.research.funding.index')}}">Research Funding</a></li>
						  <li><a href="{{route('front.resources.entrepreneurship.development.index')}}">Entrepreneurship Development</a></li>
						  {{--<li><a href="{{route('front.resources.event.sponsership.index')}}">Event Sponsorship</a></li>
						  <li><a href="{{route('front.resources.patent.index')}}">Patent</a></li>
						  
						  <li><a href="{{route('front.resources.mentor.posts.index')}}">Mentor's Posts</a></li>--}}
						  <!-- <li><a href="plagiarism-checker.html">Plagiarism Checker</a></li> -->
			            </ul>
			          </li>	
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