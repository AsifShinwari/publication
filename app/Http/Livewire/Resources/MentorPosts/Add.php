<?php

namespace App\Http\Livewire\Resources\MentorPosts;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Add extends Component
{
    use withFileUploads;

    public $image;
    
    public function store($data){
        
        $imageName=null;
        if($this->image!=null){
            $file_ext=$this->image->getClientOriginalExtension();
            $file_name=date('Y_m_d_h_m_s_ms');
            $fileNewName=$file_name.'.'.$file_ext;
            $image=$this->image->storeAs('mentor_posts',$fileNewName );
            
            $imageName='mentor_posts/'.$fileNewName;
        }

        DB::table('mentor_posts')->insert([
            "mentor_id" => $data["mentor_id"],
            "title" => $data['title'],
            "details" => $data["details"],
            'image'=>$imageName
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Post Added Successfully!'
        ]);

        return redirect()->route('backend.mentor.posts.index');
    }

    public function render()
    {   
        $mentor_posts=DB::table('mentor_posts')->orderBy('id','desc')->get();
        $our_mentors=DB::table('our_mentors')->orderBy('name','asc')->get();
        return view('livewire.resources.mentor-posts.add',compact('our_mentors','mentor_posts'))
        ->layout('home')
        ->slot('slot');
    }

} 
