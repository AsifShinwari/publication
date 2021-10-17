<div>
    <div class="container">
    <form wire:submit.prevent="update(Object.fromEntries(new FormData($event.target)))" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <h5 class="text-center">Edit Home Page Content
                    <!-- loading Status -->
                    <div wire:loading>
                        <div class="spinner-border text-info spinner-border-sm" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                    <!-- end loading Status -->
                </h5>
            </div>
            <div class="col-12">
                <label for="banner_image" class="mb-0">Banner Image</label>
                <input type="file" name="banner_image" wire:model="banner_image" class="form-control">
            </div>
            <div class="col-12 pt-2">
                <label for="banner_title" class="mb-0">Banner Title</label>
                <input type="text" name="banner_title" 
                class="form-control" value="{{$home_page->banner_title}}" placeholder="Enter Banner Title">
            </div>
            <div class="col-12 pt-2">
                <label for="banner_subtitle" class="mb-0">Banner Sub-title</label>
                <input type="text" name="banner_subtitle" 
                class="form-control" value="{{$home_page->banner_subtitle}}" placeholder="Enter Banner Sub-Title">
            </div>

            <div class="col-12 pt-4">
                <h5 class="border-bottom m-0">Banner Cards</h5>
            </div>
            <div class="col-sm-4 pt-2">
                <label for="banner_card_title1" class="mb-0">First Card Title</label>
                <input type="text" name="banner_card_title1" value="{{$home_page->banner_card_title1}}" 
                class="form-control" placeholder="Enter Title For Card one">
            </div>
            <div class="col-sm-8 pt-2">
                <label for="banner_card1" class="mb-0">First Card Message</label>
                <input type="text" name="banner_card1" value="{{$home_page->banner_card1}}" 
                class="form-control" placeholder="Enter Short Message For Card one">
            </div>
            <div class="col-sm-4 pt-2">
                <label for="banner_card_title2" class="mb-0">Second Card Title</label>
                <input type="text" name="banner_card_title2" value="{{$home_page->banner_card_title2}}" 
                class="form-control" placeholder="Enter Title For Card Two">
            </div>
            <div class="col-sm-8 pt-2">
                <label for="banner_card2" class="mb-0">Second Card Message</label>
                <input type="text" name="banner_card2"  value="{{$home_page->banner_card2}}"
                class="form-control" placeholder="Enter Short Message For Card two">
            </div>
            <div class="col-sm-4 pt-2">
                <label for="banner_card_title3" class="mb-0">Third Card Title</label>
                <input type="text" name="banner_card_title3" value="{{$home_page->banner_card_title3}}" 
                class="form-control" placeholder="Enter Title For Card Third">
            </div>
            <div class="col-sm-8 pt-2">
                <label for="banner_card3" class="mb-0">Third Card Message</label>
                <input type="text" name="banner_card3"  value="{{$home_page->banner_card3}}"
                class="form-control" placeholder="Enter Short Message For Card three">
            </div>

            <div class="col-12 pt-4">
                <h5 class="border-bottom m-0">Mentor Banner Settings</h5>
            </div>
            <div class="col-12 pt-2">
                <label for="mentor_title_message" class="mb-0">Message Title</label>
                <input type="text" name="mentor_title_message" value="{{$home_page->mentor_title_message}}" 
                class="form-control" placeholder="Exp Become a Mentor">
            </div>
            <div class="col-12 pt-2">
                <label for="mentor_message" class="mb-0">Message</label>
                <input type="text" name="mentor_message"  value="{{$home_page->mentor_message}}"
                class="form-control" placeholder="Exp Join as mentor in....">
            </div>
            <div class="col-12 pt-2">
                <label for="mentor_banner_image" class="mb-0">Mentor Banner Image</label>
                <input type="file" name="mentor_banner_image" wire:model="mentor_banner_image" class="form-control">
            </div>

            <div class="col-12 pt-4">
                <h5 class="border-bottom m-0">Join Us Banner</h5>
            </div>
            <div class="col-12 pt-2">
                <label for="join_us_banner_title" class="mb-0">Banner Title</label>
                <input type="text" name="join_us_banner_title"  value="{{$home_page->join_us_banner_title}}"
                class="form-control">
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
