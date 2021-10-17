<div>
                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Users</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">+&nbsp;<i class="fa fa-user"></i>&nbsp; Add New User</button>
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
                                                    <h5 class="modal-title" id="myLargeModalLabel">Add New User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
                                                
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="username">User Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="username" parsley-trigger="change" id="username"
                                                                placeholder="Enter user name" class="form-control
                                                                @error('username') parsley-error @enderror">
                                                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="email">Email address<span class="text-danger">*</span></label>
                                                        <input type="email" name="email" parsley-trigger="change"
                                                                placeholder="Enter email" class="form-control
                                                                @error('email') parsley-error @enderror"
                                                                id="email">
                                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="type">UserType<span class="text-danger">*</span></label>
                                                        <select name="type" parsley-trigger="change" class="form-control @error('type') parsley-error @enderror">
                                                                <option value="Admin">Admin</option>
                                                                <option value="User">User</option>
                                                        </select>
                                                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password<span class="text-danger">*</span></label>
                                                        <input id="password" name="password" type="password" placeholder="password"
                                                                class="form-control
                                                                @error('password') parsley-error @enderror">
                                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
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

                        <!-- page body (table) -->
                        <table class="table bg-white" id="users">
                            <thead>
                                <th colspan="4">
                                    <div class="form-inline">
                                        <!-- Default unchecked -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"  wire:model="filter_admin" id="Admin">
                                            <label class="custom-control-label" for="Admin">Filter Admin</label>
                                        </div> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <!-- Default unchecked -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"  wire:model="filter_individual" id="Individual">
                                            <label class="custom-control-label" for="Individual">Filter Individual</label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <!-- Default unchecked -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"  wire:model="filter_mentor" id="Mentor">
                                            <label class="custom-control-label" for="Mentor">Filter Mentor</label>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <!-- Default unchecked -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"  wire:model="filter_company" id="Company">
                                            <label class="custom-control-label" for="Company">Filter Company</label>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <button class="btn btn-success float-right ml-1" onclick="exportToExcel('users')"> <i class="fas fa-file-excel"></i> Export</button>
                                    <button class="btn btn-info float-right" data-toggle="modal" data-target="#emailModal"> 
                                        <i class="fa fa-envelope"></i> Email
                                    </button>
                                </th>
                            </thead>
                            <thead class="bg-info text-white">
                                <th>NO.</th>
                                <th>Username</th>
                                <th>UserType</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                        
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>
                                            <button wire:click="edit(`{{$item->id}}`)" class="btn btn-sm btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-update-modal-lg"><i class="fa fa-edit"></i></button>
                                            <a href="{{route('user.photo',$item->id)}}" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-image"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- end page body (table) -->
                        @if($filter_admin==false && $filter_individual==false && $filter_mentor==false && $filter_company==false )
                            {{ $users->links('pagination_links') }}
                        @endif
                                <!-- update user modal -->
                                 <!--  Modal content for the above example -->
                                 <div wire:ignore.self class="modal fade bs-update-modal-lg" tabindex="-1" role="dialog" aria-labelledby="updateUserModal" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateUserModal">Update User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form wire:submit.prevent="update(Object.fromEntries(new FormData($event.target)))">
                                                    <input type="hidden" wire:modal="selected_id" name="selected_id" id="selected_id" value="{{$selected_id}}">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="username">User Name @if(session()->has('updated')) <span class="text-success fa fa-check"></span> @else <span class="text-danger">*</span> @endif</label>
                                                        <input type="text" name="username" parsley-trigger="change" id="username"
                                                                placeholder="Enter user name" class="form-control
                                                                @error('username') parsley-error @enderror"
                                                                value="{{$username}}">
                                                                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="email">Email address @if(session()->has('updated')) <span class="text-success fa fa-check"></span> @else <span class="text-danger">*</span> @endif</label>
                                                        <input type="email" name="email" parsley-trigger="change"
                                                                placeholder="Enter email" class="form-control
                                                                @error('email') parsley-error @enderror"
                                                                id="email" value="{{$email}}">
                                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="type">UserType @if(session()->has('updated')) <span class="text-success fa fa-check"></span> @else <span class="text-danger">*</span> @endif</label>
                                                        <select name="type" parsley-trigger="change" class="form-control
                                                                @error('type') parsley-error @enderror">

                                                                <option @if($type=='Admin') selected @endif value="Admin">Admin</option>
                                                                <option @if($type=='User') selected @endif value="User">User</option>
                                                        </select>
                                                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">New Password @if(session()->has('updated')) <span class="text-success fa fa-check"></span> @else <span class="text-danger">*</span> @endif</label>
                                                        <input id="password" name="password" type="password" placeholder="password"
                                                                class="form-control
                                                                @error('password') parsley-error @enderror"
                                                                value="{{$password}}">
                                                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
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
                                                
                                                @if(session()->has('updated'))
                                                    <i class="fa fa-check"></i>
                                                    <script>
                                                         toastr["success"](" {{ session('updated') }} ");
                                                    </script>
                                                @endif

                                                <button class="btn btn-info" wire:loading.attr="disabled" type="submit">Update</button>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                <!-- end update user modal -->

                                <!-- delete user modal -->
                                 <!--  Modal content for the above example -->
                                 <div wire:ignore.self class="modal fade bs-delete-modal-lg" tabindex="-1" role="dialog" aria-labelledby="updateUserModal" aria-hidden="true" style="display: none;">
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
                                                         <h5 class=""  id="updateUserModal">Are You Sure To Delete This User!</h5>
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
                                 <!-- end delete user modal -->

                                <!-- send Email modal -->
                                 <!--  Modal content for the above example -->
                                 <div wire:ignore.self class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Send Email To Selected Emails</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form wire:submit.prevent="send_email(Object.fromEntries(new FormData($event.target)))">
                                                
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="subject">Subject<span class="text-danger">*</span></label>
                                                        <input type="text" name="subject" parsley-trigger="change" id="subject"
                                                                placeholder="Enter user name" class="form-control
                                                                @error('subject') parsley-error @enderror">
                                                                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="message">Message<span class="text-danger">*</span></label>
                                                        <textarea type="message" name="message" rows="12" parsley-trigger="change"
                                                                placeholder="Enter message" class="form-control
                                                                @error('message') parsley-error @enderror"
                                                                id="message"></textarea>
                                                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
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
                                                <button class="btn btn-info" wire:loading.attr="disabled" type="submit">Send</button>
                                                </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                        <!-- end add new user modal -->
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
