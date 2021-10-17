<?php

namespace App\Http\Livewire\Resources\MentorPosts;

use Livewire\Component;
use DB;
class Index extends Component
{
    public $search;
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('mentor_posts')->where('id',$this->selected_id)->delete();
        
        $this->emit('message',[
            'type'=>'success',
            'title'=>'Mentor Post Deleted Successfully!'
        ]);
        
        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);

        
    }

    public function render()
    { 
        $search=$this->search;

        $data=DB::table('mentor_posts')
        ->join('our_mentors','mentor_posts.mentor_id','our_mentors.id')
        ->select('mentor_posts.*','our_mentors.name as mentor_name')
        ->when($search,function($query) use($search){
            $query->orWhere('our_mentors.name','like','%'.$search.'%');
        })
        ->orderBy('id','desc')->paginate(10);
        return view('livewire.resources.mentor-posts.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
