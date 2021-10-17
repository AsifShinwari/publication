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
<table border="1" style="border-collapse: collapse;border-color:lightgray;width:100%;">
    <thead>
    <th style="border-collapse: collapse;border-bottom:0px;border-color:lightgray;">
        <img src="{{ $message->embed( public_path('2021_10_07_09_10_36_1036.png')) }}"
        style=""
        alt="ESRO" width="100%" height="100%">
    </th>
    </thead>
    <tbody>
        <tr>
            <td style="padding-left:8px;padding-top:10px;padding-right:8px;border-collapse: collapse;border-top:0px;border-color:lightgray;">
                <b>{{$email_subject}}</b>
                <hr style="border-color:#ffffff80;">
                <p style="color:blue;padding-top:6px;margin:0px;">{{$email_message}}</p>
            </td>
        </tr>
    </tbody>
    <tfoot style="background-color:lightgray;padding:0px;">
        <td style="text-align:center;padding:2px;color:grey;font-size:13px;">
            Sent From ESRO
        </td>
    </tfoot>
</table>