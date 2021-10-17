<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ResourcesController extends Controller
{

    public function research_funding(Request $request){

        $our_funded_projects=DB::table('projects')
        ->where('our_funded',1)
        ->orderBy('id','desc')->paginate(3);
        
        $page_data=DB::table('resources_research_funding')->orderBy('id','desc')->first();

        if(!$request->ajax()){
            return view('front/resources_research_funding',compact('page_data','our_funded_projects'));
        }else{
            return response()->json([
                'our_funded_projects'=>$our_funded_projects,
                'ourFundedNextUrl'=>$our_funded_projects->nextPageUrl()
            ]);
        }
       
    }

    public function entrepreneurship_development(){
        $data=DB::table('our_mentors')
        ->join('countries','our_mentors.country_id','countries.id')
        ->select('our_mentors.*','countries.name as country_name')
        ->orderBy('id','asc')->get();
        return view('front.entrepreneurship_development',compact('data'));
    }

    public function event_sponsership(){
        $data=DB::table('event_sponsership')->orderBy('id','desc')->first();
        return view('front.event_sponsership',compact('data'));
    }
    public function patent(Request $request){
        $data=DB::table('patent')->orderBy('id','desc')->first();
        $patent_projects=DB::table('projects')->where('is_related_to_patent',1)->orderBy('id','desc')->paginate(3);
      
        if(!$request->ajax()){
            return view('front.patent',compact('data','patent_projects'));
        }else{
            return response()->json(['patent_projects'=>$patent_projects,'nextUrl'=>$patent_projects->nextPageUrl()]);
        }
    }

    public function mentor_posts(Request $request){

        $data=DB::table('mentor_posts')
        ->join('our_mentors','mentor_posts.mentor_id','our_mentors.id')
        ->select('mentor_posts.*','our_mentors.name as mentor_name')
        ->orderBy('id','desc')->paginate(3);

        if(!$request->ajax()){
            return view('front.mentor_posts',compact('data'));
        }else{
            return response()->json(['data'=>$data,'nextUrl'=>$data->nextPageUrl()]);
        }

    }

    public function mentor_single_post($id){

        $data=DB::table('mentor_posts')
        ->join('our_mentors','mentor_posts.mentor_id','our_mentors.id')
        ->select('mentor_posts.*','our_mentors.name as mentor_name')
        ->where('mentor_posts.id',$id)
        ->orderBy('id','desc')->first();

        return view('front.mentor_single_post',compact('data'));
    }
}