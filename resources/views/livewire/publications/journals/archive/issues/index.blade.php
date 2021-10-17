<div>
    <div class="container-fluid mt-2">
        <table class="table table-sm bg-white">
            <thead>
                <th colspan="10" class="bg-light">
                    <h5 class="pl-2"><b>Journal:</b> {{$journal->title}} </h5>
                    <h5 class="pl-2"><b>Archive:</b> {{$archive->volume}}-{{$archive->year}} </h5>
                </th>
            </thead>
            <thead>
                <th colspan="10">
                    <div class="row">
                        <div class="col-sm-10">
                            <input type="text" name="search" wire:model.lazy="search"
                            class="form-control" placeholder="Search">
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-info" href="{{route('backend.journal.archive.issues.add',$archive->id)}}">
                                <i class="fa fa-plus"></i> Add Article

                                <!-- loading Status -->
                                <div wire:loading>
                                    <div class="spinner-border text-white spinner-border-sm" role="status">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                                <!-- end loading Status -->

                            </a>
                        </div>
                    </div>
                </th>
            </thead>
            <thead>
                <th>No.</th>
                <th>Title</th>
                <th>DOI</th>
                <th>Author</th>
                <th>Pages</th>
                <th>Abstract</th>
                <th>Keywords</th>
                <th>Pub-Date</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{substr($item->title,0,20)}}</td>
                        <td>{{$item->doi}}</td>
                        <td>{{$item->author}}</td>
                        <td>{{$item->pages}}</td>
                        <td>{{substr($item->abrstact,0,20)}}</td>
                        <td>{{substr($item->keywords,0,20)}}</td>
                        <td>{{date('Y-m-d',strtotime($item->publication_date))}}</td>
                        <td class="text-center">
                            <a href="{{asset('storage/'.$item->file)}}" target="_blank()" class="btn btn-info btn-sm">
                                <i class="fa fa-menu">PDF File</i>
                            </a>
                            <a href="{{route('backend.journal.archive.issues.edit',$item->id)}}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button wire:click="setId('{{$item->id}}')" data-toggle="modal" data-target="#deleteModel" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash text-white"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            @if($data->hasPages())
            <tfoot>
                <tr>
                    <th colspan="10">
                        {{$data->links('laravel_pagination')}}
                    </th>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>

<!-- The Modal -->
  <div wire:ignore.self class="modal fade" id="deleteModel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header p-1">
          <h4 class="modal-title">
              Are You Sure To Delete This Issue?
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer p-1">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button wire:click="delete()" class="btn btn-danger btn-sm">
                <i class="fa fa-trash text-white"></i> Yes
            </button>
        </div>
        
      </div>
    </div>
  </div>
<!-- end model -->

@section('manual_scripts')
    <script>
        $('ul.pagination').addClass('m-0');
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
