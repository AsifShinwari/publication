<?php

namespace App\Http\Livewire\Events;

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
        
        DB::table('events')
        ->where('id',$this->selected_id)
        ->delete();

        $this->emit('resetFormCloseModel', [
            'formName'    => 'deleteModal',
            'model'    => 'close',//close or not close
            'clearForm' => 'yes' //use yes or no
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Event Deleted Successfully!'
        ]);

    }
    public function render()
    {
        $search=$this->search;

        $events=DB::table('events')
        ->join('countries','events.country_id','countries.id')
        ->select('events.*','countries.name as country_name')
        ->when($search,function($query) use($search){
            $query->orWhere('countries.name','like','%'.$search.'%')
            ->orWhere('events.title','like','%'.$search.'%')
            ->orWhere('events.event_type','like','%'.$search.'%');
        })
        ->orderBy('events.id','desc')->get();
        return view('livewire.events.index',compact('events'))
        ->layout('home')
        ->slot('slot');
    }
}
