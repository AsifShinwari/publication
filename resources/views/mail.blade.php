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
<table border="1" style="border-collapse: collapse;border-color:lightgray;">
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
                <b>Invoice No / Reference</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$id}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Email</b>
                <p style="color:blue;padding-top:6px;margin:0px;">{{$email}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Amount</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$amount}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Currency</b>
                <p style="color:grey;padding-top:6px;margin:0px;">@if($currency=='eur') EURO @elseif($currency=='usd') USD @endif</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Description</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$description}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Payment Method</b>
                <p style="color:grey;padding-top:6px;margin:0px;">{{$funding}}&nbsp;{{$object}}</p>
                <hr style="border-color:#ffffff80;">
                
                <b>Card</b>
                <p style="color:grey;padding-top:6px;margin:0px;margin-bottom:20px;">xxxxxxxxxxxx{{$last4}}&nbsp;{{$brand}}</p>
                <hr style="border-color:#ffffff80;">
                <br><br>
                <b style="text-align:center;">This receipt is computer generated. hence no seal & signature required<b>
            </td>
        </tr>
    </tbody>
    <tfoot style="background-color:lightgray;">
        <td>
            <p style="text-align:center;padding:10px;color:grey;font-size:13px;">Sent From ESRO</p>
        </td>
    </tfoot>
</table>