@extends('front.layout.master')
 
 @section('contents')
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
                                Mentor Profile
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span> Mentor Profile</p>
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
					<div class="row">
						<div class="col-lg-12">
							<form class="form-area contact-form" action="{{route('front.profile.mentor.update')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" value="{{$info->id}}" name="info_id">
                                <div class="row">
                                    <div class="col-lg-12  form-group">
                                    <img @if($info->image!=null) src="{{asset('storage/'.$info->image)}}" @else src="{{asset('front_assets/img/default.png')}}" @endif class="img-responsive" alt="Profile Image" width="150px">
									  <br>
                                        <label for="image">Image</label>
									  <input type="file" name="image" />
									</div>

									<div class="col-lg-6 form-group">
                                        <label for="name" class="mb-0">Name</label>
										<input name="name" value="{{$info->name}}" placeholder="First Name *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'First Name *'" class="common-input mb-20 form-control" required="" type="text">
										@error('name') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
                                        <label for="last_name" class="mb-0">Last-Name</label>
										<input name="last_name" value="{{$info->last_name}}" placeholder="Last Name *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Last Name *'" class="common-input mb-20 form-control" required="" type="text">
										@error('last_name') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="email" class="mb-0">Email</label>
										<input name="email" disabled value="{{$info->email}}" placeholder="Email address *" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Email address *'" class="common-input mb-20 form-control" required="" type="email">
										@error('email') <span class="text-danger">{{$message}}</span> @enderror
										<span id='emailstatus'></span>
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="qualification" class="mb-0">Qualification</label>
										<input name="qualification" value="{{$info->qualification}}" placeholder="Professional Title *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Professional Title *'" class="common-input mb-20 form-control" required="" type="text">
										@error('qualification') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="address" class="mb-0">Address</label>
										<input name="address" value="{{$info->address}}" placeholder="Address *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Address *'" class="common-input mb-20 form-control" required="" type="text">
										@error('address') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
										<div class="control-group">
												<div class="common-input mb-20">
                                                <label for="country" class="mb-0">Country</label>
												<select name="country" id="country_id" required class="common-input mb-20" style="width:100%">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $item)
                                                        <option value="{{$item->id}}" @if($info->country_id==$item->id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
												@error('country') <span class="text-danger">{{$message}}</span> @enderror
											   </div>
											</div>
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="skills" class="mb-0">Skills</label>
										<input name="skills" value="{{$info->skills}}" placeholder="Skills *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Skills *'" class="common-input mb-20 form-control" required="" type="text">
										@error('skills') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="profile_url" class="mb-0">Profile-Url</label>
										<input name="profile_url" value="{{$info->profile_url}}" placeholder="URL (links to any of your websites or social network profiles)" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'URL (links to any of your websites or social network profiles)'" class="common-input mb-20 form-control" type="text">
										@error('profile_url') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="education" class="mb-0">Education</label>
										<input name="education" value="{{$info->education}}" placeholder="Education *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Education *'" class="common-input mb-20 form-control" required="" type="text">
										@error('education') <span class="text-danger">{{$message}}</span> @enderror
									</div>
									<div class="col-lg-6 form-group">
                                    <label for="experience" class="mb-0">Experience</label>
										<input name="experience" value="{{$info->experience}}" placeholder="Experience *" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Experience *'" class="common-input mb-20 form-control" required="" type="text">
										@error('experience') <span class="text-danger">{{$message}}</span> @enderror
									</div>
                                   
									<div class="col-lg-6  form-group">
									  <label for="resumee">Resume</label>
									  <input type="file" name="resumee" />
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button name="submit" class="genric-btn primary" style="float: right;">Submit</button>											
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
	
@endsection