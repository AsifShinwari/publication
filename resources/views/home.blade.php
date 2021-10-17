
@if(auth()->user()->type=='Admin')
<!DOCTYPE html>
<html lang="en">

<head>

<title>Admin Panel</title>
		<!-- Links Starts -->
@include('layouts.app_layouts.links')
<!-- livewire styles -->
@livewireStyles
<!-- end livewire styles -->
 @yield('manual_style')
		<!-- Links Starts -->

    </head>

    <body class="enlarged unsticky-layout" data-keep-enlarged="false">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            @include('layouts.app_layouts.topbar')
			<!-- end Topbar -->


            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.app_layouts.leftbar')
			<!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        {{ $slot }}
                        @yield('contents')
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                <!-- Footer Start -->
                @include('layouts.app_layouts.footer')
				<!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
		
		

        <!-- Right Sidebar -->
		@include('layouts.app_layouts.rightbar')
		 <!-- End Right Sidebar -->
        
		<!-- ============================================================== -->
		<!-- SCRIPTS -->
            
            @livewireScripts
            @include('layouts.app_layouts.scripts')
            
		<!-- SCRIPTS -->
        @yield('manual_scripts')
        @stack('scripts')    
    </body>

<!-- Mirrored from coderthemes.com/uplon/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 01:15:45 GMT -->
</html>
@else
    <h1 style="text-align:center;color:red;display-block;margin:auto;">You are not allowed to this route!</h1>
@endif



