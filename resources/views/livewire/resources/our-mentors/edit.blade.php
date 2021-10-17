<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Update Mentor Info
                    <!-- loading Status -->
                    <div wire:loading>
                        <div class="spinner-border text-info spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                    <!-- end loading Status -->
                </h5>
            </div>
        </div>
        <form wire:submit.prevent="update(Object.fromEntries(new FormData($event.target)))" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6 pt-2">
                <label for="name" class="mb-0">Name</label>
                <input type="text" name="name" class="form-control"
                placeholder="Enter Name" value="{{$data->name}}" required>
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="last_name" class="mb-0">Last Name</label>
                <input type="text" name="last_name" value="{{$data->last_name}}" class="form-control"
                placeholder="Enter last name" required>
                @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="email" class="mb-0">Email</label>
                <input type="text" name="email" disabled value="{{$data->email}}" class="form-control"
                placeholder="Enter email" required>
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="address" class="mb-0">Address</label>
                <input type="text" name="address" value="{{$data->address}}" class="form-control"
                placeholder="Enter address" required>
                @error('address') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="qualification" class="mb-0">Qualification</label>
                <input type="text" name="qualification" value="{{$data->qualification}}" class="form-control"
                placeholder="Enter qualification" required>
                @error('qualification') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="skills" class="mb-0">Skills</label>
                <input type="text" name="skills" value="{{$data->skills}}" class="form-control"
                placeholder="Enter skills" required>
                @error('skills') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="profile_url" class="mb-0">Url ( Website or social media profile )</label>
                <input type="text" name="profile_url" value="{{$data->profile_url}}" class="form-control"
                placeholder="Enter url" required>
                @error('profile_url') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="education" class="mb-0">Education</label>
                <input type="text" name="education" value="{{$data->education}}" class="form-control"
                placeholder="Enter education" required>
                @error('education') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="experience" class="mb-0">Experience</label>
                <input type="text" name="experience" value="{{$data->experience}}" class="form-control"
                placeholder="Enter experience" required>
                @error('experience') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="col-6 pt-2">
                <label for="country_id" class="mb-0">Country</label>
                <select type="text" name="country_id" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $item)
                        <option value="{{$item->id}}" @if($data->country_id==$item->id) selected @endif >{{$item->name}}</option>
                    @endforeach
                </select>
                @error('country_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-6 pt-2">
                <label for="image" class="mb-0">Image</label>
                <input type="file" wire:model="image" name="image" class="form-control">
                @error('image') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="resumee" class="mb-0">Resumee</label>
                <input type="file" wire:model="resumee" name="resumee" class="form-control">
                @error('resumee') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.mentors.index')}}" class="btn btn-success">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-save"></i>   Update
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
