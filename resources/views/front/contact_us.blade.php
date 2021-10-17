@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Contact Us</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
@if(session()->has('success'))
    <div class="alert alert-success m-2">
        {{session('success')}}
    </div>
@endif

            <!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Editorial Office</h5>
									<p>
										{!!$general_info->office_address!!}
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>{{$general_info->email}}</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							<form class="form-area contact-form text-" id=""  action="{{route('front.contact.us.store')}}" method="post">
							@csrf	
                            <div class="row">	
									<div class="col-lg-12 form-group">
										<select name="subject" >
											<option value="">Select your Subject</option>
											
											<option value="General Queries">General Queries</option>
											<option value="Regarding Patent Application">Regarding Patent Application</option>
											<option value="Regarding Funding and Investment">Regarding Funding and Investment</option>
											<option value="Regarding Event Sponsorship">Regarding Event Sponsorship</option>	
											<option value="Regarding Publication">Regarding Publication</option>	
											<option value="Regarding Mentoring">Regarding Mentoring</option>							  
										</select>
                                        @error('subject') <span class="text-danger">{{$message}}</span> @enderror
                                        <br>
										</div>
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
									
										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
                                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
										
										<input name="phone" placeholder="Enter your Phone No." onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter your Phone No.'" class="common-input mb-20 form-control" required="" type="text">
										
										
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Enter Messege'" required=""></textarea>				
									</div>
									<div id="success"> </div> <!-- For success/fail messages -->
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										
										<button class="genric-btn primary" type="submit" style="float: right;">Send Message</button>											
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

</script>
@endsection