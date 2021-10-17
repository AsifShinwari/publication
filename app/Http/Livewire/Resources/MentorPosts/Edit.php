<?php

namespace App\Http\Livewire\Resources\MentorPosts;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Edit extends Component
{
    use withFileUploads;

    public $image;
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('mentor_posts',$fileNewName );
            
            $imageName='mentor_posts/'.$fileNewName;

            DB::table('mentor_posts')
            ->where('id',$this->selected_id)
            ->update([
                'image'=>$imageName
            ]);
        }

        DB::table('mentor_posts')
        ->where('id',$this->selected_id)
        ->update([
            "mentor_id" => $data["mentor_id"],
            "title" => $data['title'],
            "details" => $data["details"],
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Mentor Post Info Updated Successfully!'
        ]);

        return redirect()->route('backend.mentor.posts.index');
    }

    public function render()
    {
        $mentor_post=DB::table('mentor_posts')->where('id',$this->selected_id)->first();
        $our_mentors=DB::table('our_mentors')->orderBy('name','asc')->get();
        return view('livewire.resources.mentor-posts.edit',compact('mentor_post','our_mentors'))
        ->layout('home')
        ->slot('slot');
    }
}
 