<meta charset="utf-8" />
@php $app_logo=DB::table('general_info')->orderBy('id','desc')->first(); @endphp
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" type="image/png" href="{{$app_logo->app_logo}}"/>
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href=""> -->

        <!-- App css -->
               <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
	<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    
        <!-- toast css -->
        <link href="{{asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
        <!-- end toast css -->

        <!-- Select 2 -->
        {{--<!-- <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" /> -->--}}
        <!-- end Select 2 -->
