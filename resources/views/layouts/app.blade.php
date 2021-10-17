<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>University</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    
<!-- login page styles -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
<link rel="stylesheet" href="{{asset('templete_assets/css/vendor.min.css')}}">
<link rel="stylesheet" href="{{asset('templete_assets/css/elephant.min.css')}}">
<link rel="stylesheet" href="{{asset('templete_assets/css/login-3.min.css')}}">
<!--end login page styles -->
</head>
<body>

    
        <main class="py-4">
            @yield('content')
        </main>

    <!-- login page scripts -->
    <script src="{{asset('templete_assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('templete_assets/js/elephant.min.js')}}"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
<!-- end login page scripts -->
</body>
</html>
