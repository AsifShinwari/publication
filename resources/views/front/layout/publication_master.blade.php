@php
	$general_info=DB::table('general_info')->orderBy('id','desc')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$general_info->app_name}}</title>
    @include('front.layout.links')

</head>
<body>
    @include('front.layout.header')
    {{--@include('front.layout.publication_header')--}}
    

    @yield('contents')
    <!-- footer -->
    @include('front.layout.footer')
    <!-- end footer -->
    
    @include('front.layout.scripts')
          
    <!-- SCRIPTS -->
    @yield('manual_scripts')
</body>
</html>