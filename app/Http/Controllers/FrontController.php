<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;
use Illuminate\Support\Facades\Http;
class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request){  

        if(!$request->ajax()){
            $home_page=DB::table('home_page')->orderBy('id','desc')->first();
            $our_partners=DB::table('our_partners')->orderBy('id','desc')->get();
            
            $comming_events=DB::table('events')
            ->where('start_date','>', date('Y-m-d\TH:i')) 
            ->orderBy('id','desc')->paginate(3);

            $mentor_posts=DB::table('mentor_posts')
            ->orderBy('id','desc')->take(12)->get();
            
            return view('front.index', compact('home_page','comming_events','mentor_posts','our_partners'));
        }else{
            $comming_events=DB::table('events')
            ->where('start_date','>', date('Y-m-d\TH:i')) 
            ->orderBy('id','desc')->paginate(3);
            return response()->json(['comming_events'=>$comming_events, 'nextUrl'=>$comming_events->nextPageUrl()]);
        }
    }

}
