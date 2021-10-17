<?php

namespace App\Http\Livewire\Manuscripts;

use Livewire\Component;
use DB;
class Show extends Component
{
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function render()
    {
        $data=DB::table('submitted_manuscripts')->where('id',$this->selected_id)->first();
        return view('livewire.manuscripts.show',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
