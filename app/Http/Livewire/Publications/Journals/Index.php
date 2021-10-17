<?php

namespace App\Http\Livewire\Publications\Journals;

use Livewire\Component;
use DB;
class Index extends Component
{
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('journals')->where('id',$this->selected_id)->delete();
        $this->emit('message',[
            'title'=>'Journal Deleted Successfully!',
            'type'=>'success'
        ]);
    }
    public function render()
    {
        $data=DB::table('journals')->orderBy('id','desc')->paginate(10);
        return view('livewire.publications.journals.index',compact('data'))
        ->layout('home')->slot('slot');
    }
}
