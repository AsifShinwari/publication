<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class JoinController extends Controller
{
    public function mentor_join(){
        $countries=DB::table('countries')->orderBy('id','asc')->get();
        return view('front.join_mentor',compact('countries'));
    }

    public function mentor_join_store(Request $request){
        
        $request->validate([
            "name" => 'required',
            "last_name" =>'required',
            "email" => 'required|unique:our_mentors',
            "qualification" => 'required',
            "address" => 'required',
            "country" => 'required',
            "skills" => 'required',
            "profile_url" => 'required',
            "education" => 'required',
            "experience" => 'required',
        ]);

        $imageName=null;
        if($request->hasFile('image')){
            $file_ext=$request->file('image')->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$request->file('image')->storeAs('mentor_images',$fileNewName );
            
            $imageName='mentor_images/'.$fileNewName;
        }

        $resumee=null;
        if($request->hasFile('resumee')){
            $file_ext=$request->file('resumee')->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$request->file('resumee')->storeAs('mentors_resumees',$fileNewName );
            
            $resumee='mentors_resumees/'.$fileNewName;
        }

        DB::table('our_mentors')->insert([
            "name" => $request->name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "qualification" => $request->qualification,
            "address" => $request->address,
            "country_id" => $request->country,
            "skills" => $request->skills,
            "profile_url" => $request->profile_url,
            "education" => $request->education,
            "experience" => $request->experience,
            "image" => $imageName,
            "resumee" => $resumee,
        ]);
        
        session()->flash('success','Submitted Successfully!, Your Request is in process, wait till we approve your request!');
        return redirect()->back();
    }

    public function join_individual(){
        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('front.join_andividual',compact('countries'));
    }

    public function join_individual_post(Request $request){
        $request->validate([
            'name'=>'required',
            "last_name" => "required",
            "email" => "required|unique:users|unique:users_info",
            "phone" => "required",
            "company" => "required",
            "designation" => "required",
            "qualification" => "required",
            "country" => "required",
            "password" => "required",
            "terms" => "required"
        ]);

        DB::table('users_info')->insert([
            'first_name' => $request->name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "company" => $request->company,
            "designation" => $request->designation,
            "qualification" => $request->qualification,
            "country_id" => $request->country,
            "password" => $request->password,
        ]);

        DB::table('users')->insert([
            'name'=>$request->name.' '.$request->last_name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'type' => 'Individual',
        ]);
        session()->flash('success','Your Account Created Successfully!');
        return redirect()->back();
    }

    public function join_company(){
        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('front.join_company',compact('countries'));
    }

    public function join_company_post(Request $request){
        $request->validate([
            'first_name'=>'required',
            "last_name" => "required",
            "email" => "required|unique:users|unique:companies_info",
            "phone" => "required",
            "company_name" => "required",
            "position" => "required",
            "country" => "required",
            "password" => "required",
            "terms" => "required"
        ]);

        DB::table('companies_info')->insert([
            'first_name' => $request->name,
            "last_name" => $request->last_name,
            "position" => $request->position,
            "email" => $request->email,
            "phone" => $request->phone,
            "company_name" => $request->company_name,
            "country_id" => $request->country,
            "password" => $request->password,
        ]);

        DB::table('users')->insert([
            'name'=>$request->name.' '.$request->last_name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'type' => 'Company',
        ]);
        session()->flash('success','Your Account Created Successfully!');
        return redirect()->back();
    }

    public function show_login(){
        return view('front.login');
    }

    public function login_post(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (\Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        \Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
