<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;

class Index extends Component
{
    public $search;
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('projects')
        ->where('id',$this->selected_id)
        ->delete();

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Project Deleted Successfully!'
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

        $data=DB::table('projects')
        ->when($search,function($query) use($search){
            $query->orWhere('projects.proj_name','like','%'.$search.'%');
        })
        ->orderBy('id','desc')->paginate(10);

        return view('livewire.projects.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
