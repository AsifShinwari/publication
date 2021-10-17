<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
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

       session()->flash('success','Your Message Sent Successfully!');
       return redirect()->back();
    }
}
