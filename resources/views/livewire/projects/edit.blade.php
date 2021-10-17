<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Update Project
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
                <label for="proj_name" class="mb-0">Project Name</label>
                <input type="text" name="proj_name" value="{{$data->proj_name}}" class="form-control"
                placeholder="Enter Name" required>
                @error('proj_name') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="details" class="mb-0">Details</label>
                <textarea type="text" name="details" class="form-control"
                placeholder="Enter details" required>{{$data->details}}</textarea>
                @error('details') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-3 pt-2">
                <label for="our_funded" class="mb-0">OurFunded &nbsp;&nbsp;&nbsp;</label>
                <input type="checkbox" @if($data->our_funded==1) checked @endif name="our_funded" class="">
                @error('our_funded') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-3 pt-2">
                <label for="is_completed" class="mb-0">IsCompleted&nbsp;&nbsp;&nbsp;</label>
                <input type="checkbox" name="is_completed" @if($data->is_completed==1) checked @endif>
                @error('is_completed') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.projects.index')}}" class="btn btn-success">
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
