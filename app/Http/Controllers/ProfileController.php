<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProfileController extends Controller
{

    public function profile_individual(){

        $user=DB::table('users')->where('id',auth()->user()->id)->first();

        $info=DB::table('users_info')->where('email',$user->email)->first();

        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('front.profile_individual',compact('info','countries'));
    }

    public function profile_company(){

        $user=DB::table('users')->where('id',auth()->user()->id)->first();

        $info=DB::table('companies_info')->where('email',$user->email)->first();

        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('front.profile_company',compact('info','countries'));
    }
    
   

    public function profile_company_update(Request $request){
       
        DB::table('companies_info')->where('id',$request->info_id)->update([
            "first_name" => $request->first_name,
            "last_name" =>$request->last_name,
            "email" =>$request->email,
            "phone" =>$request->phone,
            "position" =>$request->introduction,
            "country_id" =>$request->country,
        ]);

        session()->flash('success','Profile Updated Successfully!');
        return redirect()->back();
    }

    public function profile_individual_update(Request $request){
        
        $imageName=null;
        if($request->hasFile('profilepic')){
            $file_ext=$request->file('profilepic')->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$request->file('profilepic')->storeAs('individual_user_images',$fileNewName );
            
            $imageName='individual_user_images/'.$fileNewName;
        }

        DB::table('users_info')->where('id',$request->info_id)->update([
            "first_name" => $request->first_name,
            "last_name" =>$request->last_name,
            "email" =>$request->email,
            "phone" =>$request->phone,
            "introduction" =>$request->introduction,
            "gender" =>$request->gender,
            "city" =>$request->city,
            "country_id" =>$request->country,
            "designation" =>$request->designation,
            "company" =>$request->company,
            "education" =>$request->education,
            "languages" =>$request->languages,
            "skills" =>$request->skills,
            "involvement_with_communities" =>$request->involvement_with_communities,
        ]);

        session()->flash('success','Profile Updated Successfully!');
        return redirect()->back();
    }

    public function profile_mentor(){

        $user=DB::table('users')->where('id',auth()->user()->id)->first();

        $info=DB::table('our_mentors')->where('email',$user->email)->first();

        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('front.profile_mentor',compact('info','countries'));
    }

    public function profile_mentor_update(Request $request){
       
            $request->validate([
                "name" => 'required',
                "last_name" =>'required',
                "qualification" => 'required',
                "address" => 'required',
                "country" => 'required',
                "skills" => 'required',
                "profile_url" => 'required',
                "education" => 'required',
                "experience" => 'required',
            ]);
    
       
            if($request->hasFile('image')){
                $file_ext=$request->file('image')->getClientOriginalExtension();
                $file_name=date('Y_m_d_h_m_s_ms');
                $fileNewName=$file_name.'.'.$file_ext;
                $image=$request->file('image')->storeAs('mentor_images',$fileNewName );
                
                $imageName='mentor_images/'.$fileNewName;

                DB::table('our_mentors')
                ->where('id',$request->info_id)
                ->update([
                    "image" => $imageName,
                ]);
            }
    
            if($request->hasFile('resumee')){
                $file_ext=$request->file('resumee')->getClientOriginalExtension();
                $file_name=date('Y_m_d_h_m_s_ms');
                $fileNewName=$file_name.'.'.$file_ext;
                $image=$request->file('resumee')->storeAs('mentors_resumees',$fileNewName );
                
                $resumee='mentors_resumees/'.$fileNewName;

                DB::table('our_mentors')
                 ->where('id',$request->info_id)
                 ->update([
                     "resumee" => $resumee,
                 ]);
            }
    
            DB::table('our_mentors')
            ->where('id',$request->info_id)
            ->update([
                "name" => $request->name,
                "last_name" => $request->last_name,
                "qualification" => $request->qualification,
                "address" => $request->address,
                "country_id" => $request->country,
                "skills" => $request->skills,
                "profile_url" => $request->profile_url,
                "education" => $request->education,
                "experience" => $request->experience,
            ]);
            
            session()->flash('success','Profile Updated Successfully!');
            return redirect()->back();
        }
}