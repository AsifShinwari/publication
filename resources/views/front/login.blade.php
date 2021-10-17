@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
							Login		
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span> Login</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

		<!-- Start contact-page Area -->
		<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
					
						<div class="col-lg-12">
							<form class="form-area contact-form" name="login" action="{{route('front.login.post')}}" method="post">
							
								@csrf
								<div class="row">	
									
									<div class="col-lg-6 form-group center-content">
										<input name="email"  id="loginemail" placeholder="Email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Email address'" class="common-input mb-20 form-control" required="" type="email">
									</div>
								</div>
								<div class="row">
									
									<div class="col-lg-6 form-group center-content">
										<input name="password" id="loginpassword"  placeholder="Password" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Password'" class="common-input mb-20 form-control" required="" type="password">
									</div>

									@error('email') <span class="text-danger">{{$message}}</span> @enderror
								</div>
									<div class="col-lg-6 form-group center-content">
										<a href="#">Forget Password? </a>
									</div>
									
									<div class="col-lg-6 center-content">
										<div class="alert-msg" style="text-align: left;"></div>
										<button name="submit" class="genric-btn primary" style="float: left;">Login</button>											
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