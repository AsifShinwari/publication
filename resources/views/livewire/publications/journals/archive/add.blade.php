<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Add New Archive
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
        <input type="hidden" name="journal_id" value="{{$journal_id}}">
        <div class="row">
            <div class="col-6 pt-2">
                <label for="volume" class="mb-0">Volume</label>
                <input type="text" name="volume" class="form-control"
                placeholder="Enter Volume" required>
                @error('volume') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="year" class="mb-0">Year</label>
                <input type="date" name="year" class="form-control"
                placeholder="Enter Year">
                @error('year') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="issue" class="mb-0">Issue</label>
                <input type="text" name="issue" class="form-control"
                placeholder="exp issue 1">
                @error('issue') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.journal.archive.index',$journal_id)}}" class="btn btn-success">
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
