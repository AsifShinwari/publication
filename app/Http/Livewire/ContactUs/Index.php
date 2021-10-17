<?php
 
namespace App\Http\Livewire\ContactUs;

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

        DB::table('contact_us')
        ->where('id',$this->selected_id)
        ->delete();

        $this->emit('message', [
            'type' => 'success',
            'title' => 'Message Deleted Successfully!'
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

        $data=DB::table('contact_us')
        ->when($search,function($query) use($search){
            $query->orWhere('subject','like','%'.$search.'%')
            ->orWhere('name','like','%'.$search.'%')
            ->orWhere('phone','like','%'.$search.'%')
            ->orWhere('email','like','%'.$search.'%');
        })
        ->orderBy('id','desc')->paginate(10);

        return view('livewire.contact-us.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }


}
