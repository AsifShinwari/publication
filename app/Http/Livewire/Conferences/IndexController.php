<?php

namespace App\Http\Livewire\Conferences;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request; 
use DB;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{

    public function index(){
        $slot='';
        $data=DB::table('conferences')->orderBy('id','desc')->paginate(10);
        return view('livewire.conferences.index',compact('slot','data'));
    }

    public function add(){
        $slot='';

        return view('livewire.conferences.add',compact('slot'));
    }

    public function edit($id){
        $slot='';
        $data=DB::table('conferences')->where('id',$id)->first();
        return view('livewire.conferences.edit',compact('slot','data','id'));
    }

    public function store(Request $request){

        $request->validate([
            'title'=>'required',
            'year'=>'required',
        ]);

        DB::table('conferences')->insert([
            'year'=>$request->year,
            'title'=>$request->title
        ]);

        session()->flash('success','Conference Added Successfully!');
        return redirect()->route('backend.conference.index');
    }

    public function update(Request $request){

        $request->validate([
            'title'=>'required',
            'year'=>'required',
        ]);

        DB::table('conferences')
        ->where('id',$request->id)
        ->update([
            'year'=>$request->year,
            'title'=>$request->title
        ]);

        session()->flash('success','Conference Updated Successfully!');
        return redirect()->route('backend.conference.index');
    }

    public function delete($id){
        DB::table('conferences')
        ->where('id',$id)->delete();

        session()->flash('success','Conference Deleted Successfully!');
        return redirect()->route('backend.conference.index');
    }

    //////////////////contents functions///////////////////////////////////////////////////////////////

    public function con_index($id){
        $slot='';
        $conference=DB::table('conferences')->where('id',$id)->first();
        $images=DB::table('conference_images')->where('conference_id',$id)->get();

        return view('livewire.conferences.contents.add',compact('images','conference','slot'));
    }

    public function con_image_store(Request $request){
        DB::table('conferences')
        ->where('id',$request->conference_id)
        ->update([
            'description'=>$request->description,
        ]);

        $imageName=null;
        if($request->hasFile('image')){
            $file_ext=$request->file('image')->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$request->file('image')->storeAs('conference_images',$fileNewName );
            
            $imageName='conference_images/'.$fileNewName;

            DB::table('conference_images')->insert([
                'conference_id'=>$request->conference_id,
                'image'=>$imageName,
            ]);
            
            session()->flash('success','Image Uploaded Successfully!');
            return redirect()->route('backend.conference.cont.index',$request->conference_id);
        }
    }

    public function con_image_delete($id){

        DB::table('conference_images')->where('id',$id)->delete();

        session()->flash('success','Image Deleted Successfully!');
        return redirect()->back();
    }

    public function con_update(Request $request){

        DB::table('conferences')
        ->where('id',$request->conference_id)
        ->update([
            'description'=>$request->description,
        ]);

        session()->flash('success','Changes Saved Successfully!');
        return redirect()->route('backend.conference.cont.index',$request->conference_id);
    }

    public function conference($id){
        $data=DB::table('conferences')->where('id',$id)->first();
        return view('front.conferences.index',compact('data'));
    }

}