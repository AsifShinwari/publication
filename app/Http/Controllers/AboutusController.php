<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;
use Illuminate\Support\Facades\Http;
class AboutusController extends Controller
{

    public function index(){
        $data=DB::table('about_us')->orderBy('id','desc')->first();
        return view('front.aboutus',compact('data'));
    }

    public function tie_up_instituion(){
        
        $data=DB::table('tie_up_institution')
        ->leftJoin('countries','tie_up_institution.country_id','countries.id')
        ->select('tie_up_institution.*','countries.name as country_name')
        ->orderBy('id','desc')->get();

        return view('front.tie_up_instituion',compact('data'));
    }

    public function report(){
        return view('front.aboutus_report');
    }
}