<?php

namespace App\Http\Livewire\Resources\EnterDev;


use Illuminate\Http\Request; 
use DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    public function index()
    {
        $slot=' ';
       $data = DB::table("enter_dev")->orderBy('id','desc')->first();
       if(!$data){
         DB::table("enter_dev")->insert(['contents'=>' ']);
         $data = DB::table("enter_dev")->orderBy('id','desc')->first();
       }

       $images = DB::table("enter_dev_images")->where('enter_dev_id',$data->id)->get();

        return view('livewire.resources.enter-dev.index',compact('data','images','slot'));
    }

    public function image_store(Request $request){
        DB::table('enter_dev')
        ->where('id',$request->enter_dev_id)
        ->update([
            'contents'=>$request->description,
        ]);

        $imageName=null;
        if($request->hasFile('image')){
            $file_ext=$request->file('image')->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$request->file('image')->storeAs('enter_dev_images',$fileNewName );
            
            $imageName='enter_dev_images/'.$fileNewName;

            DB::table('enter_dev_images')->insert([
                'enter_dev_id'=>$request->enter_dev_id,
                'image'=>$imageName,
            ]);
            
            session()->flash('success','Image Uploaded Successfully!');
            return redirect()->route('backend.enter.dev.index');
        }
    }

    public function image_delete($id){

        DB::table('enter_dev')->where('id',$id)->delete();

        session()->flash('success','Image Deleted Successfully!');
        return redirect()->back();
    }

    public function update(Request $request){

        DB::table('enter_dev')
        ->where('id',$request->enter_dev_id)
        ->update([
            'contents'=>$request->description,
        ]);

        session()->flash('success','Changes Saved Successfully!');
        return redirect()->route('backend.enter.dev.index');
    }
}
