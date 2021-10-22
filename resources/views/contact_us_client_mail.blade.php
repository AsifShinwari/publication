<style>
    table, th, td {
  border: 0px solid black;
  border-collapse: collapse;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


@php
	$general_info=DB::table('general_info')->orderBy('id','desc')->first();
@endphp
<table border="1" style="border-collapse: collapse;border-color:lightgray;">
 
    <tbody>
        <tr>
            <td style="padding-left:8px;padding-top:10px;padding-right:8px;border-collapse: collapse;border-top:0px;border-color:lightgray;">
                <b>Dear {{$name}},</b><br>
                <p style="color:grey;padding-top:6px;margin:0px;word-break: break-all;">
Thank you for your query. This is an automated email and we have received your inquiry. <br><br>
We will endeavor to answer your query as soon as possible, however, please allow two or three business days for a response. Please do not send multiple responses while waiting for our reply, as this will delay our viewing of your request. If you have further questions beyond your original inquiry, please send a new email. Thank you for your patience.
<br><br><br>
Kind regards !
<br><br><br>
European Sustainable Research Outreach
                </p>
                <hr style="border-color:#ffffff80;">
                
                
            </td>
        </tr>
    </tbody>
    <tfoot style="background-color:lightgray;">
        <td>
            <p style="text-align:center;padding:10px;color:grey;font-size:13px;">Sent From ESRO</p>
        </td>
    </tfoot>
</table>