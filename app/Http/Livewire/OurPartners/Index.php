<?php

namespace App\Http\Livewire\OurPartners;

use Livewire\Component;
use DB;
class Index extends Component
{
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('our_partners')->where('id',$this->selected_id)->delete();
        
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
        $data=DB::table('our_partners')->orderBy('id','desc')->paginate(10);
        return view('livewire.our-partners.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
