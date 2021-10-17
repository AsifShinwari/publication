<?php

namespace App\Http\Livewire\TieUpInstitution;

use Livewire\Component;
use DB;
use Livewire\withFileUploads;
class Index extends Component
{
    use withFileUploads;
    
    public $search;
    public $selected_id;

    public function setId($id){
        $this->selected_id=$id;
    }

    public function delete(){
        DB::table('tie_up_institution')->where('id',$this->selected_id)->delete();
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
        $search=$this->search;

        $data=DB::table('tie_up_institution')
        ->leftJoin('countries','tie_up_institution.country_id','countries.id')
        ->select('tie_up_institution.*','countries.name as country_name')
        ->when($search,function($query) use($search){
            $query->orWhere('tie_up_institution.title','like','%'.$search.'%')
            ->orWhere('countries.name','like','%'.$search.'%');
        })
        ->orderBy('id','desc')->get();
        return view('livewire.tie-up-institution.index',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
 