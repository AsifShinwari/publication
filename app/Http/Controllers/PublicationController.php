<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PublicationController extends Controller 
{
    public function publication_index(){
        
        $disciplines=DB::table('disciplines')->orderBy('id','asc')->get();
        $recent_publication=DB::table('publications')->orderBy('id','desc')->take(4)->get();
        $recent_jurnals=DB::table('journals')->orderBy('id','desc')->take(2)->get();

        return view('front.publication.publication',compact('disciplines','recent_publication','recent_jurnals'));
    }

    public function publication_single($id){
        $publication=DB::table('publications')->where('id',$id)->first();
        $chapters=DB::table('publication_chapter')->where('publication_id',$publication->id)->get();
        return view('front.publication.publication_single',compact('publication','chapters'));
    }

    public function publication_single_chapter($id){
        $chapter=DB::table('publication_chapter')->where('id',$id)->first();
        $publication=DB::table('publications')->where('id',$chapter->publication_id)->first();
        return view('front.publication.single_chapter',compact('publication','chapter'));
    }

    public function download($id,$type){
        // $publication=DB::table('publications')->where('id',$id)->first();
        
        // if($type=='content'){
        //     $file_path=public_path('storage/'.$publication->book_pdf);
        // }elseif($type=='book'){
        //     $file_path=public_path('storage/'.$publication->table_of_content_pdf);
        // }

        // $filename = pathinfo($file_path, PATHINFO_FILENAME);
        // $extension = pathinfo($file_path, PATHINFO_EXTENSION);

        // $headers = array(
        //           'Access-Control-Allow-Origin: *',
        //           'Content-Type: application/'.$extension,
        //         );

        // return response()->download($file_path, $filename.'.'.$extension,$headers);
        return redirect()->back();
    }

    public function publication_filter(Request $request){
        $arr_publication_type=$request->publication_type;
        $arr_discipline=$request->discipline;
        $search=$request->search;

        $disciplines=DB::table('disciplines')->orderBy('id','asc')->get();
        $publication_types=DB::table('publication_type')->orderBy('id','asc')->get();

        $publications=DB::table('publications')
        ->join('publication_type','publications.publication_type_id','publication_type.id')
        ->join('disciplines','publications.discipline_id','disciplines.id')
        ->when($search,function($query) use($search){
            $query->orWhere('publications.title','like','%'.$search.'%')
            ->orWhere('publications.isbn','like','%'.$search.'%')
            ->orWhere('publications.doi','like','%'.$search.'%')
            ->orWhere('publications.year_of_publication','like','%'.$search.'%')
            ->orWhere('publications.author','like','%'.$search.'%');
        })
        ->when($arr_discipline,function($query) use($arr_discipline){
            $query->orWhereIn('discipline_id',$arr_discipline);
        })
        ->when($arr_publication_type,function($query) use($arr_publication_type){
            $query->orWhereIn('publication_type_id',$arr_publication_type);
        })
        ->select('publications.*','publication_type.title as type_title','disciplines.title as discipline_title')
        ->paginate(10);

        return view('front.publication.filter_results',compact('publication_types','disciplines','publications'));
    }
}
