@extends('front.layout.master')
 
@section('contents') 

	        <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Submit Manuscript				
							</h1>	
							<p class="text-white link-nav"><a href="{{route('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  Submit Manuscript</p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
    <div class="container py-4">
        <form action="{{route('front.manuscript.store',$journal->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="journal_id" value="{{$journal->id}}">
        <div class="row">
            @if(session()->has('success'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
            @endif
            <div class="col-12">
                <h4>Submit Your Article</h4>
                <h5>Journal : {{$journal->title}}</h5>
            </div>
           
            <div class="col-md-6 pt-2">
                <label for="author" class="mb-0">Author</label>
                <input type="text" name="author" class="form-control"
                placeholder="Enter author">
                @error('author') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-md-6 pt-2">
                <label for="email" class="mb-0">Email</label>
                <input type="text" name="email" class="form-control"
                placeholder="enter your email address">
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="col-sm-12 pt-2">
                <label for="title" class="mb-0">Title</label>
                <textarea type="text" name="title" class="form-control"
                placeholder="Enter title" required></textarea>
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-12 pt-2">
                <label for="abrstact" class="mb-0">Abrstact</label>
                <textarea type="text" rows="5" name="abrstact" class="form-control"
                placeholder="Enter abrstact" required></textarea>
                @error('abrstact') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="keywords" class="mb-0">Keywords</label>
                <input type="text" name="keywords" class="form-control"
                placeholder="enter keywords">
                @error('keywords') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="file" class="mb-0">PDF File</label>
                <input type="file" name="file" class="form-control">
                @error('file') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-save"></i>   Submit
                </button>
            </div>
        </div>
        </form>
    </div>
			
					
@endsection

@section('manual_scripts')
<script>

</script>
@endsection