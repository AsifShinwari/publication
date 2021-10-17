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
    

    @yield('contents')
    <!-- footer -->
    @include('front.layout.footer')
    <!-- end footer -->
    
    @include('front.layout.scripts')
          
    <!-- SCRIPTS -->
    @yield('manual_scripts')

    <!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "{{$general_info->whatsapp}}", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();

    setTimeout(function(){
        $('a[type="link"]').remove();
     }, 1400);
   
</script>
<!-- /GetButton.io widget -->

</body>
</html>