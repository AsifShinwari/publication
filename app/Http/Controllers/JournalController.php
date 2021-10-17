<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class JournalController extends Controller
{
    public function index(){
        $journals=DB::table('journals')->orderBy('id','desc')->get();
        return view('front.journal.index',compact('journals'));
    }

    public function journal_details($id,$type){
        $journal=DB::table('journals')->where('id',$id)->first();
        $journal_archives=DB::table('journal_archives')->where('journal_id',$id)->get();
        return view('front.journal.journal_details',compact('journal','type','id','journal_archives'));
    }

    public function journal_archives_issues($id){

        $archive=DB::table('journal_archives')->where('id',$id)->first();
        $journal=DB::table('journals')->where('id',$archive->journal_id)->first();
        $issues=DB::table('journal_archives_issues')->where('archive_id',$archive->id)->get();
        
        return view('front.journal.journal_archive_issue',compact('archive','journal','issues'));
    }

    public function journal_archives_issues_single($id){

        $issue=DB::table('journal_archives_issues')->where('id',$id)->first();
        $archive=DB::table('journal_archives')->where('id',$issue->archive_id)->first();
        $journal=DB::table('journals')->where('id',$archive->journal_id)->first();

        return view('front.journal.journal_archive_single_issue',compact('archive','journal','issue'));
    }
}
