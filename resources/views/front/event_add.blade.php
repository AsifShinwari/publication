@extends('front.layout.master')
 
@section('contents') 
 			<!-- start banner Area -->
             <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Events				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('front.events','CommingEvents')}}"> Events</a>   <span class="lnr lnr-arrow-right"></span> Add New Event</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start event-details Area -->
			<section class="event-details-area section-gap">
				<div class="container">
					<div class="row">
					<form action="{{route('front.post.event.store')}}" method="post">
						@csrf
        				<div class="row">
							@if(session()->has('success'))
							<div class="col-sm-12">
								<div class="alert alert-success">
									{{session('success')}}
								</div>
							</div>
							@endif
        				    <div class="col-6 pt-2">
        				        <label for="title" class="mb-0">Event Name </label>
        				        <input type="text" name="title" class="form-control"
        				        placeholder="Enter Event Name" required>
        				        @error('title') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-6 pt-2">
        				        <label for="event_type" class="mb-0">Event Type </label>
        				        <select name="event_type" class="form-control" required>
        				            <option value="">Select Event Type</option>
        				            <option value="Conference">Conference</option>
        				            <option value="Seminar">Seminar</option>
        				            <option value="Workshop">Workshop</option>
        				            <option value="Webinar">Webinar</option>
        				            <option value="Continuing Professional Development">Continuing Professional Development</option>
        				            <option value="Online Conference">Online Conference</option>
        				            <option value="Faculty Development Program">Faculty Development Program</option>
        				            <option value="Placement">Placement</option>
        				            <option value="Cultural">Cultural</option>
        				        </select>
        				        @error('event_type') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="category" class="mb-0">Event Category</label>
        				        <input type="text" name="category" class="form-control"
        				        placeholder="Enter Event Category" required>
        				        @error('category') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="topic" class="mb-0">Event Topic</label>
        				        <input type="text" name="topic" class="form-control"
        				        placeholder="Enter Event Topic" required>
        				        @error('topic') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="province" class="mb-0">State/Province</label>
        				        <input type="text" name="province" class="form-control"
        				        placeholder="Enter State or Province" required>
        				        @error('province') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="city" class="mb-0">City</label>
        				        <input type="text" name="city" class="form-control"
        				        placeholder="Enter City" required>
        				        @error('city') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-6 pt-2">
        				        <label for="country_id" class="mb-0">Country </label>
        				        <select name="country_id" class="form-control" required>
        				            <option value="">Select Country</option>
        				            @foreach($countries  as $item)
        				                <option value="{{$item->id}}">{{$item->name}}</option>
        				            @endforeach
        				        </select>
        				        @error('country_id') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="organizer" class="mb-0">Organizing Society</label>
        				        <input type="text" name="organizer" required
        				         class="form-control" placeholder="Organizing Society">
        				         @error('organizer') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="contact_person" class="mb-0">Contact Person</label>
        				        <input type="text" name="contact_person" required
        				         class="form-control" placeholder="Contact Person">
        				         @error('contact_person') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="email" class="mb-0">Enquiry Email Address</label>
        				        <input type="text" name="email" required
        				         class="form-control" placeholder="Enter Email Address">
        				         @error('email') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="phone" class="mb-0">Enquiry Phone</label>
        				        <input type="text" name="phone" required
        				         class="form-control" placeholder="Enter Enquiry Phone">
        				         @error('phone') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="website" class="mb-0">Event Website</label>
        				        <input type="text" name="website"
        				         class="form-control" placeholder="Enter Event Website">
        				         @error('website') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="description" class="mb-0">Description</label>
        				        <textarea name="description" class="form-control"></textarea>
        				        @error('description') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="keywords" class="mb-0">Keywords</label>
        				        <input type="text" name="keywords"
        				         class="form-control" placeholder="Enter Keywords">
        				         @error('keywords') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="start_date" class="mb-0">Start Date</label>
        				        <input type="datetime-local" name="start_date" class="form-control" required>
        				        @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="end_date" class="mb-0">End Date</label>
        				        <input type="datetime-local" name="end_date" class="form-control" required>
        				        @error('end_date') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>
        				    <div class="col-sm-6 pt-2">
        				        <label for="deadline_reg_date" class="mb-0">Deadline For Registration</label>
        				        <input type="datetime-local" name="deadline_reg_date" class="form-control" required>
        				        @error('deadline_reg_date') <span class="text-danger">{{$message}}</span> @enderror
        				    </div>

        					    <div class="col-sm-12 pt-3 border-bottom">
        					    </div>
        					    <div class="col-sm-12 pt-1">
        					        <button type="submit" class="primary-btn text-uppercase">
        					            <i class="fa fa-save"></i>    Save
        					        </button>
        					    </div>
        					</div>
        					</form>
					</div>
				</div>	
			</section>
			<!-- End event-details Area -->

	
				
@endsection

@section('manual_scripts')
<script>

</script>
@endsection