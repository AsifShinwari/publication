<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Update About Us Info
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
                <label for="title" class="mb-0">Title</label>
                <input type="text" name="title" value="{{$data->title}}" class="form-control"
                placeholder="Enter About us message title">
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="message" class="mb-0">Message</label>
                <textarea type="text" name="message" class="form-control"
                placeholder="Enter About Us Message">{{$data->message}}</textarea>
                @error('message') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="mission" class="mb-0">Mission</label>
                <textarea type="text" name="mission" class="form-control"
                placeholder="Enter Mission Message">{{$data->mission}}</textarea>
                @error('mission') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="vision" class="mb-0">Vision</label>
                <textarea type="text" name="vision" class="form-control"
                placeholder="Enter vision message">{{$data->vision}}</textarea>
                @error('vision') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-6 pt-2">
                <label for="image" class="mb-0">About us message image</label>
                <input type="file" wire:model="image" name="image" class="form-control">
                @error('image') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="image2" class="mb-0">vision and mission message image</label>
                <input type="file" wire:model="image2" name="image2" class="form-control">
                @error('image2') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
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
