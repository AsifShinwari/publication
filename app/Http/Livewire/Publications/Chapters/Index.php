<?php

namespace App\Http\Livewire\Publications\Chapters;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Index extends Component
{
    use withFileUploads;

    public $search;
    public $publication_id;
    public $selected_id;

    public function mount($id){
        $this->publication_id=$id;
    }

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('publication_chapter')
        ->where('id',$this->selected_id)
        ->delete();

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Chapter Deleted Successfully!'
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

        $data=DB::table('publication_chapter')
        ->where('publication_id',$this->publication_id)
        ->when($search,function($query) use($search){
            $query->where('publications.title','like','%'.$search.'%');
        })
        ->orderBy('id','desc')->paginate(10);

        return view('livewire.publications.chapters.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
