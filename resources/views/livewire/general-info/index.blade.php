<div>
    <div class="container">
    <form wire:submit.prevent="update(Object.fromEntries(new FormData($event.target)))" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <h5 class="text-center alert-secondary p-3">Edit Application General Information
                    <!-- loading Status -->
                    <div wire:loading>
                        <div class="spinner-border text-info spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                    <!-- end loading Status -->
                </h5>
            </div>
            
            <div class="col-12 pt-2">
                <label for="app_name" class="mb-0">Application Name</label>
                <input type="text" name="app_name" 
                class="form-control" value="{{$general_info->app_name}}" placeholder="Enter Application name">
            </div>
            <div class="col-12 pt-2">
                <label for="app_abbr" class="mb-0">Application Abbrivation</label>
                <input type="text" name="app_abbr" 
                class="form-control" value="{{$general_info->app_abbr}}" placeholder="Enter Application Abbrivation">
            </div>
            <div class="col-12 pt-2">
                <label for="email" class="mb-0">Offical Email Address</label>
                <input type="text" name="email" 
                class="form-control" value="{{$general_info->email}}" placeholder="Enter Email Address">
            </div>
            <div class="col-12 pt-2">
                <label for="whatsapp" class="mb-0">Whatsapp Number</label>
                <input type="text" name="whatsapp" 
                class="form-control" value="{{$general_info->whatsapp}}" placeholder="Enter whatsapp number">
            </div>
            <div class="col-12 pt-2">
                <label for="office_address" class="mb-0">Office Address</label>
                <input type="text" name="office_address" 
                class="form-control" value="{{$general_info->office_address}}" placeholder="Enter Office Address">
            </div>
            <div class="col-12">
                <label for="logo" class="mb-0">Application Logo</label>
                <input type="file" name="logo" wire:model="logo" class="form-control">
            </div>

            <div class="col-12 pt-2">
                <h5 class="border-bottom"></h5>
                <button class="btn btn-info" type="submit">Update</button>
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
