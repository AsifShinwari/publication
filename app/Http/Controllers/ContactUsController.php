<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Illuminate\Support\Facades\Mail;
class ContactUsController extends Controller
{
    public function index(){

        $general_info=DB::table('general_info')->orderBy('id','desc')->first();
        // return view('mail');
        return view('front.contact_us',compact('general_info'));
    }
    
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'subject' =>'required',
        ]);

       DB::table('contact_us')->insert([
            "subject" => $request->subject,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
       ]);

            $to_name = 'ESRO';
            $to_email = $request->email;
            $data=['name'=>$request->name];
            Mail::send('contact_us_client_mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('ESRO Received Your Query');
            // $message->cc('esro.europe@gmail.com');
            $message->from('esro.europe@app.com','ESRO Received Your Query');
            });
            
            $to_name = 'ESRO';
            $to_email = 'arshadmahafridi@gmail.com';
            $data=[
                    "subject" => $request->subject,
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "client_message" => $request->message,
                ];
            Mail::send('contact_us_our_mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('ESRO Received Query');
            // $message->cc('esro.europe@gmail.com');
            $message->from('esro.europe@app.com','ESRO Received Query');
            });
            
       session()->flash('success','Your Message Sent Successfully!');
       return redirect()->back();
    }
}
