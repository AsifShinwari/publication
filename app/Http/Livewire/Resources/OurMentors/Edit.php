<?php

namespace App\Http\Livewire\Resources\OurMentors;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;

class Edit extends Component
{
    use withFileUploads;

    public $image;
    public $resumee;
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('mentor_images',$fileNewName );
            
            $imageName='mentor_images/'.$fileNewName;

            DB::table('our_mentors')
            ->where('id',$this->selected_id)
            ->update([
                'image'=>$imageName
            ]);
        }
        if($this->resumee!=null){
            $file_ext=$this->resumee->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->resumee->storeAs('mentors_resumees',$fileNewName );
            
            $resumeeName='mentors_resumees/'.$fileNewName;

            DB::table('our_mentors')
            ->where('id',$this->selected_id)
            ->update([
                'resumee'=>$resumeeName
            ]);
        }

        DB::table('our_mentors')
        ->where('id',$this->selected_id)
        ->update([
            "name" => $data["name"],
            "last_name" => $data["last_name"],
            "address" => $data["address"],
            "qualification" => $data['qualification'],
            "country_id" => $data["country_id"],
            "skills" => $data["skills"],
            "profile_url" => $data["profile_url"],
            "education" => $data["education"],
            "experience" => $data["experience"],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Mentor Info Updated Successfully!'
        ]);

        return redirect()->route('backend.mentors.index');
    }

    public function render()
    {
        $countries=DB::table('countries')->orderBy('name','asc')->get();
        $data=DB::table('our_mentors')->where('id',$this->selected_id)->first();
        return view('livewire.resources.our-mentors.edit',compact('data','countries'))
        ->layout('home')
        ->slot('slot');
    }
}
 