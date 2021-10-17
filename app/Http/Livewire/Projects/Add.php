<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use Livewire\withFileUploads;
use DB;
class Add extends Component
{
    use withFileUploads;

    public function store($data){
        $our_funded=false;
        if(isset($data['our_funded'])){
            $our_funded=true;
        }
        $is_completed=false;
        if(isset($data['is_completed'])){
            $is_completed=true;
        }
        DB::table('projects')->insert([
            "proj_name" => $data["proj_name"],
            "our_funded" => $our_funded,
            "details" => $data["details"],
            'is_completed'=>$is_completed
        ]);

        $this->emit('message',[
            'type'=>'success',
            'title'=>'Project Added Successfully!'
        ]);

        return redirect()->route('backend.projects.index');
    }

    public function render()
    {
        return view('livewire.projects.add')
        ->layout('home')
        ->slot('slot');
    }
}
