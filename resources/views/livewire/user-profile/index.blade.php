<div>
                      <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                        &nbsp;
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- page body (table) -->
                        <table class="table bg-white">
                            <thead class="bg-info text-white">
                                <th>NO.</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                        
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$item->name}}</td>
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
                        {{ $users->links('pagination_links') }}

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

</div>
