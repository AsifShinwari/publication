<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;
use Illuminate\Support\Facades\Http;
class AdvisoryBoardController extends Controller
{

    public function index(){
        $data=DB::table('advisory_board')->orderBy('id','asc')->get();
        return view('front.advisory_board',compact('data'));
    }
    
}