<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;
use Illuminate\Support\Facades\Http;
class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request,$event_type){  

        if(!$request->ajax()){
            $events=DB::table('events')
            ->when($event_type,function($query) use($event_type){
                if($event_type=='CommingEvents'){
                    $query->where('start_date','>', date('Y-m-d\TH:i'));
                }elseif($event_type=='PastEvents'){
                    $query->where('end_date','>', date('Y-m-d\TH:i'));
                }
            })
            ->orderBy('id','desc')->paginate(3);
            return view('front.events', compact('events','event_type'));
        }else{
            $events=DB::table('events')
            ->when($event_type,function($query) use($event_type){
                if($event_type=='CommingEvents'){
                    $query->where('start_date','>', date('Y-m-d\TH:i'));
                }elseif($event_type=='PastEvents'){
                    $query->where('end_date','>', date('Y-m-d\TH:i'));
                }
            })
            ->orderBy('id','desc')->paginate(3);
            return response()->json(['events'=>$events, 'nextUrl'=>$events->nextPageUrl()]);
        }
    }

    public function single_event($id){
        $data=DB::table('events')
        ->leftJoin('countries','events.country_id','countries.id')
        ->select('events.*','countries.name as country_name')
        ->where('events.id',$id)->first();
        return view('front.event_single',compact('data'));
    }

    public function post_event(Request $request){
        $countries=DB::table('countries')->orderBy('id','asc')->get();
        return view('front.event_add',compact('countries'));
    }

    public function store_event(Request $request){
        DB::table('events')->insert([
            "title" => $request->title,
            "event_type"=> $request->event_type,
            "category" => $request->category,
            "topics" => $request->topic,
            "province" => $request->province,
            "city" => $request->city,
            "country_id" => $request->country_id,
            "organizer" => $request->organizer,
            "contact_person_name" => $request->contact_person,
            "email" => $request->email,
            "phone" => $request->phone,
            "website" => $request->website,
            "description" => $request->description,
            "keywords" => $request->keywords,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "deadline_reg_date" => $request->deadline_reg_date,
        ]);

        session()->flash('success','Your Event Saved Successfully!');
        return redirect()->back();
    }
}
