<div>
                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{route('users')}}">Users</a></li>
                                            <li class="breadcrumb-item active">Images</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">+&nbsp;<i class="fa fa-image"></i>&nbsp; Add New Image</button>
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- add new user modal -->
                                 <!--  Modal content for the above example -->
                                    <div wire:ignore.self class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Add New Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))" method="post" enctype="multipart/form-data">
                                                
                                                <div class="modal-body">
                                                @if ($photo)
                                                <img src="{{ $photo->temporaryUrl() }}" width="200px" height="200px">
                                                @endif
                                                    <div class="form-group">
                                                        <label for="photo">Photo<span class="text-danger">*</span></label>
                                                        <input type="file" name="photo" parsley-trigger="change"
                                                                placeholder="upload photo" class="form-control
                                                                @error('photo') parsley-error @enderror"
                                                                id="photo" wire:model.lazy="photo">
                                                                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Photo Name</label>
                                                        <input type="text" name="name" parsley-trigger="change" id="name"
                                                                placeholder="enter photo name" class="form-control
                                                                @error('name') parsley-error @enderror" wire:model.lazy="name">
                                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="is_profile">Profile Picture</label>
                                                        <input id="is_profile" name="is_profile" type="checkbox"
                                                                class="form-control
                                                                @error('is_profile') parsley-error @enderror" wire:model.lazy="is_profile">
                                                                @error('is_profile') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                
                                                 <!-- loading Status -->
                                                 <div wire:loading>
                                                    <div class="spinner-border text-info spinner-sm" role="status">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                                <!-- end loading Status -->
                                                
                                                @if(session()->has('inserted'))
                                                    <i class="fa fa-check"></i>
                                                    <script>
                                                    toastr["success"](" {{ session('inserted') }} ");
                                                    </script>
                                                @endif
                                                <button class="btn btn-info" wire:loading.attr="disabled" type="submit">Save</button>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                        <!-- end add new user modal -->


                        <div class="row">
                            <div class="col-12">
                                <!-- <div class="portfolioFilter">
                                    <a href="#" data-filter="*" class="current waves-effect waves-light">All</a>
                                    <a href="#" data-filter=".natural" class="waves-effect waves-light">Natural</a>
                                    <a href="#" data-filter=".creative" class="waves-effect waves-light">Creative</a>
                                    <a href="#" data-filter=".personal" class="waves-effect waves-light">Personal</a>
                                    <a href="#" data-filter=".photography" class="waves-effect waves-light">Photography</a>
                                </div> -->
                            </div>
                        </div>
                       
                        <div class="port text-center mb-3">
                            <div class="portfolioContainer row">
                            @foreach($user_photos as $item)
                                <div class="col-sm-4 col-xl-4 natural personal">
                                    <div class="gallery-box">
                                        <a href="{{asset('storage/'.$item->photo)}}" class="image-popup" title="Screenshot-1">
                                            <img src="{{asset('storage/'.$item->photo)}}" class="thumb-img img-fluid" alt="work-thumbnail">
                                        </a>
                                        <div class="gal-detail p-3">
                                            <p class="text-muted mb-0">
                                                {{$item->name}}
                                                <hr>
                                            </p>
                                            <h4 class="font-16 mt-0">
                                            <div>
                                    

                                                    <input id="is_profile" name="is_profile" wire:click.prevent="change_profile({{$item->id}})" wire:modal="is_profile_changed" type="checkbox" @if($item->is_profile=='1') checked @endif>
                                                    <label for="is_profile">
                                                        Profile
                                                    </label>
                                            
                                            </div>
                                                <button wire:click="edit({{$item->id}})" class="btn btn-sm btn-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-delete-modal-lg"><i class="fa fa-trash"></i></button>
                                            
                                            </h4>
                                        </div>
                                        </div>
                                        </div>

                                        @endforeach
                                    </div>
                                    
                                </div>
                    
                        
                        <!-- update user modal -->
                                 <!--  Modal content for the above example -->
                                 <div wire:ignore.self class="modal fade bs-delete-modal-lg" role="dialog" aria-labelledby="updateUserModal" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form wire:submit.prevent="delete(Object.fromEntries(new FormData($event.target)))">
                                                    <input type="hidden" wire:modal="selected_id" name="selected_id" id="selected_id" value="{{$selected_id}}">
                                    
                                                <div class="modal-body">

                                                <!-- loading Status -->
                                                <div wire:loading>
                                                    <div class="spinner-border text-info spinner-sm" role="status">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                                @if(session()->has('deleted'))
                                                    <i class="fa fa-check"></i>
                                                    <script>
                                                         toastr["success"](" {{ session('deleted') }} ");
                                                    </script>
                                                @endif
                                                <!-- end loading Status -->
                                                    <div class="row">
                                                    
                                                        <div class="col-6">
                                                         <h5 class=""  id="updateUserModal">Are You Sure To Delete This Image!</h5>
                                                        </div>

                                                        <div class="col-6">
                                                         <button class="btn btn-danger float-right" wire:loading.attr="disabled" type="submit">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                        <!-- end update user modal -->
                        
                            </div><!-- end portfoliocontainer-->
                        </div> <!-- End row -->


</div>
