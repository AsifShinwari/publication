<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Add New Event</h5>
            </div>
        </div>
        <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6 pt-2">
                <label for="title" class="mb-0">Event Name </label>
                <input type="text" name="title" class="form-control"
                placeholder="Enter Event Name">
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="event_type" class="mb-0">Event Type </label>
                <select name="event_type" class="form-control">
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
                placeholder="Enter Event Category">
                @error('category') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="topic" class="mb-0">Event Topic</label>
                <input type="text" name="topic" class="form-control"
                placeholder="Enter Event Topic">
                @error('topic') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="province" class="mb-0">State/Province</label>
                <input type="text" name="province" class="form-control"
                placeholder="Enter State or Province">
                @error('province') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="city" class="mb-0">City</label>
                <input type="text" name="city" class="form-control"
                placeholder="Enter City">
                @error('city') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="country_id" class="mb-0">Country </label>
                <select name="country_id" class="form-control">
                    <option value="">Select Country</option>
                    @foreach($countries  as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('country_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="organizer" class="mb-0">Organizing Society</label>
                <input type="text" name="organizer"
                 class="form-control" placeholder="Organizing Society">
                 @error('organizer') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="contact_person" class="mb-0">Contact Person</label>
                <input type="text" name="contact_person"
                 class="form-control" placeholder="Contact Person">
                 @error('contact_person') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="email" class="mb-0">Enquiry Email Address</label>
                <input type="text" name="email"
                 class="form-control" placeholder="Enter Email Address">
                 @error('email') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="phone" class="mb-0">Enquiry Phone</label>
                <input type="text" name="phone"
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
                <input type="datetime-local" name="start_date" class="form-control">
                @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="end_date" class="mb-0">End Date</label>
                <input type="datetime-local" name="end_date" class="form-control">
                @error('end_date') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="deadline_reg_date" class="mb-0">Deadline For Registration</label>
                <input type="datetime-local" name="deadline_reg_date" class="form-control">
                @error('deadline_reg_date') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                
                <a href="{{route('backend.events')}}" class="btn btn-success">
                    <i class="fa fa-arrow-left"></i> Go Back
                </a>
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-save"></i>    Save
                </button>
            </div>
        </div>
        </form>
    </div>

    
@section('manual_scripts')
    <script>
           document.addEventListener('DOMContentLoaded', () => { 
            this.livewire.on('message', data => {
                toastr[data.type](data.title);
            }) ;
        });
    </script> 
       <script>
           document.addEventListener('DOMContentLoaded', () => { 
            this.livewire.on('resetFormCloseModel', data => {
               
               if(data.model=='close'){
            
                   $('.modal').modal('hide');
               }
               if(data.clearForm=='yes'){
                document.getElementById(data.formName).reset();
               }

            }) ;
        });
   </script>
<script>
            $('#en_desc').on('focus',function(){
                applay_ckeditor('en_desc',1000);
            });
            
</script>

@endsection
</div>
