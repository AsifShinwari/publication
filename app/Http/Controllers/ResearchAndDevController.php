<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ResearchAndDevController extends Controller
{
    public function index(Request $request){

        $our_funded_projects=DB::table('projects')
        ->where('our_funded',1)
        ->orderBy('id','desc')->paginate(3);
        
        $current_projects=DB::table('projects')
        ->where('is_completed',0)
        ->orderBy('id','desc')->paginate(3);

        $past_projects=DB::table('projects')
        ->where('is_completed',1)
        ->orderBy('id','desc')->paginate(3);

        if(!$request->ajax()){
            return view('front.research_dev',compact('our_funded_projects','current_projects','past_projects'));
        }else{
            return response()->json([
                'our_funded_projects'=>$our_funded_projects,
                'current_projects'=>$current_projects,
                'past_projects'=>$past_projects,
                'ourFundedNextUrl'=>$our_funded_projects->nextPageUrl(),
                'currentNextUrl'=>$current_projects->nextPageUrl(),
                'pastNextUrl'=>$past_projects->nextPageUrl(),
            ]);
        }
    }
}