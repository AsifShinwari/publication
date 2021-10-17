<div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 alert-secondary">
                <h5 class="text-center">Update Publication
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
                placeholder="Enter Name" required>
                @error('title') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-6 pt-2">
                <label for="author" class="mb-0">Author Name</label>
                <input type="text" value="{{$data->author}}" name="author" class="form-control"
                placeholder="Enter Author Name" required>
                @error('author') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="discipline" class="mb-0">Discipline</label>
                <select type="text" name="discipline" class="form-control" required>
                    <option value="">Select Descipline</option>
                    @foreach($disciplines as $item)
                        <option value="{{$item->id}}" @if($data->discipline_id==$item->id) selected @endif >{{$item->title}}</option>
                    @endforeach
                </select>
                @error('discipline') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="publication_type_id" class="mb-0">Publication Type</label>
                <select type="text" name="publication_type_id" class="form-control" required>
                    <option value="">Select Descipline</option>
                    @foreach($publication_type as $item)
                        <option value="{{$item->id}}" @if($data->publication_type_id==$item->id) selected @endif >{{$item->title}}</option>
                    @endforeach
                </select>
                @error('publication_type_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="isbn" class="mb-0">ISBN</label>
                <input type="text" value="{{$data->isbn}}" name="isbn" class="form-control"
                placeholder="Enter ISBN" required>
                @error('isbn') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="doi" class="mb-0">DOI</label>
                <input type="text" value="{{$data->doi}}" name="doi" class="form-control"
                placeholder="Enter DOI" required>
                @error('doi') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="pages" class="mb-0">Pages</label>
                <input type="text" value="{{$data->pages}}" name="pages" class="form-control"
                placeholder="Enter pages" required>
                @error('pages') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="year_of_publication" class="mb-0">Year Of Plublication</label>
                <input type="text" value="{{$data->year_of_publication}}" name="year_of_publication" class="form-control"
                placeholder="Enter Year ( YYYY )" required>
                @error('year_of_publication') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="image" class="mb-0">
                    Book Image
                    <a href="{{asset('storage/'.$data->image)}}" target="_blank()" class="btn-link">View Image</a>
                </label>
                <input type="file" name="image" wire:model="image" class="form-control">
                @error('image') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="book_pdf" class="mb-0">
                    Book PDF
                    <a href="{{asset('storage/'.$data->book_pdf)}}" target="_blank()" class="btn-link">View PDF</a>
                </label>
                <input type="file" name="book_pdf" wire:model="book_pdf" class="form-control">
                @error('book_pdf') <span class="text-danger">{{$message}}</span> @enderror
            </div>
            <div class="col-3 pt-2">
                <label for="table_of_content_pdf" class="mb-0">
                    Book Table Of Contents PDF
                    <a href="{{asset('storage/'.$data->table_of_content_pdf)}}" target="_blank()" class="btn-link">View PDF</a>
                </label>
                <input type="file" name="table_of_content_pdf" wire:model="table_of_content_pdf" class="form-control">
                @error('table_of_content_pdf') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="col-sm-12 pt-3 border-bottom">
            </div>
            <div class="col-sm-12 pt-1">
                <a href="{{route('backend.publication.index')}}" class="btn btn-success">
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
