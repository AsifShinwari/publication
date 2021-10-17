<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Add New Institute
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
        <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6 pt-2">
                <label for="title" class="mb-0">Institute Name</label>
                <input type="text" name="title" class="form-control"
                placeholder="Enter Institute Name" required>
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="country_id" class="mb-0">Country</label>
                <select name="country_id" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('country_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-6 pt-2">
                <label for="image" class="mb-0">Image</label>
                <input type="file" wire:model="image" name="image" class="form-control">
                @error('image') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.aboutUs.tie.up')}}" class="btn btn-success">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-save"></i>   Save
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
