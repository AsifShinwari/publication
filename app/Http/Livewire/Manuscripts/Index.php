<?php

namespace App\Http\Livewire\Manuscripts;

use Livewire\Component;
use DB;
class Index extends Component
{
    public $journal_id;
    public $selected_id;

    public function mount($id){
        $this->journal_id=$id;
    }

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('submitted_manuscripts')->where('id',$this->selected_id)->delete();
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
        $journal=DB::table('journals')->where('id',$this->journal_id)->first();
        $data=DB::table('submitted_manuscripts')->where('journal_id',$this->journal_id)->paginate(10);
        return view('livewire.manuscripts.index',compact('journal','data'))
        ->layout('home')
        ->slot('slot');
    }
}
