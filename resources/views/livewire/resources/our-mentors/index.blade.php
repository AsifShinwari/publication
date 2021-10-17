<div>
    <div class="container-fluid mt-2">
        <table class="table table-sm bg-white">
            <thead>
                <th colspan="8">
                    <div class="row">
                        <div class="col-7 col-sm-10">
                            <input type="text" name="search" wire:model.lazy="search"
                            class="form-control" placeholder="Search">
                        </div>
                        <div class="col-5 col-sm-2">
                            <a class="btn btn-info" href="{{route('backend.mentors.add')}}">
                                <i class="fa fa-plus"></i> Add Mentor

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
                <th>Name</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Qualification</th>
                <th>Country</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->last_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->qualification}}</td>
                        <td>{{$item->country_name}}</td>
                        <td>
                            <a @if($item->image!=null) href="{{asset('storage/'.$item->image)}}" @endif class="btn btn-link" target="_blank()">Go To Image</a>
                        </td>
                        <td>
                            @php $user=DB::table('users')->where('email',$item->email)->first(); @endphp
                            @if($user)
                                <div class="badge badge-success p-2 m-1">
                                    <i class="fa fa-check"></i> Approved
                                </div>
                                <a class="btn btn-info btn-sm m-1" href="{{route('our_mentors.reset.password',$user->id)}}">Reset Password</button>
                            @else
                                <button class="btn btn-info btn-sm" wire:click="approve_account('{{$item->email}}')">Approve Account</button>
                            @endif
                            <a href="{{route('backend.mentors.edit',$item->id)}}" class="btn btn-info btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button wire:click="setId('{{$item->id}}')" data-toggle="modal" data-target="#deleteModel" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash text-white"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8">
                        {{$data->links('laravel_pagination')}}
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

<!-- The Modal -->
  <div wire:ignore.self class="modal fade" id="deleteModel">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header p-1">
          <h4 class="modal-title">
              Are You Sure To Delete This Mentor?
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
