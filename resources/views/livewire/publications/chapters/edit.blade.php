<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Update Chapter Info
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
                <input type="text" name="title" class="form-control" value="{{$data->title}}"
                placeholder="Enter Name" required>
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            
            <div class="col-3 pt-2">
                <label for="pages" class="mb-0">Pages</label>
                <input type="text" name="pages" class="form-control" value="{{$data->pages}}"
                placeholder="Enter pages" required>
                @error('pages') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="author" class="mb-0">Author</label>
                <input type="text" value="{{$data->author}}" name="author" class="form-control"
                placeholder="Enter author" required>
                @error('author') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-12 pt-2">
                <label for="keywords" class="mb-0">Keywords</label>
                <input type="text" name="keywords"
                 class="form-control"  value="{{$data->keywords}}"
                placeholder="Enter keywords" required>
                @error('keywords') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-12 pt-2">
                <label for="abstract" class="mb-0">Abstract</label>
                <textarea type="text" name="abstract"
                 class="form-control"
                placeholder="Enter abstract" required>{{$data->abstract}}</textarea>
                @error('author') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.publication.chapters.index',$data->publication_id)}}" class="btn btn-success">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <button type="submit" class="btn btn-info">
                    <i class="fa fa-save"></i> Update
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
