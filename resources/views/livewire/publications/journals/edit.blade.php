<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Edit Journal Info
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
            <div class="col-sm-6 pt-2">
                <label for="title" class="mb-0">Title</label>
                <input type="text" value="{{$data->title}}" name="title" class="form-control"
                placeholder="Enter Name" required>
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-2 pt-2">
                <label for="isbn" class="mb-0">ISSN</label>
                <input type="text" name="isbn" value="{{$data->isbn}}" class="form-control"
                placeholder="Enter issn">
                @error('isbn') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-4 pt-2">
                <label for="editor_email" class="mb-0">Editor Email</label>
                <input type="text" name="editor_email" value="{{$data->editor_email}}" class="form-control"
                placeholder="Enter Editor Email">
                @error('editor_email') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-6 pt-2">
                <label for="about" class="mb-0">About Journal</label>
                <textarea type="text" name="about" class="form-control">{{$data->about}}</textarea>
                @error('about') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-6 pt-2">
                <label for="indexing" class="mb-0">Indexing</label>
                <textarea type="text" name="indexing" class="form-control">{{$data->indexing}}</textarea>
                @error('indexing') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-6 pt-2">
                <label for="editorial_board" class="mb-0">Editorial Board</label>
                <textarea type="text" name="editorial_board" class="form-control">{{$data->editorial_board}}</textarea>
                @error('editorial_board') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-6 pt-2">
                <label for="autor_guidline" class="mb-0">Author Guidline</label>
                <textarea type="text" name="autor_guidline" class="form-control">{{$data->autor_guidline}}</textarea>
                @error('autor_guidline') <span class="text-danger">{{$message}}</span> @enderror
            </div>
           
            <div class="col-sm-6 pt-2">
                <label for="pub_ethics" class="mb-0">Publication Ethics</label>
                <textarea type="text" name="pub_ethics" class="form-control">{{$data->pub_ethics}}</textarea>
                @error('pub_ethics') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-6 pt-2">
                <label for="aim_and_scop" class="mb-0">Aim And Scope</label>
                <textarea type="text" name="aim_and_scop" class="form-control">{{$data->aim_and_scop}}</textarea>
                @error('aim_and_scop') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            {{--<div class="col-sm-6 pt-2">
                <label for="publication_date" class="mb-0">Publication Date</label>
                <input type="date" name="publication_date" value="{{$data->publication_date}}" class="form-control">
                @error('publication_date') <span class="text-danger">{{$message}}</span> @enderror
            </div>--}}
           
            <div class="col-12 my-2 mt-4">
                <img src="{{asset('storage/'.$data->image)}}" class="border shadow" alt="Journal Image" style="max-width:250px;max-height:250px;"> 
            </div>
            <div class="col-sm-3">
                <label for="image" class="mb-0">Journal Image</label>
                <input type="file" name="image" wire:model="image" class="form-control">
                @error('image') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.publication.journal.index')}}" class="btn btn-success">
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
