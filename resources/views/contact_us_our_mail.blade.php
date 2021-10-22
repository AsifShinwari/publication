<style>
    table, th, td {
  border: 0px solid black;
  border-collapse: collapse;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--<b>{{ $name }}</b>,
<p>{!!$body!!}</p>--}}

@php
	$general_info=DB::table('general_info')->orderBy('id','desc')->first();
@endphp
<table border="1" style="border-collapse: collapse;border-color:lightgray;width:100%;">
    
    <tbody>
        <tr>
            <td style="padding-left:8px;padding-top:10px;padding-right:8px;border-collapse: collapse;border-top:0px;border-color:lightgray;">
                <b>Subject</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$subject}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Email</b>
                <p style="color:blue;padding-top:6px;margin:0px;">{{$email}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Phone</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$phone}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Message</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$client_message}}</p>
                
            </td>
        </tr>
    </tbody>
    <tfoot style="background-color:lightgray;">
        <td>
            <p style="text-align:center;padding:10px;color:grey;font-size:13px;">Sent From ESRO</p>
        </td>
    </tfoot>
</table>