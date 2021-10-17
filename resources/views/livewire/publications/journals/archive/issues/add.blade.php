<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Add Article
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
                <label for="title" class="mb-0">Title</label>
                <textarea type="text" name="title" class="form-control"
                placeholder="Enter title" required></textarea>
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="author" class="mb-0">Author</label>
                <input type="text" name="author" class="form-control"
                placeholder="Enter author">
                @error('author') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="pages" class="mb-0">Pages</label>
                <input type="text" name="pages" class="form-control"
                placeholder="exp pages 1-5">
                @error('pages') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="doi" class="mb-0">DOI</label>
                <input type="text" name="doi" class="form-control"
                placeholder="Enter DOI Number">
                @error('doi') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="publication_date" class="mb-0">Publication Date</label>
                <input type="date" name="publication_date" class="form-control">
                @error('publication_date') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="abrstact" class="mb-0">Abrstact</label>
                <textarea type="text" name="abrstact" class="form-control"
                placeholder="Enter abrstact" required></textarea>
                @error('abrstact') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="keywords" class="mb-0">Keywords</label>
                <input type="text" name="keywords" class="form-control"
                placeholder="enter keywords">
                @error('keywords') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="file" class="mb-0">PDF File</label>
                <input type="file" name="file" wire:model="image" class="form-control">
                @error('file') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.journal.archive.issues.index',$archive_id)}}" class="btn btn-success">
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
