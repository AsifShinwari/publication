<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPINGHAR UNIVERSITY</title>
    @include('layouts.app_layouts.links')
</head>
<body style="background-image:url('{{asset('images/background.jpg')}}');background-repeat:no-repeat;background-size: cover;background-position: center;height:100vh;">
    <div style="width:100%;height:100vh;background: rgba(245 255 244 / 95%);">
    {{$slot}}
    </div>

    @include('front_layouts.scripts')
            
    <!-- SCRIPTS -->
    @yield('manual_scripts')
</body>
</html>