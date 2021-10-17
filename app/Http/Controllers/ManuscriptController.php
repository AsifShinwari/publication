<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use DB;
class ManuscriptController extends Controller
{
    public function index($journal_id){
        $journal=DB::table('journals')->where('id',$journal_id)->first();
        $archive=DB::table('journal_archives')->where('journal_id',$journal_id)->get();

        return view('front.manuscript.add',compact('journal','archive'));
    }

    public function store(Request $request){
    
        $journal=DB::table('journals')->where('id',$request->journal_id)->first();

        $imageName=null;
        if($request->hasFile('file')){
            $file_ext=$request->file('file')->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$request->file('file')->move('manuscript_submitted',$fileNewName);
            
            $imageName='manuscript_submitted/'.$fileNewName;
        }

        DB::table('submitted_manuscripts')->insert([
            'journal_id'=>$request->journal_id,
            'author'=>$request->author,
            'email'=>$request->email,
            'title'=>$request->title,
            'abstract'=>$request->abrstact,
            'keywords'=>$request->keywords,
            'file'=>$imageName,
        ]);

        $to_name = 'ESRO';

        $to_emails=[$journal->editor_email,'records@esro-europe.eu'];
        $emaildata = [
            "author" => $request->author,
            "email" => $request->email,
            "title" => $request->title,
            "abrstact" => $request->abrstact,
            "keywords" => $request->keywords,
        ];

        $atttach_file=public_path($imageName);

        Mail::send('mail_to_manuscipt', $emaildata, function($message) use ($to_name, $to_emails,$request,$atttach_file) {
            $message->to($to_emails, $to_name)
            ->subject($request->email.' has submited an article');
            // $message->cc('esro.europe@gmail.com');
            $message->from('esro.europe@app.com','ESRO');
            $message->attach($atttach_file);
        });

        session()->flash('success','Your Article Submitted Successfully!');
        return redirect()->back();

    }
}
