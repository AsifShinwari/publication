<div>
    <div class="container-fluid mt-2">
        <table class="table table-sm bg-white">
            <thead>
                <th colspan="8">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" name="search" wire:model.lazy="search"
                            class="form-control" placeholder="Search">
                        </div>
                        
                    </div>
                </th>
            </thead>
            <thead>
                <th>No.</th>
                <th>Email</th>
                <th>Currency</th>
                <th>Amount</th>
                <th>TaxApplied</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->currency}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->tax_applied}}</td>
                        <td>{{substr($item->description,0,100)}}</td>
                        <td>
                            <a href="{{$item->receipt_url}}" class="btn btn-info btn-sm" target="_blank()">
                                Receipt
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
                    <th colspan="7">
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
              Are You Sure To Delete This Transaction?<br>
              <small>Note: Transaction will be deleted only from this list, it does not affect payments!</small>
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
