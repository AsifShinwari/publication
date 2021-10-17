@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Profile
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>Profile</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

@if ($errors->any())
    <div class="alert alert-danger m-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success m-2">
        {{session('success')}}
    </div>
@endif

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
	<div class="container">
		<div class="single-post single-post-custom row">
		<form class="form-area contact-form" id="profileform" action="{{route('front.profile.company.update')}}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" value="{{$info->id}}" name="info_id">
			<div class="col-lg-12">
			<span class="profile-name">{{$info->company_name}}<br><br></span>
			<hr>
				
				<h3>Introduction<br><br></h3>
				
					<div class="row">
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">First Name</label>
							<input name="first_name" placeholder="First Name *"  class="common-input  form-control" required="" type="text" value="{{$info->first_name}}">
						</div>
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Last Name</label>
							<input name="last_name" placeholder="Last Name *"  class="common-input  form-control" required="" type="text"  value="{{$info->last_name}}">
						</div>	
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Email</label>
							<input readonly name="email"  placeholder="Email address *" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"  class="common-input  form-control" required="" type="email"  value="{{$info->email}}">
						</div>
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Phone Number</label>
							<input name="phone" placeholder="Phone Number *"  class="common-input  form-control" required="" type="text"   value="{{$info->phone}}">
						</div>
						<div class="col-lg-9 form-group">
							<label class="custom-small-label">You Position In Company</label>
							<input name="introduction" placeholder="Introduction"  class="common-input  form-control" type="text" value="{{$info->position}}">
						</div>
						
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Country</label>
							<div class="control-group">
									<div class="common-input  ">
									<select name="country" id="country">
										<option value="">Select your Country</option>
										@foreach($countries as $item)
											<option value="{{$item->id}}" @if($info->country_id==$item->id) selected @endif >{{$item->name}}</option>
										@endforeach
									</select>
								   </div>
								</div>
						</div>
						
					</div>	
					
						
						<div class="col-lg-12 button-screenfix">
							<button id="edit-profile" class="genric-btn primary" style="float: right;">Edit Profile</button>											
							<button id="submit-profile" name="submit" class="genric-btn primary d-none" style="float: right;">Save Changes</button>									
						</div>
					</div>
				</form>	
			</div>
			
								</div>
	</div>	
</section>
<!-- End contact-page Area -->

@endsection

@section('manual_scripts')
    <script>
		$('#edit-profile').click(function(){
			edit_profile();
		});
		function edit_profile(){
			$('#profilepic').removeClass('d-none');
		}
	</script>
@endsection