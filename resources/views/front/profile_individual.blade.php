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
		<form class="form-area contact-form" id="profileform" action="{{route('front.profile.update')}}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" value="{{$info->id}}" name="info_id">
			<div class="col-lg-12">
			<img @if($info->image!=null) src="{{asset('storage/'.$info->image)}}" @else src="{{asset('front_assets/img/default.png')}}" @endif class="img-responsive" alt="Profile Image" width="150px">
			<span class="profile-name">{{$info->first_name}} {{$info->last_name}}<br><br></span>
			
			
			<hr>
			
				
				<!-- Profile Picture change -->
				<div class="col-lg-4 d-none" id="profilepic">
					Image:	<input name="profilepic" type="file" class="" /><br><br>
				</div>
				<!-- End: Profile Picture change -->
				
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
							<label class="custom-small-label">Introduction</label>
							<input name="introduction" placeholder="Introduction"  class="common-input  form-control" type="text" value="{{$info->introduction}}">
						</div>
						<div class="col-lg-3 form-group">									
							<label class="custom-small-label">Gender</label>
							<div class="control-group">
								<div class="common-input  ">
								<select name="gender">
									<option value="">Select your Gender</option>
									<option value="Male" @if($info->gender=="Male") selected @endif >Male</option>
									<option value="Female" @if($info->gender=="Female") selected @endif >Female</option>
								</select>
								</div>
							</div>
						</div>
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">City</label>
							<input name="city" placeholder="City" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'City'" class="common-input  form-control" type="text" value="{{$info->city}}">
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
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Present Designation</label>
							<input name="designation" placeholder="Present Designation"  class="common-input  form-control" type="text"  value="{{$info->designation}}">
						</div>
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Present Institition/Company</label>
							<input name="company" placeholder="Present Institition/Company"  class="common-input  form-control" type="text"  value="{{$info->company}}">
						</div>
						
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Educational Qualification</label>
							<input name="education" placeholder="Educational Qualification"  class="common-input  form-control" type="text" value="{{$info->education}}">
						</div>
						<div class="col-lg-6 form-group">
							<label class="custom-small-label">Languages Known</label>
							<input name="languages" placeholder="Languages Known"  class="common-input  form-control" type="text" value="{{$info->languages}}">
						</div>
						<div class="col-lg-12 form-group">
							<label class="custom-small-label">Skills</label>
							<input name="skills" placeholder="Skills"  class="common-input  form-control" type="text" value="{{$info->skills}}">
						</div>									
						
						<div class="col-lg-12 form-group">
							<label class="custom-small-label">Involvement with Communities</label>
							<input name="involvement_with_communities" placeholder="Involvement with Communities"  class="common-input  form-control" type="text" value="{{$info->involvement_with_communities}}">
						</div>
						
					</div>	
					
					
				{{--	<!-- Licenses & Certificates -->
					<h3><br>Licenses & Certificates <br><br></h3>								
						<div class="row lic-cert">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-lic-cert" class="genric-btn primary custom-small-btn add-button add-button"> + Add License/Certificate </button>	
							</div>
						</div>
						
						<!-- End Licenses & Certificates -->
						
						
						
						<!-- Volunteer Experience -->
						
						<h3><br><br>Volunteer Experience <br><br></h3>	
						
													
						<div class="row vol-exp">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-vol-exp" class="genric-btn primary custom-small-btn add-button"> + Add Volunteer Experience </button>	
							</div>
						</div>
						<!-- End Volunteer Experience -->
						
						
						
						<!-- Publication -->
						
						<h3><br><br>Publications<br><br></h3>	
						
													
						<div class="row usr-pub">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-usr-pub" class="genric-btn primary custom-small-btn add-button"> + Add Publication </button>	
							</div>
						</div>
						<!-- End Publication -->
						
						
						
						
						<!-- Patent -->
						
						<h3><br><br>Patents<br><br></h3>	
						
													
						<div class="row usr-pat">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-usr-pat" class="genric-btn primary custom-small-btn add-button"> + Add Patent </button>	
							</div>
						</div>
						<!-- End Patent -->
						
						
						<!-- Courses -->
						
						<h3><br><br>Additional Courses<br><br></h3>	
						
													
						<div class="row usr-cour">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-usr-cour" class="genric-btn primary custom-small-btn add-button"> + Add Course </button>	
							</div>
						</div>
						<!-- End Courses -->
						
						
						<!-- Project -->
						
						<h3><br><br>Projects<br><br></h3>	
						
													
						<div class="row usr-proj">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-usr-proj" class="genric-btn primary custom-small-btn add-button"> + Add Project </button>	
							</div>
						</div>
						<!-- End Project -->
						
						
						<!-- Honor and Awards -->
						
						<h3><br><br>Honors and Awards<br><br></h3>	
						
													
						<div class="row usr-hon">
						</div>
															No information to show<br><br>									
						<div class="row">
							<div class="col-lg-12"> 
								<button id="add-usr-hon" class="genric-btn primary custom-small-btn add-button"> + Add Honor/Award </button>	
							</div>
						</div>
						<!---- End Honor and Awards -->
						--}}
						
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