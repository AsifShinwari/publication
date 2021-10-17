            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                            @php 
                            $current_user=\DB::table('users')->where('id',\Auth::user()->id)->first();
                            $current_user_image=\DB::table('user_photos')->where('user_id',$current_user->id)
                            ->where('is_profile','1')
                            ->first();
                            @endphp
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            
                            @if($current_user_image)
                                <img src="{{asset('storage/'.$current_user_image->photo)}}" alt="user-image" class="rounded-circle">
                            @else
                                <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                            @endif
                            <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{$current_user->name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow text-white m-0">Welcome {{$current_user->name}} !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{route('user.profile')}}" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <form action="{{route('logout')}}" id="logoutForm" method="post">
                            @csrf
                             <button type="submit" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </button>
                            </form>
                            

                        </div>
                    </li>

                   

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{route('dashboard')}}" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" height="22">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="24">
                        </span>
                    </a>

                    <a href="index.html" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="{{asset('assets/images/logo-sm-light.png')}}" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                </ul>
            </div>
            
			<!-- end Topbar -->