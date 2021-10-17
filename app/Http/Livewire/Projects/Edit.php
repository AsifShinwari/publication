<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use DB;
class Edit extends Component
{
    public $selected_id;

    public function mount($id){
        $this->selected_id=$id;
    }

    public function update($data){
        $our_funded=false;
        if(isset($data['our_funded'])){
            $our_funded=true;
        }
        $is_completed=false;
        if(isset($data['is_completed'])){
            $is_completed=true;
        }
        DB::table('projects')
        ->where('id',$this->selected_id)
        ->update([
            "proj_name" => $data["proj_name"],
            "our_funded" => $our_funded,
            "details" => $data["details"],
            'is_completed'=>$is_completed
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Project Updated Successfully!'
        ]);

        return redirect()->route('backend.projects.index');
    }

    public function render()
    {
        $data=DB::table('projects')->where('id',$this->selected_id)->first();
        return view('livewire.projects.edit',compact('data'))
        ->layout('home')
        ->slot('slot');
    }
}
