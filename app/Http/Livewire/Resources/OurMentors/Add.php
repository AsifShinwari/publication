<?php

namespace App\Http\Livewire\Resources\OurMentors;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Add extends Component
{
    use withFileUploads;

    public $image;
    public $resumee;
    public $email;
    
    public function store($data){
        $this->email=$data['email'];
        $this->validate([
            'email'=>'required|unique:our_mentors'
        ]);

        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('mentor_images',$fileNewName );
            
            $imageName='mentor_images/'.$fileNewName;
        }

        $resumeeName=null;
        if($this->resumee!=null){
            $file_ext=$this->resumee->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->resumee->storeAs('mentors_resumees',$fileNewName );
            
            $resumeeName='mentors_resumees/'.$fileNewName;
        }

        DB::table('our_mentors')->insert([
            "name" => $data["name"],
            "last_name" => $data["last_name"],
            "email" => $data["email"],
            "address" => $data["address"],
            "qualification" => $data['qualification'],
            "country_id" => $data["country_id"],
            'image'=>$imageName,
            "skills" => $data["skills"],
            "profile_url" => $data["profile_url"],
            "education" => $data["education"],
            "experience" => $data["experience"],
            "resumee" => $resumeeName,
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Member Added Successfully!'
        ]);

        return redirect()->route('backend.mentors.index');
    }

    public function render()
    {   
        $countries=DB::table('countries')->orderBy('name','asc')->get();
        return view('livewire.resources.our-mentors.add',compact('countries'))
        ->layout('home')
        ->slot('slot');
    }
}
