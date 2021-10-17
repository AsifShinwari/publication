<?php

namespace App\Http\Livewire\Publications\Journals\Archive;

use Livewire\Component; 
use Livewire\withFileUploads; 
use DB;
class Index extends Component
{
    use withFileUploads;

    public $image;
    public $journal_id;
    public $selected_id;
    
    public function mount($id){
        $this->journal_id=$id;
    }

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('journal_archives')->where('id',$this->selected_id)->delete();
       
        $this->emit('message',[
            'type'=>'success',
            'title'=>'Deleted Successfully!'
        ]);
        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);
    }
    
    public function render()
    {
        $journal_id=$this->journal_id;

        $journal=DB::table('journals')->where('id',$this->journal_id)->first();
        $data=DB::table('journal_archives')->where('journal_id',$this->journal_id)->paginate(10);
        return view('livewire.publications.journals.archive.index',compact('data','journal_id','journal'))
        ->layout('home')
        ->slot('slot');
    }
}
