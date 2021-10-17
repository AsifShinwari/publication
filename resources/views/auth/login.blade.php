<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/uplon/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 01:15:50 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login To Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('template_assets/assets/images/favicon.ico')}}">

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
<style>
.background-image {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 1;
  display: block;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url({{asset('assets/login_background2.JFIF')}});
  width: 100%;
  height: 100%;
  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
}

.content {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 9999;
  margin-left: 20px;
  margin-right: 20px;
}
</style>
    </head>

    <body class="authentication-">
        <div class="background-image"></div>
        <div class="account-pages pt-5 my-5 content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="account-card-box" style="background: rgba(20,20, 100, 0.3)">
                            <div class="card mb-0" style="background: rgba(20,20, 100, 0.3)">
                                <div class="card-body p-4">
                                    
                                    <div class="text-center">
                                        <div class="my-3">
                                            <a href="index.html" class="bg-white p-2">
                                                <span><img src="{{asset('assets/images/logo.png')}}" alt="" height="28"></span>
                                            </a>
                                        </div>
                                        <h5 class="text-white text-uppercase py-3 font-16">{{ __('Login') }}</h5>
                                    </div>
    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror" type="text" required name="email" value="{{ old('email') }}" autocomplete="email" autofocus  placeholder="Enter your username">
                                        </div>
   
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror



                                        <div class="form-group mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" required id="password" name="password" placeholder="Enter your password" autocomplete="current-password">
                                        </div>
                                        @error('password')
                                           <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                        
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label text-white" for="remember">{{ __('Remember Me') }}</label>
                                            </div>
                                        </div>
    
                                        <div class="form-group text-center">
                                            <button class="btn btn-info btn-block waves-effect waves-light" type="submit"> {{ __('Login') }}</button>
                                        </div>

                                        @if (Route::has('password.request'))
                                        <!-- {{ route('password.request') }} -->
                                        <a href="#" class="text-white"><i class="mdi mdi-lock mr-1"></i> {{ __('Forgot Your Password?') }}</a>
                                        @endif
                                    </form>

                                  
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>

                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/uplon/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 01:15:50 GMT -->
</html>